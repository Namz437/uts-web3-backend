<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori_Kontrakan extends Model
{
    protected $table = 'kategori_kontrakans';

    protected $fillable = ['kategori'];

    public function kontrakans()
    {
        return $this->hasMany(Kontrakan::class, 'kategori_kontrakan_id', 'id');
    }
}
