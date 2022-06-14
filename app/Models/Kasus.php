<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kasus', 'nama_kasus', 'poin_kasus'];

    public function trxkasus()
    {
        return $this->hasMany(TrxKasus::class);
    }
}
