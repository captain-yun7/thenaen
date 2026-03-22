FROM ghcr.io/cirruslabs/flutter:3.29.2

WORKDIR /app
COPY . .

# SDK 35 설치 및 Gradle 캐시 정리
RUN yes | /opt/android-sdk-linux/cmdline-tools/latest/bin/sdkmanager "platforms;android-35" "build-tools;35.0.0" 2>/dev/null && \
    rm -rf /root/.gradle/caches

# Gradle wrapper URL을 services.gradle.org로 수정 (GitHub 504 우회)
RUN sed -i 's|github.com/gradle/gradle-distributions/releases/download/v[0-9.]*/|services.gradle.org/distributions/|g' android/gradle/wrapper/gradle-wrapper.properties && \
    cat android/gradle/wrapper/gradle-wrapper.properties

RUN flutter pub get
RUN flutter build apk --release
