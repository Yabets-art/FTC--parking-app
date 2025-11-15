<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; // Assuming you have a Car model
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{

    /**
     * Display a listing of the cars.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all cars from the database
        $cars = Car::all(); // Eager load user to reduce queries
        $this->attachUser($cars);
        // $cars["user"] = User::find($cars->user_id);
        // Return the index view with the list of cars
        return view('admin.car.index', compact('cars'));
    }

    public function attachUser($cars){
        foreach ($cars as  $car) {
            $car->user = User::find($car->user_id);
        }

        return $cars;
    }
    public function register(Request $request)
{
    Log::info("request received: ", $request->all());
    
    // $validation = Validator::make($request->all(), [
    //     'car_model' => 'required',
    //     'vehicle_identification_number' => 'required',
    //     'user_id' => 'required',
    // ]);

    // if($validation->fail()){
    //     return response()->json(["status"=>false,"message"=>"include all the variable"]);
    // }
    

    // Log::info("request create start: ");
    // Create a new Car record
    $car = Car::create([
        'car_model' => $request->car_model,
        'vehicle_identification_number' => $request->vin,
        'user_id' => (int)$request->user_id, // Save the user_id
    ]);
    // Log::info("create end: ");

    return response()->json(['message' => 'Car registered successfully'], 201);
}

}
