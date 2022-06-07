<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelamin::create([
            'gender' => 'laki-laki'
        ]);
        JenisKelamin::create([
            'gender' => 'perempuan'
        ]);
    }
}
