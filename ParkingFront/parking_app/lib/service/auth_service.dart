import 'dart:convert';
import 'package:http/http.dart' as http;

class AuthService {
  final String baseUrl = 'http://127.0.0.1:8000/api';

  Future<Map<String, dynamic>> login(String email, String password) async {
    final url = '$baseUrl/login';
    final headers = {'Content-Type': 'application/json'};
    final body = json.encode({'email': email, 'password': password});

    final response = await http.post(
      Uri.parse(url),
      headers: headers,
      body: body,
    );

    if (response.statusCode == 200) {
      final responseData = json.decode(response.body);
      if (responseData['message'] == 'Login successful!') {
        return {'success': true};
      } else {
        return {'success': false, 'error': responseData['error']};
      }
    } else {
      return {'success': false, 'error': 'Waiting for admin approval'};
    }
  }

  Future<Map<String, dynamic>> registerUser(Map<String, String> data) async {
    final url = '$baseUrl/register';
    final headers = {'Content-Type': 'application/json'};
    final body = jsonEncode(data);

    final response = await http.post(
      Uri.parse(url),
      headers: headers,
      body: body,
    );

    if (response.statusCode == 201) {
      final responseData = json.decode(response.body);
      return {'success': true, 'user': responseData};
    } else {
      final responseData = json.decode(response.body);
      return {'success': false, 'error': responseData['message'] ?? 'Failed to register'};
    }
  }

  // New method for car registration
  Future<Map<String, dynamic>> registerCar(Map<String, String> data) async {
    final url = '$baseUrl/cars';
    final headers = {'Content-Type': 'application/json'};
    final body = jsonEncode(data);

    final response = await http.post(
      Uri.parse(url),
      headers: headers,
      body: body,
    );

    if (response.statusCode == 201) {
      final responseData = json.decode(response.body);
      return {'success': true, 'car': responseData};
    } else {
      final responseData = json.decode(response.body);
      return {'success': false, 'error': responseData['message'] ?? 'Failed to register car'};
    }
  }

  // New method for reservation request
  Future<Map<String, dynamic>> makeReservation(Map<String, dynamic> data) async {
    final url = '$baseUrl/reservations'; // Update with your reservation endpoint
    final headers = {'Content-Type': 'application/json'};
    final body = jsonEncode(data);

    final response = await http.post(
      Uri.parse(url),
      headers: headers,
      body: body,
    );

    if (response.statusCode == 201) {
      final responseData = json.decode(response.body);
      return {'success': true, 'reservation': responseData};
    } else {
      final responseData = json.decode(response.body);
      return {'success': false, 'error': responseData['message'] ?? 'Failed to make reservation'};
    }
  }
}
