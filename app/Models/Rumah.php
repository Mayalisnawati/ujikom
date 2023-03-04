<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Location;
use App\Models\Kelurahan;
use App\Models\Kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function kota()
    {
        return $this->belongsTo('App\Models\Kota','id_kota');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
?>
