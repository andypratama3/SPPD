<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Actions\Dashboard\RincianBiaya\RincianBiayaAction;

class RincianBiayaController extends Controller
{
    public function store(RincianBiayaData $rincianData,RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        dd($rincianBiayaAction);
    }
}
