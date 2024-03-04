<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Pegawai;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\SuratData;
use App\Actions\Dashboard\Surat\SuratAction;

class SuratController extends Controller
{
    /*
        ? loop data from array like this
        $pengikut = '';
        foreach ($suratData->nama as $key => $nama) {
            $umur = $suratData->umur[$key];
            $hubungan = $suratData->hubungan[$key];

            Concatenate each pengikut to the $pengikut string
            $pengikut .= "$nama ($umur tahun) - $hubungan";

            Add a comma after each pengikut except the last one
            if ($key < count($suratData->nama) - 1) {
                $pengikut .= ', ';
            }
        }
    */
    public function index()
    {
        return view('admin.surat.index');
    }
    public function create()
    {
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
        return view('admin.surat.create', compact('pegawais','pimpinans'));
    }
    public function store(Request $request,SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success','Surat Menambahkan Pegawai');
    }
    public function show(Surat $surat)
    {
        return view('admin.surat.show', compact('surat'));
    }
}
