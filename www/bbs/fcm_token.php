<?php
/**
 * FCM 토큰 저장 API
 * Flutter 앱에서 FCM 토큰을 전달받아 g5_member 테이블에 저장
 *
 * POST 파라미터:
 * - token: FCM 디바이스 토큰
 * - device: 'a' (Android) 또는 'i' (iOS)
 */

include_once('./_common.php');

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['result' => 'error', 'message' => 'POST only']);
    exit;
}

if (!$member['mb_id']) {
    echo json_encode(['result' => 'error', 'message' => '로그인이 필요합니다']);
    exit;
}

$token = isset($_POST['token']) ? trim($_POST['token']) : '';
$device = isset($_POST['device']) ? trim($_POST['device']) : 'a';

if (!$token) {
    echo json_encode(['result' => 'error', 'message' => '토큰이 없습니다']);
    exit;
}

if (!in_array($device, ['a', 'i'])) {
    $device = 'a';
}

$mb_id = $member['mb_id'];
$token = sql_real_escape_string($token);
$device = sql_real_escape_string($device);

sql_query("UPDATE `{$g5['member_table']}` SET `token` = '{$token}', `device` = '{$device}' WHERE `mb_id` = '{$mb_id}'");

echo json_encode(['result' => 'success']);
