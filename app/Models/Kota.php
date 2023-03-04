<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rumah;
class Kota extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kabupaten'];
    public $timestamps = true;

    // public function provinsi()
    // {
    //     return $this->belongsTo('App\Models\Provinsi','id_provinsi');
    // }

    public function kecamatan()
    {
        return $this->hasMany('App\Models\Kecamatan','id_kota');
    }
    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }
}
