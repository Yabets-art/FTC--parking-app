<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
{
    Log::info('Request data:', $request->all());

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'phone_number' => $validated['phone_number'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role'=> 'customer',
    ]);

    return response()->json($user, 201);
}

public function login(Request $request)
{
    Log::info("request data: ", $request->all());

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Retrieve the user by email
    $user = User::where('email', $request->email)->first();

    // Check if the user exists and the password matches
    if ($user && Hash::check($request->password, $user->password)) {
        // Check if the user is approved
        if (!$user->is_approved) {
            // Return a message indicating the user is not approved yet
            return response()->json(['error' => 'Your account is waiting for approval.'], 403);
        }

        // If approved, return success message (or a token if using API authentication)
        // $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['message' => "Login successful!"], 200);
    }

    Log::info("request processed: ", $user ? $user->id : 'No user found');

    return response()->json(['error' => 'Unauthorized'], 401);
}


    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User approved successfully.');
    }

    public function reject($id)
    {
        $user = User::find($id);
        $user->is_approved = false;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User rejected successfully.');
    }
}
