<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Name',
        'Type',
        'Specialization_id'
    ];
}
