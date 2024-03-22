<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;


class SuratAction
{
    public function execute($suratData)
    {
        $nama = json_encode($suratData->nama);
        $umur = json_encode($suratData->umur);
        $hubungan = json_encode($suratData->hubungan);

        $surat = Surat::updateOrCreate(
            ['slug' => $suratData->slug],
            [
                'pimpinan_id' => $suratData->pimpinan_id,
                'nomor_surat' => $suratData->nomor_surat,
                'tujuan_perjalanan' => $suratData->tujuan_perjalanan,
                'angkutan' => $suratData->angkutan,
                'tempat_berangkat' => $suratData->tempat_berangkat,
                'tempat_tujuan' => $suratData->tempat_tujuan,
                'lama_perjalanan' => $suratData->lama_perjalanan,
                'tanggal_berangkat' => $suratData->tanggal_berangkat,
                'tanggal_kembali' => $suratData->tanggal_kembali,
                'instansi' => $suratData->instansi,
                'nama' => $nama,
                'umur' => $umur,
                'hubungan' => $hubungan,
                'mata_anggaran' => $suratData->mata_anggaran,
            ]
        );

        if(empty($suratData->slug)){
            $surat->pegawai()->attach($suratData->pegawai);
        }else{
            $surat->pegawai()->sync($suratData->pegawai);
        }
        return $surat;
    }
}
