<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;
use App\Models\RincianBiaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $surat_count = Surat::count();
        $pimpinan_count = Pimpinan::count();
        $pegawai_count = Pegawai::count();
        $rincianBiaya_count = RincianBiaya::count();
        return view('admin.index', compact(
            'surat_count',
            'pimpinan_count',
            'pegawai_count',
            'rincianBiaya_count',
        ));
    }
}
