<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;



class ActionDeleteSurat
{
    public function execute($surat)
    {
        $surat = Surat::where('slug', $surat)->firstOrFail();
        $surat->delete();
    }
}
