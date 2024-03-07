<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;

class ActionDeleteSurat
{
    public function execute($request)
    {
        $slug = $request->slug;
        $surat = Surat::where('slug', $slug)->firstOrFail();
        $surat->pegawai()->detach();
        $surat->rincianBiaya()->detach();
        $surat->delete();
    }
}
