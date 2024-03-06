<?php
namespace App\Actions\Dashboard\RincianBiaya;

use App\Models\RincianBiaya;


class RincianBiayaAction
{
    public function execute($rincianBiayaData)
    {
        $rincian = json_encode($rincianBiayaData->rincian);
        $rp = json_encode($rincianBiayaData->rp);
        $jumlah = json_encode($rincianBiayaData->jumlah);
        $total = json_encode($rincianBiayaData->total);
        $keterangan = json_encode($rincianBiayaData->keterangan);

        $data = json_decode($total, true);
        $total_semua_rincian = 0; // Initialize the total sum variable

        if (is_array($data)) {
            // Iterate over each value, remove dots (thousand separator) and convert to integer
            $total_semua_rincian = array_sum(array_map(function($value) {
                return (int) str_replace('.', '', $value);
            }, $data));
        }
        $dp = str_replace('.', '', $rincianBiayaData->dp);
        $dp_int = intval($dp);

        $sisa_pembayaran = $total_semua_rincian - $dp_int;

        $rincianBiaya = RincianBiaya::updateOrCreate(
            ['id' => $rincianBiayaData->id],
            [
                'rincian' => $rincian,
                'jumlah' => $jumlah,
                'rp' => $rp,
                'total' => $total,
                'keterangan' => $keterangan,
                'dp' => $dp_int,
                'sisa_pembayaran' => $sisa_pembayaran,
                'status' => $rincianBiayaData->status,
            ]
        );

        if(empty($rincianBiayaData->id)){
            $rincianBiaya->surat()->attach($rincianBiayaData->surat);
        }else{
            $rincianBiaya->surat()->sync($rincianBiayaData->surat);

        }

    }
}
