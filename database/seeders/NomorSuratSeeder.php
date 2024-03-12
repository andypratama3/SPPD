<?php

namespace Database\Seeders;

use App\Models\NomorSurat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NomorSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NomorSurat::create(['nomor_surat' => '/PL21/SPPD/2024' ]);
    }
}
