<?php

/**
 * 푸시 알림 크론잡
 * - 병원 일정 알림 (2일 전 10:01에 발송)
 * - 복약 시간 알림 (아침/점심/저녁)
 * - 운동 시간 알림
 *
 * 크론잡 설정: * * * * * /usr/bin/php /path/to/www/bbs/cron_alrm.php
 */

// GnuBoard _common.php를 통해 DB 연결 (하드코딩 제거)
$_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__).'/../');
include_once($_SERVER['DOCUMENT_ROOT'].'/_common.php');

// ============================================================
// FCM 설정
// ============================================================

// Firebase 서비스 계정 JSON 키 파일 경로
// Firebase Console → 프로젝트 설정 → 서비스 계정 → 새 비공개 키 생성
define('FCM_SERVICE_ACCOUNT_PATH', G5_DATA_PATH.'/firebase/service-account.json');

// Firebase 프로젝트 ID (서비스 계정 JSON의 project_id 값)
define('FCM_PROJECT_ID', ''); // TODO: Firebase 프로젝트 ID 입력

// 사이트 도메인 (푸시 이미지 등에 사용)
define('SITE_DOMAIN', G5_DOMAIN ?: 'https://breathing.webadsky.net');

// ============================================================
// FCM v1 API 푸시 발송 함수
// ============================================================

/**
 * Google OAuth 2.0 Access Token 발급 (서비스 계정 기반)
 */
function getAccessToken() {
    $serviceAccount = json_decode(file_get_contents(FCM_SERVICE_ACCOUNT_PATH), true);

    if (!$serviceAccount) {
        error_log('[FCM] 서비스 계정 JSON 파일을 읽을 수 없습니다: ' . FCM_SERVICE_ACCOUNT_PATH);
        return false;
    }

    // JWT 생성
    $now = time();
    $header = base64_encode(json_encode(['alg' => 'RS256', 'typ' => 'JWT']));
    $payload = base64_encode(json_encode([
        'iss' => $serviceAccount['client_email'],
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
        'aud' => 'https://oauth2.googleapis.com/token',
        'iat' => $now,
        'exp' => $now + 3600,
    ]));

    $signatureInput = $header . '.' . $payload;

    // base64url 인코딩 보정
    $signatureInput = str_replace(['+', '/', '='], ['-', '_', ''], $signatureInput);

    openssl_sign($signatureInput, $signature, $serviceAccount['private_key'], 'SHA256');
    $jwt = $signatureInput . '.' . str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    // Access Token 요청
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://oauth2.googleapis.com/token',
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]),
    ]);

    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    return $response['access_token'] ?? false;
}

/**
 * FCM v1 API로 푸시 발송
 */
function PushSend($token, $deviceType, $title, $body, $link) {
    static $accessToken = null;

    if ($accessToken === null) {
        $accessToken = getAccessToken();
    }

    if (!$accessToken) {
        error_log('[FCM] Access Token 발급 실패');
        return false;
    }

    if (!FCM_PROJECT_ID) {
        error_log('[FCM] FCM_PROJECT_ID가 설정되지 않았습니다');
        return false;
    }

    $message = [
        'message' => [
            'token' => $token,
            'data' => [
                'url' => $link ?: '',
                'title' => $title,
                'body' => $body,
                'emoticon' => SITE_DOMAIN . '/img/back_image.png',
            ],
            'android' => [
                'priority' => 'high',
            ],
        ],
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://fcm.googleapis.com/v1/projects/' . FCM_PROJECT_ID . '/messages:send',
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
        ],
        CURLOPT_POSTFIELDS => json_encode($message),
        CURLOPT_TIMEOUT => 10,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        error_log('[FCM] 푸시 발송 실패 (HTTP ' . $httpCode . '): ' . $response);
        return false;
    }

    return $response;
}

// ============================================================
// 날짜/시간 계산
// ============================================================

date_default_timezone_set("Asia/Seoul");

$date_nowY = date("Y");
$date_nowm = date("m");
$date_nowh = date("H");
$date_nowi = date("i");

// 2일 후 날짜 (병원 알림용)
$date_2days_later = date_create(date('Y-m-d'));
date_add($date_2days_later, date_interval_create_from_date_string("2 days"));
$date_nowd = date_format($date_2days_later, "d");

$time = $date_nowh . " : " . $date_nowi;

// 날짜 포맷: zero-padded (2025-03-05)
$date_now_type1 = $date_nowY . "-" . $date_nowm . "-" . $date_nowd;

// 날짜 포맷: no-padding (2025-3-5)
$date_nowm_re = ltrim($date_nowm, '0');
$date_nowd_re = ltrim($date_nowd, '0');
$date_now_type2 = $date_nowY . "-" . $date_nowm_re . "-" . $date_nowd_re;

// ============================================================
// 병원일정 알림 (2일 전, 10:01에 발송)
// ============================================================

$sql = "SELECT A.*, B.`device`, B.`token`
        FROM g5_alarm_info A
        JOIN `g5_member` B ON A.`mb_id` = B.`mb_id`
        WHERE A.kinds = '2'
        AND (A.times2_2ourprv LIKE '%{$date_now_type1}%' OR A.times2_2ourprv LIKE '%{$date_now_type2}%')
        AND A.`push_alarm_use` = 'Y'
        AND A.`is_push_send` = 0
        ORDER BY A.mb_no DESC";
$rs = sql_query($sql);

while ($row = sql_fetch_array($rs)) {
    if ($row['kinds'] == "2" && $date_nowh == "10" && $date_nowi == "01") {
        $popupMessage = "병원방문 일정이 이틀 뒤에 예정되어 있습니다 🏥 금식이나 주의사항이 있는지 확인해주세요";
        PushSend($row['token'], $row['device'], $popupMessage, $popupMessage, "");

        sql_query("UPDATE `g5_alarm_info` SET `is_push_send` = 1 WHERE `mb_no` = '{$row['mb_no']}'");
    }
}

// ============================================================
// 복약시간 알림 + 운동시간 알림
// ============================================================

$sql = "SELECT A.*, B.`device`, B.`token`
        FROM g5_alarm_info A
        JOIN `g5_member` B ON A.`mb_id` = B.`mb_id`
        WHERE (A.kinds = '1' OR A.kinds = '3') AND A.`uses` = 'Y'";
$rs = sql_query($sql);

while ($row = sql_fetch_array($rs)) {
    if ($time != $row['times2']) {
        continue;
    }

    // 복약시간 알림
    if ($row['kinds'] == "1") {
        $hour = (int)$date_nowh;
        if ($hour >= 4 && $hour <= 10) {
            $popupMessage = "아침 약물 복용시간입니다⏰";
        } elseif ($hour >= 11 && $hour <= 16) {
            $popupMessage = "점심 약물 복용시간입니다⏰";
        } elseif ($hour >= 17 && $hour <= 23) {
            $popupMessage = "저녁 약물 복용시간입니다⏰";
        } else {
            continue;
        }
        PushSend($row['token'], $row['device'], $popupMessage, $popupMessage, "");
    }

    // 운동시간 알림
    if ($row['kinds'] == "3") {
        $popupMessage = "호흡재활을 할 시간이예요! 지금 더나은호흡과 함께 하세요.💪";
        PushSend($row['token'], $row['device'], $popupMessage, $popupMessage, "");
    }
}
