# 더나은호흡 Flutter App

## 빌드 전 필수 설정

### 1. Firebase 설정
1. [Firebase Console](https://console.firebase.google.com/)에서 프로젝트 생성
2. Android 앱 추가 (패키지명: `com.thenaen.breathing`)
3. `google-services.json` 다운로드 → `android/app/` 에 배치
4. 서비스 계정 키 다운로드 → 서버의 `www/data/firebase/service-account.json`에 배치

### 2. 도메인 설정
`lib/webview_screen.dart`의 `_baseUrl`을 카페24 배포 도메인으로 변경

### 3. 서버 FCM 설정
`www/bbs/cron_alrm.php`의 `FCM_PROJECT_ID`에 Firebase 프로젝트 ID 입력

## 빌드

```bash
# 의존성 설치
flutter pub get

# 디버그 APK
flutter build apk --debug

# 릴리즈 APK
flutter build apk --release
```

APK 출력 경로: `build/app/outputs/flutter-apk/app-release.apk`

## 릴리즈 서명 (Play Store 배포 시)

`android/key.properties` 파일 생성:
```properties
storePassword=your_password
keyPassword=your_password
keyAlias=your_alias
storeFile=/path/to/keystore.jks
```

키스토어 생성:
```bash
keytool -genkey -v -keystore keystore.jks -keyalg RSA -keysize 2048 -validity 10000 -alias your_alias
```
