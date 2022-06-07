<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.home', [
            'totalGuru' => Guru::count(),
            'totalSiswa' => Siswa::count(),
        ]);
    }
}
