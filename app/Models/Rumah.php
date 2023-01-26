<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
