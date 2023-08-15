<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'Patient_id',
        'MedicalFile_id',
    ];
}
