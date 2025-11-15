import 'package:flutter/material.dart';

class UserProvider with ChangeNotifier {
  late User _user;
  
  User get user => _user;

  void setUser(User user) {
    _user = user;
    notifyListeners();
  }
}

class User {
  // Define user properties and methods here
}
