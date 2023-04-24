<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    protected $fillable = [
        'icon_name',
        'icon_class'
    ];

    protected $table = "icons";
}
