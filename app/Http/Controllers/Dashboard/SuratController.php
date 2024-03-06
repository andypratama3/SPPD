<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\SuratData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\Surat\SuratAction;
use App\Actions\Dashboard\Surat\ActionDeleteSurat;

class SuratController extends Controller
{
    public function index()
    {
        return view('admin.surat.index');
    }
    public function datatable()
    {
        $query = Surat::select(['nomor_surat','created_at','tempat_tujuan','slug'])->orderBy('created_at','desc');
        return DataTables::of($query)
                // ->addColumn('pegawai.name', function ($pegawai) {
                //     $pegawai_name = $pegawai->name;
                //     return $pegawai_name;
                // })
                ->addColumn('options', function ($row){
                    return '
                    <a href="' . route('dashboard.surat.show', $row->slug) . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                    <a href="' . route('dashboard.surat.edit', $row->slug) . '" class="btn btn-xs btn-primary"><i class="fa fa-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-xs btn-danger" id="btn-delete"><i class="fa fa-trash"></i></button>
                ';
                })
                ->rawColumns(['options'])
                ->addIndexColumn()
                ->make(true);
    }
    public function create()
    {
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
        return view('admin.surat.create', compact('pegawais','pimpinans'));
    }
    public function store(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success','Surat Menambahkan Pegawai');
    }
    public function show(Surat $surat)
    {
       return view('admin.surat.show', compact('surat'));
    }
    public function edit(Surat $surat)
    {
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
       return view('admin.surat.edit', compact('surat','pegawais','pimpinans'));
    }
    public function update(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success','Surat Menambahkan Pegawai');
    }
    public function destroy(ActionDeleteSurat $ActionDeleteSurat, Surat $surat)
    {
        $ActionDeleteSurat->execute($surat);
        return redirect()->route('dashboard.surat.index')->with('success','Surat Berhasil Di Hapus');
    }

}
