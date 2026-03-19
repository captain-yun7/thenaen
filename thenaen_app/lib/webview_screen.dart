import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';
import 'package:url_launcher/url_launcher.dart';
import 'fcm_service.dart';

class WebViewScreen extends StatefulWidget {
  const WebViewScreen({super.key});

  @override
  State<WebViewScreen> createState() => _WebViewScreenState();
}

class _WebViewScreenState extends State<WebViewScreen> {
  late final WebViewController _controller;
  bool _isLoading = true;

  // TODO: 카페24 배포 후 실제 도메인으로 변경
  static const String _baseUrl = 'https://breathing.webadsky.net';

  @override
  void initState() {
    super.initState();
    _controller = WebViewController()
      ..setJavaScriptMode(JavaScriptMode.unrestricted)
      ..setNavigationDelegate(
        NavigationDelegate(
          onPageStarted: (_) {
            setState(() => _isLoading = true);
          },
          onPageFinished: (url) {
            setState(() => _isLoading = false);
            _injectFcmToken();
          },
          onNavigationRequest: (request) {
            final uri = Uri.parse(request.url);

            // 외부 링크 (전화, 메일, 지도 등)는 시스템 브라우저로
            if (uri.scheme == 'tel' || uri.scheme == 'mailto' || uri.scheme == 'sms') {
              launchUrl(Uri.parse(request.url));
              return NavigationDecision.prevent;
            }

            // 카카오 우편번호 등 외부 서비스는 허용
            if (uri.host.contains('daumcdn.net') || uri.host.contains('postcode')) {
              return NavigationDecision.navigate;
            }

            // 결제 관련 외부 URL은 시스템 브라우저로
            if (uri.host.contains('inicis') || uri.host.contains('kcp') || uri.host.contains('lg')) {
              launchUrl(Uri.parse(request.url), mode: LaunchMode.externalApplication);
              return NavigationDecision.prevent;
            }

            return NavigationDecision.navigate;
          },
        ),
      )
      ..loadRequest(Uri.parse(_baseUrl));
  }

  /// 로그인 후 페이지에 FCM 토큰을 전달
  Future<void> _injectFcmToken() async {
    final token = FcmService.currentToken;
    if (token == null) return;

    // JavaScript를 통해 서버에 토큰 전달
    await _controller.runJavaScript('''
      (function() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '$_baseUrl/bbs/fcm_token.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('token=$token&device=a');
      })();
    ''');
  }

  @override
  Widget build(BuildContext context) {
    return PopScope(
      canPop: false,
      onPopInvokedWithResult: (didPop, _) async {
        if (didPop) return;
        if (await _controller.canGoBack()) {
          _controller.goBack();
        }
      },
      child: Scaffold(
        body: SafeArea(
          child: Stack(
            children: [
              WebViewWidget(controller: _controller),
              if (_isLoading)
                const Center(child: CircularProgressIndicator()),
            ],
          ),
        ),
      ),
    );
  }
}
