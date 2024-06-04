<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{

    public $timestamps = false;
    
    use HasFactory;

    protected $fillable = [
        'doctor1',
        'patient1',
        'disease1',
        'medicine1',
    ];
}
