<?php
namespace App\Actions\Dashboard\Pegawai;

use App\Models\Pegawai;


class PegawaiAction {
    public function execute($pegawaiData)
    {
        $pegawai = Pegawai::updateOrCreate(
            ['slug' => $pegawaiData->slug],
            [
                'name' => $pegawaiData->name,
                'nip' => $pegawaiData->nip,
            ]
        );
    }
}
