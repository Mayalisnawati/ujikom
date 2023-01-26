<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
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
        return view('admin.rumah.create');
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
            'name' => 'required|unique:rumahs',
        ]);

        $rumah = new Rumah();
        $rumah->name = $request->name;
        $rumah->save();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function show(Rumah $rumah)
    {
        $rumah = Rumah::findOrFail($id);
        return view('admin.rumah.show', compact('rumahs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumah $rumah)
    {
        $rumah = Rumah::findOrFail($id);
        return view('admin.rumah.edit', compact('rumahs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rumah  $rumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumah $rumah)
    {
        $rumahs = Rumah::findOrFail($id);

        if ($request->name != $rumahs->name) {
            $rules['name'] = 'required';
        }

        $validasiData = $request->validate($rules);

        $rumahs->name = $request->name;
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
    public function destroy(Rumah $rumah)
    {
        $locations = Rumah::findOrFail($id);
        $rumahs->delete();
        return redirect()
            ->route('rumah.index')->with('success', 'Data has been deleted');
    }
}
