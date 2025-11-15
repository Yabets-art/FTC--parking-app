<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model',
        'vehicle_identification_number',
        'user_id',  // Add this field
    ];

    public function users(){
        return $this->belongsTo(User::class); // Ensure this matches your column name
    }
}
