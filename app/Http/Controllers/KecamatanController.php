<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kota;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kecamatans = Kecamatan::latest()->get();
        return view('admin.kecamatan.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return view('admin.kecamatan.create',compact('kota'));
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
            'nama_kecamatan' => 'required|unique:kecamatans',

        ]);

        $kecamatans = new Kecamatan();
        $kecamatans->nama_kecamatan = $request->nama_kecamatan;
        $kecamatans->id_kota = $request->id_kota;
        $kecamatans->save();
        return redirect()
            ->route('kecamatan.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        $kecamatans = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit', compact('kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {

        $kecamatans = Kecamatan::findOrFail($id);

        if ($request->nama_kecamatan != $kecamatans->nama_kecamatan) {
            $rules['nama_kecamatan'] = 'required';

        }

        $validasiData = $request->validate($rules);

        $kecamatans->nama_kecamatan = $request->nama_kecamatan;
        $kecamatans->save();
        return redirect()
            ->route('kecamatan.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatans = Kecamatan::findOrFail($id);
        $kecamatans->delete();
        return redirect()
            ->route('kecamatan.index')->with('success', 'Data has been deleted');
    }
    public function getKecamatan($id)
    {
        $kecamatans = Kecamatan::where('kecamatan_id', $id)->get();
        return response()->json($kecamatans);
    }
}
