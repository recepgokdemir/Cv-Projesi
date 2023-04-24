<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMedia extends Model
{
    protected $fillable = [
        'name',
        'link',
        'icon_id'
    ];

    protected $table = "social_media";

    public function icons(): BelongsTo
    {
        return $this->belongsTo(Icons::class, "icon_id", "id");
    }
}

