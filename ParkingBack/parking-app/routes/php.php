<!-- <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarSpaceController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});



// Route::post('/register', [UserController::class, 'register']);
// Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('car-spaces', CarSpaceController::class);
    Route::resource('reservations', ReservationController::class);  
});


// app/Events/ReservationApproved.php
// namespace App\Events;

// use App\Models\Reservation;
// use Illuminate\Broadcasting\Channel;
// use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Broadcasting\PresenceChannel;
// use Illuminate\Foundation\Events\Dispatchable;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Broadcasting\ShouldBroadcast;

// class ReservationApproved implements ShouldBroadcast
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     public $reservation;

//     public function __construct(Reservation $reservation)
//     {
//         $this->reservation = $reservation;
//     }

//     public function broadcastOn()
//     {
//         return new Channel('reservations');
//     }

//     public function broadcastWith()
//     {
//         return [
//             'id' => $this->reservation->id,
//             'status' => $this->reservation->status,
//         ];
//     }
// }


// use App\Events\ReservationApproved;

// // Inside your controller or service class
// function approveReservation($id)
// {
//     $reservation = Reservation::findOrFail($id);
//     // Update reservation status
//     $reservation->status = 'approved';
//     $reservation->save();

//     // Dispatch the event
//     broadcast(new ReservationApproved($reservation));

//     // Optionally notify via email
//     Notification::send($reservation->user, new ReservationNotification($reservation));

//     return redirect()->route('admin.reservations');}
