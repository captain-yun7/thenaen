import 'package:flutter/material.dart';
import 'webview_screen.dart';

void main() {
  runApp(const ThenaenApp());
}

class ThenaenApp extends StatelessWidget {
  const ThenaenApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: '더나은호흡',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.teal),
        useMaterial3: true,
      ),
      home: const WebViewScreen(),
    );
  }
}
