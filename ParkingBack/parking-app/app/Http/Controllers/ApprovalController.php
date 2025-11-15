<?php

namespace App\Http\Controllers;

use App\Models\Car; // Adjust the namespace as necessary
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the pending car registrations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve pending car registrations
        $cars = Car::where('status', 'pending')->get();
        // return view('admin.approvals.index', compact('cars'));
    }

    /**
     * Approve a car registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->status = 'approved';
        $car->save();

        // return redirect()->route('admin.approvals.index')->with('success', 'Car registration approved.');
    }

    /**
     * Reject a car registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->status = 'rejected';
        $car->save();

        // return redirect()->route('admin.approvals.index')->with('error', 'Car registration rejected.');
    }
}
