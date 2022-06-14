<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kasus;
use App\Models\Siswa;
use App\Models\TrxKasus;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->user_role->role->name == 'guru') {
            return view('pages.pelanggaran.indexPelanggaran', [
                'trxkasus' => TrxKasus::whereGuruId(auth()->user()->guru->id)->with('siswa', 'guru', 'kasus')->simplePaginate(4)
            ]);
        }
        return view('pages.pelanggaran.indexPelanggaran', [
            'trxkasus' => TrxKasus::with('siswa', 'guru', 'kasus')->simplePaginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pelanggaran.createPelanggaran', [
            'siswas' => Siswa::all(),
            'gurus' => Guru::all(),
            'kasuses' => Kasus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus = $request->validate([
            'siswa_id' => ['required'],
            'guru_id' => ['required'],
            'kasus_id' => ['required'],
            'tanggal_pelanggaran' => ['required', 'date'],
            'gambar' => ['nullable', 'image', 'file', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $kasus['gambar'] = $fileName = time() . $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('public/kasus', $fileName);
        } else {
            $kasus['gambar'] = 'default.png';
        }

        TrxKasus::create($kasus);

        return redirect()->route('pelanggaran.index')->with('success', 'Kasus berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(TrxKasus $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TrxKasus $pelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrxKasus $pelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrxKasus $pelanggaran)
    {
        //
    }
}
