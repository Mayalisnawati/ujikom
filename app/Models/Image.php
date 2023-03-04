<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function image()
    {
    //     if ($this->gambar_rumah && file_exists(public_path('images/image/' . $this->gambar_rumah))) {
    //         return asset('images/image/' . $this->gambar_rumah);
    //     } else {
    //         return asset('images/no_image.jpg');
    //     }
    // }
    // public function deleteImage()
    // {
    //     if ($this->gambar_rumah && file_exists(public_path('images/image/' . $this->gambar_rumah))) {
    //         return unlink(public_path('images/image' . $this->gambar_rumah));
    //     }


        if ($this->gambar_rumah && file_exists(public_path($this->gambar_rumah))) {
            return asset($this->gambar_rumah);
        }
    }
        
    public function deleteImage()
    {
        // if ($this->gambar_rumah && file_exists(public_path($this->gambar_rumah))) {
        return unlink(public_path($this->gambar_rumah));
        // }
    }

    }

