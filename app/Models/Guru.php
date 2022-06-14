<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trxkasus()
    {
        return $this->hasMany(TrxKasus::class);
    }
}
