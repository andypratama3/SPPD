<?php
namespace App\Actions\Dashboard\Surat;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;


class SuratAction
{
    public function execute($suratData)
    {

        $pengikut = implode(',', array_map(function ($nama, $umur, $hubungan) {
            return "$nama ($umur tahun) - $hubungan";
        }, $suratData->nama, $suratData->umur, $suratData->hubungan));

        $surat = Surat::updateOrCreate(
            ['slug' => $suratData->slug],
            [
                'pimpinan_id' => $suratData->pimpinan_id,
                'nomor_surat' => $suratData->nomor_surat,
                'pegawai_id' => $suratData->pegawai_id,
                'tujuan_perjalanan' => $suratData->tujuan_perjalanan,
                'angkutan' => $suratData->angkutan,
                'tempat_berangkat' => $suratData->tempat_berangkat,
                'tempat_tujuan' => $suratData->tempat_tujuan,
                'lama_perjalanan' => $suratData->lama_perjalanan,
                'tanggal_kembali' => $suratData->tanggal_kembali,
                'instansi' => $suratData->instansi,
                'pengikut' => $pengikut,
                'mata_anggaran' => $suratData->mata_anggaran,
            ]
        );
    }
}
