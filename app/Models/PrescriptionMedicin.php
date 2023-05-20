<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicin extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Medicine_id',
        'Prescription_id',
        'Repeat',
        'Note'
    ];
}
