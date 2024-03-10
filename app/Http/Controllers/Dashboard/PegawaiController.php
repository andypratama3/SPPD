<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\PegawaiData;
use App\Actions\Dashboard\Pegawai\PegawaiAction;
use App\Actions\Dashboard\Pegawai\PegawaiActionDelete;

class PegawaiController extends Controller
{
    public function index()
    {
        $limit = 20;
        $pegawais = Pegawai::orderBy('name','asc')->paginate($limit);
        $count = $pegawais->count();
        $no = $limit * ($pegawais->currentPage() - 1);
        return view('admin.pegawai.index', compact('pegawais','count','no'));
    }
    public function create()
    {

        return view('admin.pegawai.create');
    }
    public function store(PegawaiData $pegawaiData, PegawaiAction $pegawiaAction)
    {
        $pegawiaAction->execute($pegawaiData);
        return redirect()->route('dashboard.datamaster.pegawai.index')->with('success','Berhasil Menambahkan Pegawai');
    }
    public function show(Pegawai $pegawai)
    {
        return view('admin.pegawai.show', compact('pegawai'));
    }
    public function edit(Pegawai $pegawai)
    {
        return view('admin.pegawai.edit', compact('pegawai'));
    }
    public function update(PegawaiData $pegawaiData, PegawaiAction $pegawiaAction)
    {
        $pegawiaAction->execute($pegawaiData);
        return redirect()->route('dashboard.datamaster.pegawai.index')->with('success','Berhasil Update Pegawai');
    }
    public function destroy(PegawaiActionDelete $pegawaiActionDelete, Pegawai $pegawai)
    {
        $pegawaiActionDelete->execute($pegawai);
        return redirect()->route('dashboard.datamaster.pegawai.index')->with('success','Berhasil Hapus Pegawai');
    }

}
