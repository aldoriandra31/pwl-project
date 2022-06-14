<?php

namespace Database\Seeders;

use App\Models\Kasus;
use Illuminate\Database\Seeder;

class KasusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kasus::create([
            'kode_kasus' => 'A01',
            'nama_kasus' => 'Tidak membawa buku sesuai jadwal, Tidak Mengerjakan Tugas',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A02',
            'nama_kasus' => 'Membuat kegaduhan di kelas atau sekolah',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A03',
            'nama_kasus' => 'Mencorat-coret atau mengotori dinding, pintu, meja, kursi, pagar sekolah',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A04',
            'nama_kasus' => 'Membawa atau bermain kartu remi dan domino di sekolah',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A05',
            'nama_kasus' => 'MMemparkir sepeda/motor tidak pada tempatnya',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A06',
            'nama_kasus' => 'Bermain bola di koridor dan di dalam kelas',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A07',
            'nama_kasus' => 'Menyontek',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A08',
            'nama_kasus' => 'Melindungi teman yang bersalah',
            'poin_kasus' => 10
        ]);
        Kasus::create([
            'kode_kasus' => 'A09',
            'nama_kasus' => 'Menghidupkan Handphone waktu KBM',
            'poin_kasus' => 20
        ]);
        Kasus::create([
            'kode_kasus' => 'A10',
            'nama_kasus' => 'Berpacaran di Sekolah',
            'poin_kasus' => 20
        ]);
    }
}
