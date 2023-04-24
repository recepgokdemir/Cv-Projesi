<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'tags',
        'about',
        'description',
        'website',
        'keywords',
        'image'
    ];

    protected $table = "portfolio";
}
