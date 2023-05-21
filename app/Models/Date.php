<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Patient_id',
        'Doctor_id',
        'BookTime'
    ];
}
