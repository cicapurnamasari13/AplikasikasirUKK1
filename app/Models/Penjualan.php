<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // MENGATUR HANYA COLUMN ID YANG TIDAK BOLEH DI ISI //

    public function detailpenjualan()  //RELASI PENJUALAN/
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
