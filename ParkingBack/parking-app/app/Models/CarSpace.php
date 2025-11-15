<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSpace extends Model
{
    use HasFactory;

     // Specify the table name if it's not the plural form of the model name
     protected $table = 'car_spaces';

     // The attributes that are mass assignable
     protected $fillable = [
         'location',
         'capacity',
         'availability',
     ];
 
     // If you have timestamps in your table and want to use them
     public $timestamps = true;
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
