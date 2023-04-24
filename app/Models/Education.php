<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'education_year',
        'school_name',
        'department',
        'description',
        'degree'
    ];

    protected $table = "educations";
}
