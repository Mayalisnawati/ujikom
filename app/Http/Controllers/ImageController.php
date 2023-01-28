<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Rumah;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->get();
        return view('admin.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rumahs = Rumah::all();
        return view('admin.image.create', compact('rumahs'));
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
            'rumah_id' => 'required',
            'gambar_rumah' => 'required',
        ]);

        $images = new Image();
        $images->rumah_id = $request->rumah_id;
        // $images->gambar_rumah = $request->gambar_rumah;
        // if ($request->hasFile('gambar_rumah')) {
        //     $image = $request->file('gambar_rumah');
        //     $name = rand(1000, 9999) . $image->getClientOriginalName();
        //     $image->move('images/image/', $name);
        //     $images->gambar_rumah = $name;
        // }
        if ($request->hasfile('gambar_rumah')) {
            foreach ($request->file('gambar_rumah') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/gambar_rumah/', $name);
                $images = new Image();
                $images->rumah_id = $request->rumah_id;
                $images->gambar_rumah = 'images/gambar_rumah/' . $name;
                $images->save();
            }}
        $images->save();
        return redirect()
            ->route('image.index')->with('succes','Data has been added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumahs = Rumah::all();
        $images = Image::findOrFail($id);
        return view('admin.image.edit', compact('images','rumahs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rumah_id' => 'required',
            'gambar_rumah' => 'required',

        ]);
        $images = Image::findOrFail($id);
        $images->rumah_id = $request->rumah_id;
        $images->gambar_rumah = $request->gambar_rumah;
        if ($request->hasfile('gambar_rumah')) {
            foreach ($request->file('gambar_rumah') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/gambar_rumah/', $name);
                $images = new Image();
                $images->rumah_id = $request->rumah_id;
                $images->gambar_rumah = 'images/gambar_rumah/' . $name;
            }}
        $images->update();
        return redirect()
            ->route('image.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $images = Image::findOrFail($id);
        $images->delete();
        return redirect()
            ->route('image.index')->with('success', 'Data has been deleted');
    }
}
