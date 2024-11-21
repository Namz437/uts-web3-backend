<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diskon;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $diskons = [
            ['nama_diskon' => 'Diskon Pengguna Baru', 'persentase_diskon' => 30],
            ['nama_diskon' => 'Diskon Akhir Tahun', 'persentase_diskon' => 50],
        ];

        foreach ($diskons as $diskon) {
            Diskon::create($diskon);
        }
    }
}

