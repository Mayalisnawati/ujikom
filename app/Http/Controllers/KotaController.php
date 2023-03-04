<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kotas = Kota::latest()->get();
        return view('admin.kota.index', compact('kotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kota.create');
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
            'nama_kabupaten' => 'required|unique:kotas',

        ]);

        $kotas = new Kota();
        $kotas->nama_kabupaten = $request->nama_kabupaten;
        $kotas->save();
        return redirect()
            ->route('kota.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kotas = Kota::findOrFail($id);
        return view('admin.kota.show',compact('kotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $kotas = Kota::findOrFail($id);
        return view('admin.kota.edit', compact('kotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kotas = Kota::findOrFail($id);

        if ($request->nama_kabupaten != $kotas->nama_kabupaten) {
            $rules['nama_kabupaten'] = 'required';

        }

        $validasiData = $request->validate($rules);

        $kotas->nama_kabupaten = $request->nama_kabupaten;
        $kotas->save();
        return redirect()
            ->route('kota.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kotas = Kota::findOrFail($id);
        $kotas->delete();
        return redirect()
            ->route('kota.index')->with('success', 'Data has been deleted');
    }
    public function getKota($id)
    {
        $kotas = Kota::where('provinsi_id', $id)->get();
        return response()->json($kotas);
    }
}
