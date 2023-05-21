<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'PlaceName',
        'Address_id',
        'Doctor_id',
        'Day',
        'FromTime',
        'ToTime',
    ];
}
