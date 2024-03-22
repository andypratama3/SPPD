<?php
namespace App\Actions\Dashboard\RincianBiaya;

use App\Models\RincianBiaya;

class RincianBiayaActionDelete
{
   public function execute($request)
   {
        $rincian_id = $request->rincian_id;
        $item_index_array = $request->item_array_index;

        $rincian = RincianBiaya::where('id', $rincian_id)->firstOrFail();

        if($rincian){
            $rincianData = [
                'rincian' => json_decode($rincian->rincian, true),
                'jumlah' => json_decode($rincian->jumlah, true),
                'rp' => json_decode($rincian->rp, true),
                'total' => json_decode($rincian->total, true),
                'keterangan' => json_decode($rincian->keterangan, true)
            ];

            $deletedTotal = 0;
            // Check if the index exists before removing it
            if (isset($rincianData['total'][$item_index_array])) {
                $deletedTotal = str_replace('.', '', $rincianData['total'][$item_index_array]);
                $rincian->sisa_pembayaran -= intval($deletedTotal);

                // Ensure sisa_pembayaran is not negative
                $rincian->sisa_pembayaran = $rincian->sisa_pembayaran;

                unset($rincianData['rincian'][$item_index_array]);
                unset($rincianData['jumlah'][$item_index_array]);
                unset($rincianData['rp'][$item_index_array]);
                unset($rincianData['total'][$item_index_array]);
                unset($rincianData['keterangan'][$item_index_array]);
            }

            // Save updated data
            $rincian->rincian = json_encode($rincianData['rincian']);
            $rincian->jumlah = json_encode($rincianData['jumlah']);
            $rincian->rp = json_encode($rincianData['rp']);
            $rincian->total = json_encode($rincianData['total']);
            $rincian->keterangan = json_encode($rincianData['keterangan']);
            $rincian->save();
        }

        return $rincian;
    }
}
