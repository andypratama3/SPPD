<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;


class SuratActionDeleteArray
{
    public function execute($request)
    {
        $slug = $request->slug;
        $item_index_array = $request->item_array_index;

        $surat = Surat::where('slug', $slug)->firstOrFail();

        if($surat){
            $suratData = [
                'nama' => json_decode($surat->nama, true),
                'umur' => json_decode($surat->umur, true),
                'hubungan' => json_decode($surat->hubungan, true),
            ];
            unset($suratData['nama'][$item_index_array]);
            unset($suratData['umur'][$item_index_array]);
            unset($suratData['hubungan'][$item_index_array]);
        }
        $surat->nama = json_encode($suratData['nama']);
        $surat->umur = json_encode($suratData['umur']);
        $surat->hubungan = json_encode($suratData['hubungan']);
        $surat->save();

        return $surat;
    }
}
