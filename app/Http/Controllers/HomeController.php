<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user_role->role->name;
        if ($user == 'admin') {
            return redirect()->route('admin.home');
        } elseif ($user == 'guru') {
            return redirect()->route('guru.home');
        } elseif ($user == 'siswa') {
            return redirect()->route('siswa.home');
        }
    }
}
