<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_code',
        'name',
        'description',
        'price'
    ];

    public function images()
    {
        return $this->hasMany(GoodImage::class);
    }

    public function extensions()
    {
        return $this->hasMany(GoodExtension::class);
    }
}
