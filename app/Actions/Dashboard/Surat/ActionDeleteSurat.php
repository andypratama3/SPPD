<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;

class ActionDeleteSurat
{
    public function execute($surat)
    {
        $surat->pegawai()->detach();
        $surat->rincianBiaya()->detach();
        foreach ($surat->rincianBiaya as $rincian) {
            $rincian->delete();
        }
        $surat->delete();
    }
}
