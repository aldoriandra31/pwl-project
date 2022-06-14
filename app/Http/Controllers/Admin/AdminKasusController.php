<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Kasus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminKasusRequest;

class AdminKasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Kasus::all());
        return view('pages.admin.kasus.indexkasus', [
            'kasuses' => Kasus::orderBy('kode_kasus')->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kasus.createKasus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminKasusRequest $request)
    {
        kasus::create($request->all());

        return redirect()->route('kasus.index')->with('success', 'Data Kasus berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show(Kasus $kasus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit(Kasus $kasu)
    {
        return view('pages.admin.kasus.editKasus', [
            'kasus' => $kasu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(AdminKasusRequest $request, Kasus $kasu)
    {
        $kasu->update($request->all());

        return redirect()->route('kasus.index')->with('success', 'Data Kasus berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kasus $kasu)
    {
        $kasu->delete();

        return redirect()->route('kasus.index')->with('success', 'Data kasus berhasil dihapus');
    }
}
