<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentAnalysis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Date_id',
        'Analysis_id'
    ];
}
