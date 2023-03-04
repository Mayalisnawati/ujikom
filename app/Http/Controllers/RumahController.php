<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Location;
use App\Models\Image;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahs = Rumah::with('kota','kecamatan','kelurahan')->latest()->get();
        // $kota = Kota::all();
        // $kecamatan = Kecamatan::all();
        // dd($rumahs);
        return view('admin.rumah.index', compact('rumahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahans = Kelurahan::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        return view('admin.rumah.create', compact('kota','kecamatan','kelurahans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
                // 'location_id'=> 'required',
                'nama_rumah' => 'required',
                'kecamatan_id' => 'required',
                'kelurahan_id' => 'required',
                'id_kota' => 'required',
                'wa' => 'required',
                'alamat' => 'required',
                'spesifikasi' => 'required',
                // 'konfirmasi' => 'required',
                'harga' => 'required',
            ]);

            $rumahs = new Rumah();
            // $rumahs->location_id = $request->location_id;
            $rumahs->nama_rumah = $request->nama_rumah;
            $rumahs->kecamatan_id = $request->kecamatan_id;
            $rumahs->id_kota = $request->id_kota;
            $rumahs->kelurahan_id = $request->kelurahan_id;
            $rumahs->wa = $request->wa;
            $rumahs->alamat = $request->alamat;
            $rumahs->spesifikasi = $request->spesifikasi;
            $rumahs->harga = $request->harga;
            $rumahs->save();

            if ($request->hasfile('gambar_rumah')) {
                foreach ($request->file('gambar_rumah') as $image) {
                    $name = rand(1000, 9999) . $image->getClientOriginalName();
                    $image->move('images/gambar_rumah/', $name);
                    $images = new Image();
                    $images->rumah_id = $rumahs->id;
                    $images->gambar_rumah = 'images/gambar_rumah/' . $name;
                    $images->save();
                }
            }

            return redirect()
                ->route('rumah.index')->with('success', 'Data has been added');


    }
//         $validated = $request->validate([
//             'location_id'=> 'required',
//             'nama_rumah' => 'required',
//             'wa' => 'required',
//             'alamat' => 'required',
//             'spesifikasi' => 'required',
//             'konfirmasi' => 'required',

//         ]);

//         $rumahs = new Rumah();
//         $rumahs->location_id = $request->location_id;
//         $rumahs->nama_rumah = $request->nama_rumah;
//         $rumahs->wa = $request->wa;
//         $rumahs->alamat = $request->alamat;
//         $rumahs->spesifikasi = $request->spesifikasi;
//         $rumahs->konfirmasi = $request->konfirmasi;
//         $rumahs->save();
//         if ($request->hasfile('gambar_rumah')) {
//             foreach ($request->file('gambar_rumah') as $image) {
//                 $name = rand(1000, 9999) . $image->getClientOriginalName();
//                 $image->move('images/gambar_rumah/', $name);
//                 $images = new Image();
//                 $images->rumah_id = $rumahs->id;
//                 $images->gambar_rumah = 'images/gambar_rumah/' . $name;
//                 $images->save();
//             }
//         }
//         return redirect()
//         ->route('rumah.index')->with('success', 'Data has been added');
// }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rumahs = Rumah::findOrFail($id);
        $images = Image::where('rumah_id', $id)->get();
        return view('admin.rumah.show', compact('rumahs','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumahs = Rumah::findOrFail($id);
        $kota = Kota::all();
        $images = Image::where('rumah_id', $id)->get();
        return view('admin.rumah.edit', compact('rumahs','kota','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_rumah' => 'required',
            'id_kota' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'spesifikasi' => 'required',
            // 'status' => 'required',

            'harga' => 'required',
        ]);
        $rumahs = Rumah::findOrFail($id);
        $rumahs->nama_rumah = $request->nama_rumah;
        $rumahs->id_kota = $request->id_kota;
        $rumahs->kecamatan_id = $request->kecamatan_id;
        $rumahs->kelurahan_id = $request->kelurahan_id;
        $rumahs->wa = $request->wa;
        $rumahs->alamat = $request->alamat;
        $rumahs->spesifikasi = $request->spesifikasi;
        // $rumahs->status = $request->status;
        $rumahs->harga = $request->harga;
        $rumahs->save();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rumahs = Rumah::findOrFail($id);
        $images = Image::where('rumah_id', $id)->get();
        foreach ($images as $image) {
            $image->deleteImage();
            $image->delete();
        }
        $rumahs->delete();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been deleted');
    }

    // subKota
    public function getKecamatan($id)
    {
        $sub_kategoris = Kecamatan::where('id_kota', $id)->get();
        return response()->json($sub_kategoris);
    }
    public function getKelurahan($id)
    {
        $sub_kategori = Kelurahan::where('kecamatan_id', $id)->get();
        return response()->json($sub_kategori);
    }
}
