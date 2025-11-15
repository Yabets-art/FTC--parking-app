import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class ReservationScreen extends StatefulWidget {
  @override
  _ReservationScreenState createState() => _ReservationScreenState();
}

class _ReservationScreenState extends State<ReservationScreen> {
  final TextEditingController _startTimeController = TextEditingController();
  final TextEditingController _endTimeController = TextEditingController();

  String? selectedCar;
  String? selectedSpace;

  final AuthService _authService = AuthService();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Car Space Reservation'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            DropdownButtonFormField<String>(
              value: selectedCar,
              items: ['Car 1', 'Car 2'].map((car) {
                return DropdownMenuItem(
                  value: car,
                  child: Text(car),
                );
              }).toList(),
              onChanged: (value) {
                setState(() {
                  selectedCar = value;
                });
              },
              decoration: InputDecoration(labelText: 'Select Car'),
            ),
            DropdownButtonFormField<String>(
              value: selectedSpace,
              items: ['Space 1', 'Space 2'].map((space) {
                return DropdownMenuItem(
                  value: space,
                  child: Text(space),
                );
              }).toList(),
              onChanged: (value) {
                setState(() {
                  selectedSpace = value;
                });
              },
              decoration: InputDecoration(labelText: 'Select Car Space'),
            ),
            TextField(
              controller: _startTimeController,
              decoration: InputDecoration(labelText: 'Start Time'),
              onTap: () async {
                FocusScope.of(context).requestFocus(FocusNode());
                DateTime? pickedDate = await showDatePicker(
                  context: context,
                  initialDate: DateTime.now(),
                  firstDate: DateTime.now(),
                  lastDate: DateTime(2101),
                );
                TimeOfDay? pickedTime = await showTimePicker(
                  context: context,
                  initialTime: TimeOfDay.now(),
                );
                if (pickedTime != null) {
                  final formattedDate = DateFormat('yyyy-MM-dd').format(pickedDate!);
                  final formattedTime = pickedTime.format(context);
                  _startTimeController.text = '$formattedDate $formattedTime';
                }
              },
            ),
            TextField(
              controller: _endTimeController,
              decoration: InputDecoration(labelText: 'End Time'),
              onTap: () async {
                FocusScope.of(context).requestFocus(FocusNode());
                DateTime? pickedDate = await showDatePicker(
                  context: context,
                  initialDate: DateTime.now(),
                  firstDate: DateTime.now(),
                  lastDate: DateTime(2101),
                );
                TimeOfDay? pickedTime = await showTimePicker(
                  context: context,
                  initialTime: TimeOfDay.now(),
                );
                if (pickedTime != null) {
                  final formattedDate = DateFormat('yyyy-MM-dd').format(pickedDate!);
                  final formattedTime = pickedTime.format(context);
                  _endTimeController.text = '$formattedDate $formattedTime';
                }
              },
            ),
            SizedBox(height: 20),
            ElevatedButton(
              onPressed: () async {
                if (selectedCar != null && selectedSpace != null) {
                  final response = await _makeReservationRequest();
                  if (response.statusCode == 201) {
                    ScaffoldMessenger.of(context).showSnackBar(
                      SnackBar(content: Text('Reservation requested successfully!')),
                    );
                  } else {
                    ScaffoldMessenger.of(context).showSnackBar(
                      SnackBar(content: Text('Reservation request failed.')),
                    );
                  }
                } else {
                  ScaffoldMessenger.of(context).showSnackBar(
                    SnackBar(content: Text('Please select a car and a car space.')),
                  );
                }
              },
              child: Text('Request Reservation'),
            ),
          ],
        ),
      ),
    );
  }

  Future<http.Response> _makeReservationRequest() async {
  // Use hardcoded userId = '1'
  final userId = '1'; 

  final reservationData = {
    'car_id': selectedCar,
    'space_id': selectedSpace,
    'start_time': _startTimeController.text,
    'end_time': _endTimeController.text,
    'user_id': userId, // Assign the userId here
  };

  final response = await _authService.makeReservation(reservationData);
  return response;
}

}

class AuthService {
  Future<http.Response> makeReservation(Map<String, String?> reservationData) async {
    final url = Uri.parse('https://your-api-endpoint.com/reservations'); // Replace with your API endpoint

    final response = await http.post(
      url,
      headers: {
        'Content-Type': 'application/json',
      },
      body: jsonEncode(reservationData),
    );

    return response;
  }
}
