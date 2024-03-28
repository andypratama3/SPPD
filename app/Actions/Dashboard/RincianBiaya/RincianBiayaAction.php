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
        $total_semua_rincian = 0;

        if (is_array($data)) {
            // Iterate over each value, remove dots (thousand separator) and convert to integer
            $total_semua_rincian = array_sum(array_map(function($value) {
                return (int) str_replace('.', '', $value);
            }, $data));
        }

        $dp = str_replace('.', '', $rincianBiayaData->dp);
        $dp_int = intval($dp);

        $sisa_pembayaran = $total_semua_rincian - $dp_int;

        $input_pelunasan = str_replace('.', '', $rincianBiayaData->pelunasan);
        $pelunasan_int = intval($input_pelunasan);


        if ($dp_int + $pelunasan_int === $total_semua_rincian) {
            $update_status = 'Lunas';
            $sisa_pembayaran = 0;
            $dp_int += $pelunasan_int;
        } else {
            $update_status = 'DP';

            if ($pelunasan_int < $total_semua_rincian) {
                $sisa_pembayaran = $total_semua_rincian - ($dp_int + $pelunasan_int);
                $dp_int += $pelunasan_int;
            }
        }
        if($dp_int > $total_semua_rincian){
            $update_status = 'Lebih Dari DP';
        }

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
                'pelunasan' => $pelunasan_int,
                'status' => $update_status,
            ]
        );

        if(empty($rincianBiayaData->id)){
            $rincianBiaya->surat()->attach($rincianBiayaData->surat);
            $rincianBiaya->pegawaiRincian()->attach($rincianBiayaData->pegawai);
        }else{
            $rincianBiaya->surat()->sync($rincianBiayaData->surat);
            $rincianBiaya->pegawaiRincian()->sync($rincianBiayaData->pegawai);
        }

    }
}
