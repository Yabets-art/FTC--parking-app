<?php
namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Display admin dashboard
        return view('admin.dashboard');
    }

    public function approvals()
    {
        // Display car registration approvals
        $cars = Car::all();
        // return view('admin.approvals', compact('cars'));
    }

    public function carSpaces()
    {
        // Display car space management
        $reservations = Reservation::all();
        return view('admin.car_spaces', compact('reservations'));
    }



    public function approve($id)
    {
        // Logic to approve the car registration
        $car = Car::findOrFail($id);
        $car->status = 'approved';
        $car->save();

        // return redirect()->route('admin.approvals')->with('success', 'Car registration approved successfully!');
    }

    public function reject($id)
    {
        // Logic to reject the car registration
        $car = Car::findOrFail($id);
        $car->status = 'rejected';
        $car->save();

        // return redirect()->route('admin.approvals')->with('error', 'Car registration rejected.');
    }
}
