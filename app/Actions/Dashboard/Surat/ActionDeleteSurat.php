<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;

class ActionDeleteSurat
{
    public function execute($surat)
    {
<<<<<<< Updated upstream
       foreach ($surat->rincianBiaya as $rincian) {
            $rincian->surat()->detach($surat->id);
            $rincian->delete();
        }
        // Detach Pegawai records
        $surat->pegawai()->detach();

        // Delete the Surat record
=======
        // $surat = Surat::where('slug', $slug)->firstOrFail();
        $surat->pegawai()->detach();
        $surat->rincianBiaya()->detach();
        foreach ($surat->rincianBiaya as $rincian) {
            $rincian->delete();
        }
>>>>>>> Stashed changes
        $surat->delete();
    }
}
