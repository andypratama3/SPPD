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
    public function datatable()
    {
        $query = Surat::with('pegawai')->select(['nomor_surat','pegawai_id','created_at','tempat_tujuan','slug'])->orderBy('created_at','desc');
        return DataTables::of($query)
                ->addColumn('pegawai.name', function ($pegawai) {
                    $pegawai_name = $pegawai->name;
                    return $pegawai_name;
                })
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
    public function store(Request $request,SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success','Surat Menambahkan Pegawai');
    }
    public function show(Surat $surat)
    {
    //    dd($surat->pengikut);
       return view('admin.surat.show', compact('surat'));
    }
}
