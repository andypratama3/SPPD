<?php
namespace App\Actions\Dashboard\Pimpinan;

class PimpinanActionDelete {
    public function execute($pimpinan)
    {
        foreach ($pimpinan->surat as $surat) {
            foreach ($surat->rincianBiaya as $rincianBiaya) {
                $rincianBiaya->id;
                $rincianBiaya->delete();
            }
        }
        $pimpinan->delete();
    }
}
