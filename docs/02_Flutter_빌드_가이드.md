# Flutter 앱 빌드 가이드

> 더나은호흡 WebView 앱을 Flutter로 빌드하여 APK를 생성하는 절차

---

## 1. 개발 환경 설정

### 1-1. 필수 설치 항목

| 도구 | 버전 | 설치 방법 |
|------|------|-----------|
| Flutter SDK | 3.x 이상 | https://docs.flutter.dev/get-started/install |
| Android Studio | 최신 | https://developer.android.com/studio |
| JDK | 17 | Android Studio에 포함 |
| Android SDK | API 34 | Android Studio SDK Manager에서 설치 |

### 1-2. Flutter 설치 확인

```bash
flutter doctor
```

아래 항목이 모두 체크되어야 합니다:
- [v] Flutter
- [v] Android toolchain
- [v] Android Studio

---

## 2. Firebase 프로젝트 설정

### 2-1. Firebase 프로젝트 생성

1. [Firebase Console](https://console.firebase.google.com/) 접속
2. **프로젝트 추가** 클릭
3. 프로젝트 이름: `thenaen` (또는 원하는 이름)
4. Google Analytics는 선택사항

### 2-2. Android 앱 등록

1. Firebase 프로젝트 → **앱 추가** → Android
2. 패키지 이름: `com.thenaen.breathing`
3. 앱 닉네임: `더나은호흡`
4. SHA-1 인증서 지문:
   ```bash
   # 디버그 키스토어 SHA-1
   keytool -list -v -keystore ~/.android/debug.keystore -alias androiddebugkey -storepass android -keypass android
   ```
5. `google-services.json` 다운로드

### 2-3. google-services.json 배치

다운로드한 파일을 아래 경로에 복사:

```
thenaen_app/android/app/google-services.json
```

### 2-4. 서버용 서비스 계정 키 발급

1. Firebase Console → **프로젝트 설정** → **서비스 계정** 탭
2. **새 비공개 키 생성** 클릭
3. JSON 파일 다운로드 → 서버의 `www/data/firebase/service-account.json`에 배치
4. `www/bbs/cron_alrm.php`에서 `FCM_PROJECT_ID`에 프로젝트 ID 입력

---

## 3. 앱 설정

### 3-1. 도메인 변경

[lib/webview_screen.dart](../thenaen_app/lib/webview_screen.dart) 파일에서 `_baseUrl`을 카페24 배포 도메인으로 변경:

```dart
// 21번째 줄
static const String _baseUrl = 'https://www.실제도메인.com';
```

### 3-2. 앱 아이콘 변경 (선택)

앱 아이콘을 변경하려면:

1. 아이콘 이미지 준비 (1024x1024, PNG)
2. [Android Asset Studio](https://romannurik.github.io/AndroidAssetStudio/icons-launcher.html) 에서 생성
3. 생성된 파일을 `android/app/src/main/res/` 아래 각 `mipmap-*` 폴더에 덮어쓰기

또는 `flutter_launcher_icons` 패키지 사용:

```yaml
# pubspec.yaml에 추가
dev_dependencies:
  flutter_launcher_icons: ^0.14.3

flutter_launcher_icons:
  android: true
  image_path: "assets/icon.png"
```

```bash
flutter pub get
dart run flutter_launcher_icons
```

### 3-3. 앱 이름 변경

`android/app/src/main/AndroidManifest.xml`의 `android:label` 속성:

```xml
<application android:label="더나은호흡" ...>
```

### 3-4. 패키지명 변경 (필요시)

`android/app/build.gradle`의 `applicationId`:

```groovy
defaultConfig {
    applicationId "com.thenaen.breathing"  // 원하는 패키지명으로 변경
}
```

---

## 4. 빌드

### 4-1. 의존성 설치

```bash
cd thenaen_app
flutter pub get
```

### 4-2. 디버그 빌드 (테스트용)

```bash
flutter build apk --debug
```

출력: `build/app/outputs/flutter-apk/app-debug.apk`

### 4-3. 릴리즈 빌드

```bash
flutter build apk --release
```

출력: `build/app/outputs/flutter-apk/app-release.apk`

### 4-4. 용량 최적화 빌드 (ABI별 분리)

```bash
flutter build apk --split-per-abi --release
```

출력:
- `app-armeabi-v7a-release.apk` (32비트, ~15MB)
- `app-arm64-v8a-release.apk` (64비트, ~15MB)
- `app-x86_64-release.apk` (에뮬레이터용)

---

## 5. 테스트

### 5-1. 에뮬레이터 테스트

```bash
flutter run
```

### 5-2. 실기기 테스트

1. Android 기기에서 **개발자 옵션** → **USB 디버깅** 활성화
2. USB 연결 후:
   ```bash
   flutter run
   ```

### 5-3. APK 직접 설치

```bash
adb install build/app/outputs/flutter-apk/app-release.apk
```

### 5-4. 테스트 체크리스트

- [ ] 앱 정상 실행 및 스플래시 화면 표시
- [ ] WebView에서 웹사이트 정상 로드
- [ ] 로그인/로그아웃 동작
- [ ] 네이버/구글 소셜로그인 동작
- [ ] 뒤로가기 버튼으로 WebView 히스토리 탐색
- [ ] 전화번호/이메일 링크 클릭 시 시스템 앱 연동
- [ ] FCM 푸시 알림 권한 요청 팝업
- [ ] FCM 토큰이 서버에 정상 전달 (DB 확인)
- [ ] 앱이 백그라운드일 때 푸시 알림 수신
- [ ] 푸시 알림 클릭 시 앱 포그라운드로 전환
- [ ] 카카오 우편번호 검색 동작

---

## 6. Google Play Store 배포 (선택)

### 6-1. 릴리즈 키스토어 생성

```bash
keytool -genkey -v \
  -keystore thenaen-release.jks \
  -keyalg RSA \
  -keysize 2048 \
  -validity 10000 \
  -alias thenaen
```

> 생성된 `thenaen-release.jks` 파일과 비밀번호를 안전하게 보관하세요.
> 분실 시 앱 업데이트가 불가능합니다.

### 6-2. key.properties 설정

`android/key.properties` 파일 생성:

```properties
storePassword=키스토어_비밀번호
keyPassword=키_비밀번호
keyAlias=thenaen
storeFile=/절대/경로/thenaen-release.jks
```

### 6-3. build.gradle 수정

`android/app/build.gradle`에서 `signingConfigs` 수정:

```groovy
def keystoreProperties = new Properties()
def keystorePropertiesFile = rootProject.file('key.properties')
if (keystorePropertiesFile.exists()) {
    keystoreProperties.load(new FileInputStream(keystorePropertiesFile))
}

android {
    // ...
    signingConfigs {
        release {
            keyAlias keystoreProperties['keyAlias']
            keyPassword keystoreProperties['keyPassword']
            storeFile keystoreProperties['storeFile'] ? file(keystoreProperties['storeFile']) : null
            storePassword keystoreProperties['storePassword']
        }
    }
    buildTypes {
        release {
            signingConfig signingConfigs.release
            minifyEnabled true
            proguardFiles getDefaultProguardFile('proguard-android-optimize.txt'), 'proguard-rules.pro'
        }
    }
}
```

### 6-4. App Bundle 빌드

Google Play는 AAB(Android App Bundle) 형식을 권장합니다:

```bash
flutter build appbundle --release
```

출력: `build/app/outputs/bundle/release/app-release.aab`

### 6-5. Play Console 업로드

1. [Google Play Console](https://play.google.com/console) 접속
2. 개발자 계정 등록 (등록비 $25, 1회)
3. **앱 만들기** → 앱 정보 입력
4. **프로덕션** → **새 버전 만들기** → AAB 파일 업로드
5. 앱 심사 제출

---

## 7. 프로젝트 구조 참고

```
thenaen_app/
├── android/
│   ├── app/
│   │   ├── build.gradle              # Android 빌드 설정
│   │   ├── google-services.json      # Firebase 설정 (직접 배치 필요)
│   │   ├── proguard-rules.pro        # ProGuard 규칙
│   │   └── src/main/
│   │       └── AndroidManifest.xml   # 앱 권한 및 설정
│   ├── build.gradle                  # 프로젝트 빌드 설정
│   ├── settings.gradle               # Gradle 플러그인 설정
│   └── gradle.properties             # Gradle 속성
├── lib/
│   ├── main.dart                     # 앱 진입점 + 스플래시
│   ├── webview_screen.dart           # WebView 메인 화면
│   └── fcm_service.dart              # FCM 토큰/알림 관리
└── pubspec.yaml                      # Flutter 의존성
```
