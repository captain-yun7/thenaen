# 서버 API 문서

> 더나은호흡 서버에서 제공하는 API 엔드포인트 및 푸시 알림 시스템

---

## 1. FCM 토큰 저장 API

Flutter 앱에서 FCM 디바이스 토큰을 서버에 전달하여 `g5_member` 테이블에 저장합니다.

### 엔드포인트

```
POST /bbs/fcm_token.php
```

### 요청 헤더

```
Content-Type: application/x-www-form-urlencoded
```

### 요청 파라미터

| 파라미터 | 타입 | 필수 | 설명 |
|----------|------|------|------|
| `token` | string | Y | FCM 디바이스 토큰 |
| `device` | string | N | 디바이스 타입. `a` = Android, `i` = iOS (기본값: `a`) |

### 인증

GnuBoard 세션 기반 인증. 로그인 상태에서만 호출 가능합니다.
WebView 앱에서 호출할 경우 쿠키가 자동으로 포함됩니다.

### 응답

**성공 (200)**
```json
{
    "result": "success"
}
```

**실패 — 로그인 필요 (200)**
```json
{
    "result": "error",
    "message": "로그인이 필요합니다"
}
```

**실패 — 토큰 누락 (200)**
```json
{
    "result": "error",
    "message": "토큰이 없습니다"
}
```

**실패 — 잘못된 HTTP 메서드 (200)**
```json
{
    "result": "error",
    "message": "POST only"
}
```

### 호출 예시

```javascript
// WebView 내 JavaScript
var xhr = new XMLHttpRequest();
xhr.open('POST', '/bbs/fcm_token.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send('token=FCM토큰값&device=a');
```

```dart
// Flutter에서 HTTP 직접 호출
import 'package:http/http.dart' as http;

await http.post(
  Uri.parse('https://도메인/bbs/fcm_token.php'),
  body: {
    'token': fcmToken,
    'device': 'a',
  },
);
```

### DB 저장 위치

| 테이블 | 필드 | 설명 |
|--------|------|------|
| `g5_member` | `token` | FCM 디바이스 토큰 |
| `g5_member` | `device` | `a` (Android) 또는 `i` (iOS) |

---

## 2. 푸시 알림 시스템 (크론잡)

### 개요

`bbs/cron_alrm.php`가 크론잡으로 매분 실행되며, 조건에 맞는 사용자에게 FCM 푸시를 발송합니다.

### 알림 종류

| 종류 | kinds 값 | 발송 조건 | 메시지 |
|------|----------|-----------|--------|
| 복약 알림 | `1` | 설정된 시간과 현재 시간 일치 | 시간대별 아침/점심/저녁 메시지 |
| 병원 일정 | `2` | 병원 방문일 2일 전 10:01 | 병원방문 알림 |
| 운동 알림 | `3` | 설정된 시간과 현재 시간 일치 | 호흡재활 운동 알림 |

### 복약 알림 시간대 구분

| 시간대 | 시간 범위 | 메시지 |
|--------|-----------|--------|
| 아침 | 04:00 ~ 10:59 | "아침 약물 복용시간입니다" |
| 점심 | 11:00 ~ 16:59 | "점심 약물 복용시간입니다" |
| 저녁 | 17:00 ~ 23:59 | "저녁 약물 복용시간입니다" |

### 관련 DB 테이블

#### g5_alarm_info

| 필드 | 타입 | 설명 |
|------|------|------|
| `mb_no` | int | PK, 알림 고유번호 |
| `mb_id` | varchar | 회원 ID |
| `kinds` | varchar | 알림 종류 (`1`: 복약, `2`: 병원, `3`: 운동) |
| `times1` | varchar | 알림 시간 1 |
| `times2` | varchar | 알림 시간 2 (매칭에 사용, 형식: `HH : mm`) |
| `times2_2ourprv` | varchar | 병원 방문 예정일 (YYYY-MM-DD 또는 YYYY-M-D) |
| `uses` | varchar | 사용 여부 (`Y`/`N`) |
| `push_alarm_use` | varchar | 푸시 알림 사용 여부 (`Y`/`N`) |
| `is_push_send` | int | 병원 알림 발송 완료 여부 (`0`: 미발송, `1`: 발송) |
| `contents` | text | 알림 내용 |

#### g5_member (푸시 관련 필드)

| 필드 | 타입 | 설명 |
|------|------|------|
| `mb_id` | varchar | 회원 ID |
| `token` | varchar | FCM 디바이스 토큰 |
| `device` | varchar | 디바이스 타입 (`a`: Android, `i`: iOS) |

### FCM v1 API 구조

#### 인증 흐름

```
서비스 계정 JSON → JWT 생성 → Google OAuth 2.0 → Access Token 발급 → FCM v1 API 호출
```

#### FCM 요청 형식

```
POST https://fcm.googleapis.com/v1/projects/{PROJECT_ID}/messages:send
Authorization: Bearer {ACCESS_TOKEN}
Content-Type: application/json
```

```json
{
    "message": {
        "token": "디바이스_FCM_토큰",
        "data": {
            "url": "",
            "title": "알림 제목",
            "body": "알림 내용",
            "emoticon": "https://도메인/img/back_image.png"
        },
        "android": {
            "priority": "high"
        }
    }
}
```

### 설정 파일

| 설정 | 위치 | 설명 |
|------|------|------|
| `FCM_SERVICE_ACCOUNT_PATH` | `bbs/cron_alrm.php` | Firebase 서비스 계정 JSON 경로 |
| `FCM_PROJECT_ID` | `bbs/cron_alrm.php` | Firebase 프로젝트 ID |
| `SITE_DOMAIN` | `bbs/cron_alrm.php` | 사이트 도메인 (이미지 URL용) |
| `service-account.json` | `data/firebase/` | Google 서비스 계정 키 파일 |

### 에러 로그

FCM 발송 실패 시 PHP `error_log`로 기록됩니다:

```
[FCM] 서비스 계정 JSON 파일을 읽을 수 없습니다: /path/to/service-account.json
[FCM] Access Token 발급 실패
[FCM] FCM_PROJECT_ID가 설정되지 않았습니다
[FCM] 푸시 발송 실패 (HTTP 401): {"error":{"code":401,"message":"..."}}
```

로그 위치는 PHP 설정에 따라 다릅니다:
- 카페24: `/home/hosting_id/www/data/log/` 또는 PHP `error_log` 경로

---

## 3. GnuBoard 기본 API (참고)

GnuBoard 5는 별도의 REST API를 제공하지 않으며, 모든 기능은 PHP 페이지 기반으로 동작합니다.
WebView 앱에서는 웹 페이지를 그대로 로드하므로 추가 API 구현 없이 동작합니다.

### 주요 URL 경로

| 기능 | URL | 설명 |
|------|-----|------|
| 메인 | `/` | 메인 페이지 |
| 로그인 | `/bbs/login.php` | 로그인 폼 |
| 회원가입 | `/bbs/register.php` | 회원가입 폼 |
| 소셜로그인 | `/plugin/social/?provider=Naver` | 네이버 로그인 시작 |
| 소셜로그인 | `/plugin/social/?provider=Google` | 구글 로그인 시작 |
| 게시판 | `/bbs/board.php?bo_table=게시판ID` | 게시판 목록 |
| 관리자 | `/adm/` | 관리자 패널 |
| FCM 토큰 | `/bbs/fcm_token.php` | FCM 토큰 저장 (POST) |
