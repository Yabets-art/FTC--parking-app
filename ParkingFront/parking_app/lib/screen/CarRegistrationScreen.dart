import 'package:flutter/material.dart';
import '../service/auth_service.dart';

class CarRegistrationScreen extends StatelessWidget {
  final TextEditingController _carModelController = TextEditingController();
  final TextEditingController _vinController = TextEditingController();
  final AuthService _authService = AuthService();
  final String userId; // Use the userId passed to the constructor

  CarRegistrationScreen({Key? key, required this.userId}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Image.asset(
              'assets/logo.png', // Ensure you have a logo image in the assets
              height: 60, // Adjust size as needed
            ),
            const SizedBox(width: 10), // Space between logo and text
            const Text(
              'FTC PARKING',
              style: TextStyle(
                color: Colors.black, // Text color
                fontSize: 25, // Text size
                fontWeight: FontWeight.bold,
                fontStyle: FontStyle.italic,
                
              ),
            ),
          ],
        ),
        leading: IconButton(
          icon: const Icon(Icons.arrow_back),
          onPressed: () {
            Navigator.pop(context);
          },
        ),
        actions: <Widget>[
          IconButton(
            icon: const Icon(Icons.notifications),
            onPressed: () {
              // Handle notification icon press
            },
          ),
        ],
      ),
      body: Stack(
        children: <Widget>[
          // Background image
          Positioned.fill(
            child: Image.asset(
              'assets/golden2.png',
              fit: BoxFit.cover,
            ),
          ),
          // Content
          Padding(
            padding: const EdgeInsets.all(16.0),
            child: Column(
              children: <Widget>[
                const SizedBox(height: 150), // Increase space at the top to move down title and form
                // "Car Registration" text aligned to the left
                const Align(
                  alignment: Alignment.centerLeft,
                  child: Text(
                    'Car Registration',
                    style: TextStyle(
                      fontSize: 24,
                      fontWeight: FontWeight.bold,
                      color: Colors.black,
                    ),
                  ),
                ),
                const SizedBox(height: 30), // Increase space between title and form
                // Registration form
                Container(
                  decoration: BoxDecoration(
                    gradient: const LinearGradient(
                      colors: [Color(0xFFFFD700), Color(0xFFFFA500)], // Golden gradient
                      begin: Alignment.topLeft,
                      end: Alignment.bottomRight,
                    ),
                    borderRadius: BorderRadius.circular(10), // Rounded corners
                  ),
                  padding: const EdgeInsets.all(16.0),
                  child: Column(
                    children: [
                      TextField(
                        controller: _carModelController,
                        decoration: const InputDecoration(labelText: 'Car Model'),
                      ),
                      TextField(
                        controller: _vinController,
                        decoration: const InputDecoration(labelText: 'Vehicle Identification Number (VIN)'),
                      ),
                      const SizedBox(height: 20),
                      ElevatedButton(
                        onPressed: () async {
                          final carData = {
                            'car_model': _carModelController.text,
                            'vin': _vinController.text,
                            'user_id': userId, // Use the passed userId
                          };

                          final result = await _authService.registerCar(carData);

                          if (result['success']) {
                            ScaffoldMessenger.of(context).showSnackBar(
                              const SnackBar(content: Text('Car registered successfully!')),
                            );
                            Navigator.pushNamed(context, '/car-reservation');
                          } else {
                            ScaffoldMessenger.of(context).showSnackBar(
                              SnackBar(content: Text('Failed to register car: ${result['error']}')),
                            );
                          }
                        },
                        child: const Text('Register Car'),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
