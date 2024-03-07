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
use App\Actions\Dashboard\Surat\SuratActionDeleteArray;

class SuratController extends Controller
{
    public function index()
    {
        return view('admin.surat.index');
    }
    public function datatable()
    {
        $query = Surat::with('pegawai')->select(['nomor_surat','created_at','tempat_tujuan','slug']);

        return DataTables::of($query)
                ->addColumn('pegawai_names', function ($surat) {
                    return $surat->first()->pegawai->pluck('name')->implode(', ');
                })
                ->addColumn('options', function ($row){
                    return '
                    <a href="' . route('dashboard.surat.show', $row->slug) . '" class="btn btn-xs btn-info"><i class="fa fa-eye text-white"></i></a>
                    <a href="' . route('dashboard.surat.edit', $row->slug) . '" class="btn btn-xs btn-warning"><i class="fa fa-pen text-white"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-xs btn-danger" id="btn-delete"><i class="fa fa-trash text-white"></i></button>
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
        return redirect()->route('dashboard.surat.index')->with('success','Sukses Menambahkan Surat');
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
        // return redirect()->route('dashboard.surat.index')->with('success','Sukses Update Surat');
        return redirect()->back()->with('success','Sukses Update Surat');
    }
    public function destroy(ActionDeleteSurat $ActionDeleteSurat, Request $request)
    {
        $result = $ActionDeleteSurat->execute($surat);
        if($result) {
            return response()->json(['success' => 'Berhasil Menghapus Surat']);
        } else {
            return response()->json(['message' => 'Gagal Menghapus Surat'], 500);
        }

    }
    public function destroySuratArray(Request $request, SuratActionDeleteArray $suratActionDeleteArray)
    {
        $result = $suratActionDeleteArray->execute($request);

        if($result) {
            return response()->json(['success' => 'Berhasil Menghapus Pengikut']);
        } else {
            return response()->json(['message' => 'Gagal Menghapus Pengikut'], 500);
        }
    }


}
