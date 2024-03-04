<?php
namespace App\Actions\Dashboard\Pimpinan;

use App\Models\Pimpinan;


class PimpinanAction {
    public function execute($pimpinanData)
    {
        $pimpinan = Pimpinan::updateOrCreate(
            ['slug' => $pimpinanData->slug],
            [
                'name' => $pimpinanData->name,
                'nip' => $pimpinanData->nip,
                'jabatan' => $pimpinanData->jabatan,
            ]
        );
    }
}
