<?php

namespace App\Http\Controllers;

use App\Models\CarSpace;
use Illuminate\Http\Request;

class CarSpaceController extends Controller
{
    public function index()
    {
        $carSpaces = CarSpace::all();
        return view('admin.car_spaces.index', compact('carSpaces'));
    }

    public function create()
    {
        return view('admin.car_spaces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'availability' => 'required|boolean',
        ]);

        CarSpace::create([
            'location' => $request->input('location'),
            'capacity' => $request->input('capacity'),
            'availability' => $request->input('availability'),
        ]);

        return redirect()->route('admin.car_spaces.index')->with('success', 'Car space added successfully.');
    }

    public function edit($id)
    {
        $carSpace = CarSpace::findOrFail($id);
        return view('admin.car_spaces.edit', compact('carSpace'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'availability' => 'required|boolean',
        ]);

        $carSpace = CarSpace::findOrFail($id);
        $carSpace->update([
            'location' => $request->input('location'),
            'capacity' => $request->input('capacity'),
            'availability' => $request->input('availability'),
        ]);

        return redirect()->route('admin.car_spaces.index')->with('success', 'Car space updated successfully.');
    }

    public function destroy($id)
    {
        $carSpace = CarSpace::findOrFail($id);
        $carSpace->delete();

        return redirect()->route('admin.car_spaces.index')->with('success', 'Car space deleted successfully.');
    }
}
