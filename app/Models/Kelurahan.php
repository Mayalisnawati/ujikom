<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rumah;

class Kelurahan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kelurahan','id_kecamatan'];
    public $timestamps = true;

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','kecamatan_id');
    }

    public function rw()
    {
        return $this->hasMany('App\Models\Rw','kelurahan_id');
    }
    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }
}
