<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'good_id',
        'url',
        'path'
    ];

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
