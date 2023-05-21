<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientIllness extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Illness_id',
        'Patient_id'
    ];
}
