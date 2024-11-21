<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'pesanans';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'kontrakan_id',
        'diskon_id',
        'user_id',
        'harga_asli',
        'harga_akhir',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    // Relasi ke model Kontrakan
    public function kontrakan()
    {
        return $this->belongsTo(Kontrakan::class, 'kontrakan_id');
    }

    // Relasi ke model Diskon
    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'diskon_id');
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
