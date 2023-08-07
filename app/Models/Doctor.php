<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'Name',
        'Password',
        'Email',
        'Rate',
        'Specialization_id'
    ];

}
