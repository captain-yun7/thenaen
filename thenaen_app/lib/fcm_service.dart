import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/foundation.dart';

class FcmService {
  static String? currentToken;

  static Future<void> initialize() async {
    final messaging = FirebaseMessaging.instance;

    // 알림 권한 요청
    final settings = await messaging.requestPermission(
      alert: true,
      badge: true,
      sound: true,
    );

    if (settings.authorizationStatus == AuthorizationStatus.denied) {
      debugPrint('[FCM] 알림 권한이 거부되었습니다');
      return;
    }

    // FCM 토큰 가져오기
    currentToken = await messaging.getToken();
    debugPrint('[FCM] Token: $currentToken');

    // 토큰 갱신 리스너
    messaging.onTokenRefresh.listen((newToken) {
      currentToken = newToken;
      debugPrint('[FCM] Token refreshed: $newToken');
    });

    // 포그라운드 메시지 핸들러
    FirebaseMessaging.onMessage.listen((RemoteMessage message) {
      debugPrint('[FCM] 포그라운드 메시지: ${message.data}');
    });

    // 백그라운드에서 알림 클릭 시
    FirebaseMessaging.onMessageOpenedApp.listen((RemoteMessage message) {
      debugPrint('[FCM] 알림 클릭: ${message.data}');
    });
  }
}
