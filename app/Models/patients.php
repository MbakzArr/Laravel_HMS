<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'address',
        'birthdate',
        'phone',
        'gender',


    ];

    // Define the many-to-many relationship with medications
    public function medications()
    {
        return $this->belongsToMany(Medication::class, 'medication_patient', 'patient_id', 'medication_id');
    }
}
