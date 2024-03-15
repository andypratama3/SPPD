<?php
namespace App\Actions\Dashboard\Sbm;

use App\Models\Sbm;

class SbmAction
{
    public function execute($sbmData)
    {
        $sbm = Sbm::updateOrCreate(
            ['slug' => $sbmData->slug],
            [
                'biaya' => $sbmData->biaya,
                'daerah' => $sbmData->daerah,
                'satuan' => $sbmData->satuan,
                'nilai' => $sbmData->nilai,
            ]
        );
        return $sbm;
    }
}
