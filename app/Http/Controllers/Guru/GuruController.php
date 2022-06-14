<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index()
    {
        return view('pages.guru.home', [
            'totalGuru' => Guru::count(),
            'totalSiswa' => Siswa::count(),
        ]);
    }
}
