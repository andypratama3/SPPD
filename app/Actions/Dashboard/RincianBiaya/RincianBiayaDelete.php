<?php
namespace App\Actions\Dashboard\RincianBiaya;

use App\Models\RincianBiaya;

class RincianBiayaActionDelete
{
   public function execute($slug)
   {
        $rincianBiaya = RincianBiaya::where('slug', $slug)->firstOrFail();
        $rincianBiaya->surat()->detach();
        $rincianBiaya->delete();
        return $rincian;
   }
}
