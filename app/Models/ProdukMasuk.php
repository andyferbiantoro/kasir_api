<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMasuk extends Model
{
    use HasFactory;
    protected $table = 'produk_masuk';
    protected $fillable = [
        'kode_masuk','jam_masuk','tanggal_masuk','jumlah_masuk','id_supplier','id_produk'
    ];
}
