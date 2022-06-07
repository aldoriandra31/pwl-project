<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\User;
use App\Models\UserRole;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGuruRequest;

class AdminGuruController extends Controller
{
    public function index()
    {
        $gurus = UserRole::whereRoleId(2)->with('user.guru')->simplePaginate(5);
        return view('pages.admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('pages.admin.guru.create', [
            'jenis_kelamin' => JenisKelamin::all(),
        ]);
    }

    public function store(AdminGuruRequest $request)
    {
        $user = User::create([
            'name' => $request->nama,
            'email' => trim($request->nip) . '@guru.id',
            'password' => $request->nip,
        ]);

        $user->user_role()->create([
            'role_id' => 2,
        ]);

        $user->guru()->create($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit(Guru $guru)
    {
        return view('pages.admin.guru.edit', [
            'guru' => $guru,
            'jenis_kelamin' => JenisKelamin::all(),
        ]);
    }

    public function update(AdminGuruRequest $request, Guru $guru)
    {
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diubah');
    }

    public function destroy(Guru $guru)
    {
        $guru->user->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
    }
}
