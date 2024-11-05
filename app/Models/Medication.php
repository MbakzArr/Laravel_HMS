<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'description',
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'medication_patient', 'medication_id', 'patient_id');
    }
}
