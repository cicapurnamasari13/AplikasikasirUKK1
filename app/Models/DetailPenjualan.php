<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI //

    public function penjualan()  //RELASI PELANGGAN//
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function produk()  //RELASI PELANGGAN//
    {
        return $this->belongsTo(Produk::class);
    }
}


