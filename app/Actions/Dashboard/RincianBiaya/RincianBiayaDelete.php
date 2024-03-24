<?php
namespace App\Actions\Dashboard\RincianBiaya;

use App\Models\RincianBiaya;

class RincianBiayaDelete
{
   public function execute($id)
   {
<<<<<<< Updated upstream
        $rincianBiaya = RincianBiaya::where('id', $id)->firstOrFail();
=======
        $rincianBiaya = RincianBiaya::where('slug', $slug)->firstOrFail();
        $rincianBiaya->surat()->detach();
        $rincianBiaya->rincianBiaya()->detach();
>>>>>>> Stashed changes
        $rincianBiaya->delete();
        return $rincianBiaya;
   }
}
