<?php

namespace App\Http\Controllers;

use App\Models\patients;
use Illuminate\Http\Request;
use App\Models\Medication;
use Illuminate\Support\Facades\DB;


class PatientsController extends Controller
{
    //
    public function index(){
        return view('layout.layout');
    }

    public function home(){
        return view('layout.home');
    }

    public function home2(){
        return view('layout.home');
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string',
        ]);

        // Create a new patient record
        patients::create([
            'name' => $request->name,
            'surname' => $request->surname, // Fix here
            'age' => $request->age,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        // Redirect back with success message
        return redirect()->route('create')->with('success', 'Patient registered successfully.');
    }

    public function list_of_patients()
    {
        $list_patients = patients::all();
        return view('patients.patientslist', compact('list_patients'));
    }

    public function edit($id)
    {
        // Find the patient by ID
        $patient = patients::findOrFail($id);

        // Return the edit view with the patient data
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string',
        ]);

        // Find the patient by ID
        $patient = patients::findOrFail($id);

        // Update the patient details
        $patient->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'age' => $request->age,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        // Redirect back with success message
        return redirect()->route('display_patients')->with('success', 'Patient updated successfully.');
    }

    public function destroy($id)
    {
        $patient = patients::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }


    // Method to show the medication selection form
    public function showSelectMedicationForm($id)
    {
        $patient = patients::findOrFail($id);
        $medications = Medication::all(); // Fetch all medications
        return view('patients.select-medication', compact('patient', 'medications'));
    }

    // Method to assign selected medication to the patient
    public function assignMedication(Request $request, $id)
    {
        $patient = patients::findOrFail($id);
        $medicationId = $request->input('medication');

        // Attach the medication to the patient
        $patient->medications()->attach($medicationId);

        // Redirect to the assigned medications table
        return redirect()->route('medications.assigned')->with('success', 'Medication assigned successfully!');
    }

    public function showAssignedMedications()
    {
        // Fetch the assigned medications along with patient details
        $assignedMedications = DB::table('medication_patient')
            ->join('patients', 'medication_patient.patient_id', '=', 'patients.id')
            ->join('medications', 'medication_patient.medication_id', '=', 'medications.id')
            ->select('patients.name as patient_name', 'patients.surname as patient_surname', 'medications.name as medication_name')
            ->get();

        return view('medication.assigned', compact('assignedMedications'));
    }





    public function showMedicationForm($id)
    {
        // Find the patient by ID
        $patient = patients::findOrFail($id);

        // Get the list of medications
        $medications = Medication::all();

        // Return the view with patient and medication data
        return view('patients.medication', compact('patient', 'medications'));
    }
}
