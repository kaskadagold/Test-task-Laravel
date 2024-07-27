<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'icon_id', 'icon_gray_id'];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'icon_id');
    }

    public function imageGray(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'icon_gray_id');
    }
}
