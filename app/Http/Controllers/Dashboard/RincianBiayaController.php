<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\RincianBiayaData;
use App\Actions\Dashboard\RincianBiaya\RincianBiayaAction;

class RincianBiayaController extends Controller
{
    public function store(RincianBiayaData $rincianData, RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        return redirect()->back()->with('success','Berhasil Menambahkan Rincian');
    }
    public function update(RincianBiayaData $rincianData, RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        return redirect()->back()->with('success','Berhasil Update Rincian');
    }
}
