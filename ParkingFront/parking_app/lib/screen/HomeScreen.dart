import 'package:flutter/material.dart';
import 'CarRegistrationScreen.dart';
// ignore: unused_import
import 'reservation_screen.dart';

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int _availableSpaces = 20;
  
  get _navigateToParkingReservations => null;

  void _searchParkingSpaces() {
    print('Searching for parking spaces...');
  }

  void _viewBookings() {
    print('Viewing your bookings...');
  }

  void _navigateTo(String route) {
    Navigator.pushNamed(context, route);
  }

  void _navigateToCarRegistration() {
    Navigator.push(
      context,
      MaterialPageRoute(builder: (context) => CarRegistrationScreen(userId: '',)),
    );
  }

  void _navigateToParkingReservation() {
    Navigator.push(
      context,
      MaterialPageRoute(builder: (context) => reservation_screen()),
    );
  }

  void _showPopup(BuildContext context, String title, String message) {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return Dialog(
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(20.0),
          ),
          child: Stack(
            clipBehavior: Clip.none,
            children: [
              Container(
                padding: EdgeInsets.all(16.0),
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Container(
                      padding: EdgeInsets.symmetric(vertical: 10.0),
                      decoration: BoxDecoration(
                        borderRadius:
                            BorderRadius.vertical(top: Radius.circular(20.0)),
                        gradient: LinearGradient(
                          colors: [
                            Colors.amber.withOpacity(0.75),
                            Colors.deepOrange.withOpacity(0.75)
                          ],
                          begin: Alignment.topLeft,
                          end: Alignment.bottomRight,
                        ),
                      ),
                      child: Center(
                        child: Text(
                          title,
                          style: TextStyle(
                              color: Colors.white,
                              fontSize: 18.0,
                              fontWeight: FontWeight.bold),
                        ),
                      ),
                    ),
                    SizedBox(height: 20),
                    Text(
                      message,
                      textAlign: TextAlign.center,
                      style: TextStyle(fontSize: 16.0),
                    ),
                    SizedBox(height: 20),
                    ElevatedButton(
                      onPressed: () {
                        Navigator.of(context).pop();
                      },
                      child: Text('Close'),
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.amber, // Adjust button color
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
        );
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            CircleAvatar(
              backgroundImage: AssetImage('assets/logo.png'), // Your logo asset
              radius: 24, // Adjusted for balance
            ),
            SizedBox(width: 8),
            Text(
              'FTC Parking',
              style: TextStyle(
                fontWeight: FontWeight.bold,
                fontStyle: FontStyle.italic,
              ),
            ),
          ],
        ),
        centerTitle: true,
        actions: [
          IconButton(
            icon: Icon(Icons.notifications),
            onPressed: () {
              // Handle notifications
            },
          ),
        ],
        flexibleSpace: Container(
          decoration: BoxDecoration(
            gradient: LinearGradient(
              colors: [Colors.amber, Colors.deepOrange],
              begin: Alignment.topLeft,
              end: Alignment.bottomRight,
            ),
          ),
        ),
      ),
      drawer: Drawer(
        child: Column(
          children: <Widget>[
            DrawerHeader(
              decoration: BoxDecoration(
                gradient: LinearGradient(
                  colors: [
                    Colors.amber.withOpacity(0.75),
                    Colors.deepOrange.withOpacity(0.75),
                  ],
                  begin: Alignment.topLeft,
                  end: Alignment.bottomRight,
                ),
              ),
              child: Center(
                child: Container(
                  width: 200, // Adjust size of logo container
                  height: 175,
                  decoration: BoxDecoration(
                    image: DecorationImage(
                      image: AssetImage('assets/logo.png'), // Your logo asset
                      fit: BoxFit.cover,
                    ),
                    borderRadius: BorderRadius.circular(
                        75), // Adjust border radius for circular logo
                  ),
                ),
              ),
            ),
            Expanded(
              child: ListView(
                padding: EdgeInsets.zero,
                children: <Widget>[
                  ListTile(
                    leading: Icon(Icons.info),
                    title: Text('About Us'),
                    onTap: () {
                      Navigator.pop(context);
                      _showPopup(
                          context,
                          'About Us',
                          'FTC Car Parking is a modern and user-friendly mobile application designed to revolutionize the way you find and reserve parking spaces. '
                              'Our mission is to provide a seamless parking experience by connecting drivers with available parking spaces in real-time, reducing the stress '
                              'and time spent searching for parking.\n\n'
                              'With FTC Car Parking, you can:\n'
                              '- Search for Available Parking Spaces: Easily find and reserve parking spots nearby or at your destination.\n'
                              '- View Your Bookings: Keep track of your parking reservations and manage them with ease.\n'
                              '- Register Your Car: Simplify the process of car registration and ensure all your details are securely stored.\n\n'
                              'Whether you\'re a daily commuter, a business traveler, or just heading out for a quick errand, FTC Car Parking is here to make your parking experience smooth and hassle-free.');
                    },
                  ),
                  ListTile(
                    leading: Icon(Icons.question_answer),
                    title: Text('FAQ'),
                    onTap: () {
                      Navigator.pop(context);
                      _showPopup(
                          context,
                          'FAQ',
                          'Frequently Asked Questions:\n\n'
                              '1. How do I search for parking spaces?\n'
                              '   - Simply open the FTC Car Parking app and click on the "Search for Parking" button. The app will display available parking spaces near your current location or any other specified location.\n\n'
                              '2. How do I view my parking bookings?\n'
                              '   - You can view all your current and past parking bookings by clicking on the "View Bookings" button on the main screen of the app.\n\n'
                              '3. How do I register my car in the app?\n'
                              '   - To register your car, go to the "Register Your Car" section, fill out the necessary details, and click "Register Now." Your car\'s details will be securely stored in our system for future reservations.\n\n'
                              '4. Is FTC Car Parking available in my city?\n'
                              '   - FTC Car Parking is continuously expanding its services to new cities. Check the app to see if we currently operate in your city. If not, stay tuned, as we are always growing our network!\n\n'
                              '5. Can I cancel my parking reservation?\n'
                              '   - Yes, you can cancel a parking reservation before the start time by navigating to the "View Bookings" section and selecting the reservation you wish to cancel.\n\n'
                              '6. How do I update my profile information?\n'
                              '   - To update your profile information, click on the "Profile" section in the app. You can edit your personal details, change your password, and update your car registration information.\n\n'
                              '7. What should I do if I encounter a problem with my reservation?\n'
                              '   - If you experience any issues with your reservation, please contact our customer support team through the "Settings" section in the app.');
                    },
                  ),
                  ListTile(
                    leading: Icon(Icons.account_circle),
                    title: Text('Profile'),
                    onTap: () {
                      Navigator.pop(context);
                      _showPopup(context, 'Profile', 'Soon to be implemented.');
                    },
                  ),
                  ListTile(
                    leading: Icon(Icons.settings),
                    title: Text('Settings'),
                    onTap: () {
                      Navigator.pop(context);
                      _showPopup(
                          context, 'Settings', 'soon to be implemented.');
                    },
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
      body: Container(
        decoration: BoxDecoration(
          image: DecorationImage(
            image: AssetImage
            ("assets/parkingarea.jpg"), // Use your parking-related background image
            fit: BoxFit.cover,
          ),
        ),
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: <Widget>[
                Card(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10.0),
                  ),
                  elevation: 5,
                  color: Colors.white.withOpacity(0.8),
                  child: Stack(
                    children: [
                      // Full-width Image

                      Container(
                        height: 200,
                        decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(10.0),
                          image: DecorationImage(
                            image: AssetImage('assets/parkingarea.jpg'),
                            fit: BoxFit.cover,
                          ),
                        ),
                      ),
                      // Text and Button overlaying the image
                      Padding(
                        padding: const EdgeInsets.all(16.0),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Available Parking Spaces',
                              style: Theme.of(context)
                                  .textTheme
                                  .headlineMedium
                                  ?.copyWith(fontWeight: FontWeight.bold),
                            ),
                            SizedBox(height: 10),
                            Text(
                              '$_availableSpaces',
                              style: Theme.of(context)
                                  .textTheme
                                  .headlineLarge
                                  ?.copyWith(color: Colors.green, fontSize: 50),
                            ),
                            SizedBox(height: 20),
                            ElevatedButton.icon(
                              onPressed: _searchParkingSpaces,
                              icon: Icon(Icons.search),
                              label: Text('Search for Parking'),
                              style: ElevatedButton.styleFrom(
                                padding: EdgeInsets.symmetric(
                                    horizontal: 20, vertical: 15),
                                textStyle: TextStyle(fontSize: 18),
                              ),
                            ),
                            SizedBox(height: 20),
                            ElevatedButton.icon(
                              onPressed: _viewBookings,
                              icon: Icon(Icons.bookmark),
                              label: Text('View Bookings'),
                              style: ElevatedButton.styleFrom(
                                padding: EdgeInsets.symmetric(
                                    horizontal: 20, vertical: 15),
                                textStyle: TextStyle(fontSize: 18),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
                SizedBox(height: 20),
                TextButton(
                  onPressed: _navigateToParkingReservations,
                  child: Text(
                    'Manage Your Reservations',
                    style: TextStyle(
                      fontSize: 16,
                      color: Theme.of(context).colorScheme.primary,
                    ),
                  ),
                ),
                SizedBox(height: 20), // Added spacing
                // Car Registration Box
                Card(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10.0),
                  ),
                  elevation: 5,
                  color: Colors.white.withOpacity(0.8),
                  child: Stack(
                    children: [
                      // Full-width Image
                      Container(
                        height: 200,
                        decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(10.0),
                          image: DecorationImage(
                            image: AssetImage('assets/car_image.png'),
                            fit: BoxFit.cover,
                          ),
                        ),
                      ),
                      // Text and Button overlaying the image
                      Padding(
                        padding: const EdgeInsets.all(16.0),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Register Your Car',
                              style: Theme.of(context)
                                  .textTheme
                                  .headlineMedium
                                  ?.copyWith(
                                    fontWeight: FontWeight.bold,
                                    color: Colors.white,
                                  ),
                            ),
                            SizedBox(height: 10),
                            Container(
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(30.0),
                                gradient: LinearGradient(
                                  colors: [Colors.green, Colors.lightGreen],
                                  begin: Alignment.topLeft,
                                  end: Alignment.bottomRight,
                                ),
                              ),
                              child: ElevatedButton.icon(
                                onPressed: _navigateToCarRegistration,
                                icon: Icon(Icons.car_rental),
                                label: Text('Register Now'),
                                style: ElevatedButton.styleFrom(
                                  padding: EdgeInsets.symmetric(
                                      horizontal: 20, vertical: 15),
                                  backgroundColor: Colors.transparent,
                                  textStyle: TextStyle(fontSize: 18),
                                  shadowColor:
                                      Colors.transparent, // Remove shadow
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
  
  reservation_screen() {}
}

