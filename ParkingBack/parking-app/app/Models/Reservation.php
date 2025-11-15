<?php
// app/Models/Reservation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'car_id', 'space_id', 'start_time', 'end_time', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carSpace()
    {
        return $this->belongsTo(CarSpace::class, 'space_id'); // Ensure this matches your column name
    }
}
