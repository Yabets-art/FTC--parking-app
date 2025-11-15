<?php
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\CarSpace;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user', 'carSpace')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'approved';
        $reservation->save();

        // Decrease the available car space count
        $carSpace = $reservation->carSpace;
        $carSpace->decrement('capacity');

        return redirect()->route('admin.reservations.index');
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'rejected';
        $reservation->save();

        return redirect()->route('admin.reservations.index');
    }
}
