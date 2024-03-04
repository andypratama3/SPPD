<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratController extends Controller
{
    public function index()
    {
        return view('admin.surat.index');
    }
    public function create()
    {
        $pegawais = Pegawai::all();

        return view('admin.surat.create', compact('pegawais'));
    }
    public function store(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success','Surat Menambahkan Pegawai');
    }
}
