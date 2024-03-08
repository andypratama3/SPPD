<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;

class ActionDeleteSurat
{
    public function execute($surat)
    {
       foreach ($surat->rincianBiaya as $rincian) {
            $rincian->surat()->detach($surat->id);
            $rincian->delete();
        }
        // Detach Pegawai records
        $surat->pegawai()->detach();

        // Delete the Surat record
        $surat->delete();
    }
}
