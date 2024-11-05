<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MedicationController;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [PatientsController::class, 'home2'])->name('home2');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/create', [PatientsController::class, 'create'])->name('create');
    Route::post('/create', [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/patients_list', [PatientsController::class, 'list_of_patients'])->name('display_patients');
    // Route for displaying the edit form
    Route::get('/patients/{id}/edit', [PatientsController::class, 'edit'])->name('patients.edit');

    // Route for handling the update request
    Route::patch('/patients/{id}', [PatientsController::class, 'update'])->name('patients.update');
    Route::resource('patients', PatientsController::class);

    Route::get('medication/create', [MedicationController::class, 'create'])->name('medication.create');
    Route::post('medication/store', [MedicationController::class, 'store'])->name('medication.store');

    Route::get('/medications', [MedicationController::class, 'index'])->name('medication.index');
    Route::delete('/medications/{id}', [MedicationController::class, 'destroy'])->name('medication.destroy');

    // Route to display the edit form
    Route::get('/medication/{id}/edit', [MedicationController::class, 'edit'])->name('medication.edit');

    // Route to handle the update request
    Route::put('/medication/{id}', [MedicationController::class, 'update'])->name('medication.update');

    Route::resource('patients', PatientsController::class);
    Route::get('patients/{id}/select-medication', [PatientsController::class, 'showSelectMedicationForm'])->name('patients.medication');
    Route::post('patients/{id}/assign-medication', [PatientsController::class, 'assignMedication'])->name('patients.assignMedication');


    // Route to display the select medication form
    Route::get('patients/{id}/medication', [PatientsController::class, 'showMedicationForm'])->name('patients.medication');

// Route to assign medication and show the table
    Route::post('patients/{id}/medication', [PatientsController::class, 'assignMedication'])->name('patients.assignMedication');

// Route to display the medication_patient table
    Route::get('medications/assigned', [PatientsController::class, 'showAssignedMedications'])->name('medications.assigned');


    Route::get('/patients/{id}/medication', [PatientsController::class, 'showMedicationForm'])->name('patients.medication');
    Route::get('/assigned-medications', [PatientsController::class, 'showAssignedMedications'])->name('medications.assigned');


});

require __DIR__.'/auth.php';
