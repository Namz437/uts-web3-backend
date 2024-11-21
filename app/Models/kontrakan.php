<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrakan extends Model
{
    protected $table = 'kontrakans';

    protected $fillable = [
        'kategori_kontrakan_id',
        'image',
        'nama',
        'deskripsi',
        'alamat',
        'harga',
    ];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'kontrakan_id');
    }

    // Relasi ke model KategoriKontrakan
    public function Kategori_Kontrakan()
    {
        return $this->belongsTo(Kategori_Kontrakan::class, 'kategori_kontrakan_id');
    }
}
