<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Location;
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
        $rumahs = Rumah::latest()->get();
        return view('admin.rumah.index', compact('rumahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('admin.rumah.create', compact('locations'));
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
            'location_id'=> 'required',
            'nama_rumah' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'spesifikasi' => 'required',
            // 'status' => 'required',
            'konfirmasi' => 'required',

        ]);

        $rumahs = new Rumah();
        $rumahs->location_id = $request->location_id;
        $rumahs->nama_rumah = $request->nama_rumah;
        $rumahs->wa = $request->wa;
        $rumahs->alamat = $request->alamat;
        $rumahs->spesifikasi = $request->spesifikasi;
        // $rumahs->status = $request->status;
        $rumahs->konfirmasi = $request->konfirmasi;
        $rumahs->save();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $rumahs = Rumah::findOrFail($id);
        // return view('admin.rumah.show', compact('rumahs'));
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
        $locations = Location::all();
        return view('admin.rumah.edit', compact('rumahs','locations'));
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
            'location_id'=> 'required',
            'nama_rumah' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'spesifikasi' => 'required',
            // 'status' => 'required',
            'konfirmasi' => 'required',
        ]);
        $rumahs = Rumah::findOrFail($id);
        $rumahs->location_id = $request->location_id;
        $rumahs->nama_rumah = $request->nama_rumah;
        $rumahs->wa = $request->wa;
        $rumahs->alamat = $request->alamat;
        $rumahs->spesifikasi = $request->spesifikasi;
        // $rumahs->status = $request->status;
        $rumahs->konfirmasi = $request->konfirmasi;
        $rumahs->save();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been added');
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
        $rumahs->delete();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been deleted');
    }
}
