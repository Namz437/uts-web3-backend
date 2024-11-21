<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'diskons';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'kategori_kontrakan_id',
        'kode_diskon',
        'nama_diskon',
        'persentase_diskon',
    ];

    // Booting model untuk menambahkan logika custom
    protected static function boot()
    {
        parent::boot();

        // Generate kode diskon unik sebelum data dibuat
        static::creating(function ($diskon) {
            $diskon->kode_diskon = self::generateUniqueKode();
        });
    }

    // Fungsi untuk membuat kode diskon unik
    public static function generateUniqueKode()
    {
        do {
            // Membuat kode diskon acak 8 karakter (huruf & angka)
            $kode = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        } while (self::where('kode_diskon', $kode)->exists());

        return $kode;
    }
}
