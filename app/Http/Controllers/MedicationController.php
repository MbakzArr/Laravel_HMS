<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Show the form for creating a new medication.
     */
    public function create()
    {
        return view('medication.create');
    }

    /**
     * Store a newly created medication in the database.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Create the medication
        medication::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect with a success message
        return redirect()->route('medication.create')->with('success', 'Medication added successfully!');
    }

    /**
     * Display a listing of the medications.
     */
    public function index()
    {
        // Get all medications
        $medications = Medication::all();

        // Pass the medications to the view
        return view('medication.index', compact('medications'));
    }

    /**
     * Remove the specified medication from the database.
     */
    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();

        return redirect()->route('medication.index')->with('success', 'Medication deleted successfully!');
    }

    public function edit($id)
    {
        $medication = Medication::findOrFail($id);
        return view('medication.edit', compact('medication'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $medication = Medication::findOrFail($id);
        $medication->name = $request->name;
        $medication->description = $request->description;
        $medication->save();

        return redirect()->route('medications.index')->with('success', 'Medication updated successfully');
    }



}
