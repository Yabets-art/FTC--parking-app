import 'package:flutter/material.dart';
import 'package:video_player/video_player.dart'; // Add the video player package
import '../screen/LoginScreen.dart';  // Import your LoginScreen here
import '../screen/HomeScreen.dart';
import '../screen/SplashScreen.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'smart parking app',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
        useMaterial3: true,
      ),
      debugShowCheckedModeBanner: false,
      home: SplashScreen(),  // Set LoginScreen as the home screen
      routes: {
        '/home': (context) => const MyHomePage(title: 'FTC Parking'),
        // Add other routes here
      },
    );
  }
}





// import 'package:flutter/material.dart';
// import 'package:video_player/video_player.dart'; // Add the video player package
// import '../screen/LoginScreen.dart';  // Import your LoginScreen here
// import '../screen/HomeScreen.dart';   // Import your HomeScreen here

// void main() {
//   runApp(const MyApp());
// }

// class MyApp extends StatelessWidget {
//   const MyApp({super.key});

//   @override
//   Widget build(BuildContext context) {
//     return MaterialApp(
//       title: 'Smart Parking App',
//       theme: ThemeData(
//         colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
//         useMaterial3: true,
//       ),
//       debugShowCheckedModeBanner: false,
//       home: SplashScreen(),  // Set SplashScreen as the home screen
//       routes: {
//         '/home': (context) => const MyHomePage(title: 'FTC Parking'),
//         // Add other routes here
//       },
//     );
//   }
// }

// // SplashScreen with a video
// class SplashScreen extends StatefulWidget {
//   @override
//   _SplashScreenState createState() => _SplashScreenState();
// }

// class _SplashScreenState extends State<SplashScreen> {
//   late VideoPlayerController _controller;
//   bool _isLoading = true; // To handle the loading state

//   @override
//   void initState() {
//     super.initState();
    
//     // Initialize the video controller
//     _controller = VideoPlayerController.asset('assets/your_animation.mp4')
//       ..initialize().then((_) {
//         setState(() {
//           _isLoading = false; // Video is loaded, stop showing the loading indicator
//         });
//         _controller.play(); // Start playing the video
//         _controller.setLooping(false); // Play video once
//       });

//     // Navigate to the login screen after the video ends
//     _controller.addListener(() {
//       if (_controller.value.position == _controller.value.duration) {
//         Navigator.of(context).pushReplacement(
//           MaterialPageRoute(builder: (context) => LoginScreen()), // Go to login screen after the splash
//         );
//       }
//     });
//   }

//   @override
//   void dispose() {
//     _controller.dispose();
//     super.dispose();
//   }

//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       body: Stack(
//         children: [
//           // Video player widget
//           _controller.value.isInitialized
//               ? AspectRatio(
//                   aspectRatio: _controller.value.aspectRatio,
//                   child: VideoPlayer(_controller),
//                 )
//               : Container(), // Empty container when the video is not initialized

//           // Show a loading indicator while the video is loading
//           if (_isLoading)
//             Center(
//               child: CircularProgressIndicator(),
//             ),
//         ],
//       ),
//     );
//   }
// }
