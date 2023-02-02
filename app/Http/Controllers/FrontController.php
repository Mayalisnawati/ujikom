<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\Image;
use App\Models\Location;
class FrontController extends Controller
{
    public function rumahuser(Request $request)
    {
        // $pro = $request->all();
        $rumahs = Rumah::all();
        $images = Image::all();
        $locations = Location::all();
        return view('user.fitur.rumah', compact('rumahs','images','locations'));
    }
}
