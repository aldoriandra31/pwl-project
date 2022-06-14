<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxKasus extends Model
{
    use HasFactory;
    protected $dates = ['tanggal_pelanggaran'];

    protected $fillable = ['siswa_id', 'guru_id', 'kasus_id', 'tanggal_pelanggaran', 'gambar'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }
}
