<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\NomorSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NomorSuratController extends Controller
{
    public function index()
    {
        $no_surat = NomorSurat::select(['id','nomor_surat'])->get();
        return view('admin.nomor_surat.index', compact('no_surat'));
    }
    public function edit($id)
    {
        $nomor_surat = NomorSurat::where('id', $id)->firstOrFail();
        return view('admin.nomor_surat.edit', compact('nomor_surat'));
    }
    public function update(Request $request, $id)
    {
        $nomor_surat = NomorSurat::where('id', $id)->firstOrFail();
        $nomor_surat->nomor_surat = $request->nomor_surat;
        $nomor_surat->update();
        return redirect()->route('dashboard.datamaster.nomor_surat.index')->with('success','Berhasil Merubah Nomor Surat');
    }
}
