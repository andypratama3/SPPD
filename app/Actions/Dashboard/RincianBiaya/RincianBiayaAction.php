<?php
namespace App\Actions\Dashboard\RincianBiaya;

use App\Models\Pegawai;


class RincianBiayaAction {
    public function execute($pegawaiData)
    {
        $pegawai = Pegawai::updateOrCreate(
            ['slug' => $pegawaiData->slug],
            [
                'name' => $pegawaiData->name,
                'nip' => $pegawaiData->nip,
                'jabatan' => $pegawaiData->jabatan,
                'golongan' => $pegawaiData->golongan,
            ]
        );
    }
}
