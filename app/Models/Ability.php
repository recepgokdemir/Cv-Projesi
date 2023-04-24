<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    protected $table = "ability";
}
