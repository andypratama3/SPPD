<?php
namespace App\Actions\Dashboard\RincianBiaya;

use App\Models\RincianBiaya;

class RincianBiayaDelete
{
   public function execute($id)
   {
        $rincianBiaya = RincianBiaya::where('id', $id)->firstOrFail();
        $rincianBiaya->delete();
        return $rincianBiaya;
   }
}
