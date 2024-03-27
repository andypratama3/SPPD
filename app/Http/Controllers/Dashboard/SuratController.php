<?php

namespace App\Http\Controllers\Dashboard;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Pimpinan;
use App\Models\NomorSurat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $query = Surat::all();

        return DataTables::of($query)
                ->addColumn('created_at', function ($surat) {
                    return date('d-m-Y', strtotime($surat->created_at));
                })
                ->addColumn('pegawai_names', function ($surat) {
                    $pegawaiNames = '';
                    foreach ($surat->pegawai as $pegawai) {
                        $pegawaiNames .= $pegawai->name . ', ';
                    }
                    $pegawaiNames = rtrim($pegawaiNames, ', ');
                    return $pegawaiNames;
                })
                ->addColumn('options', function ($row){
                    return '
                    <a href="' . route('dashboard.surat.cetakPdf', $row->slug) . '" class="btn btn-xs btn-success" target="_blank"><i class="fa fa-file-pdf text-white"></i></a>
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
        $nomor_surat = NomorSurat::all();
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
        return view('admin.surat.create', compact('nomor_surat','pegawais','pimpinans'));
    }
    public function store(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        return redirect()->route('dashboard.surat.index')->with('success',"Sukses Menambahkan Surat");
    }
    public function show(Surat $surat)
    {

       $nomor_surat = NomorSurat::all();
       return view('admin.surat.show', compact('surat','nomor_surat'));
    }
    public function edit(Surat $surat)
    {
        $nomor_surat = NomorSurat::all();
        $pegawais = Pegawai::all();
        $pimpinans = Pimpinan::all();
        return view('admin.surat.edit', compact('nomor_surat','surat','pegawais','pimpinans'));
    }
    public function update(SuratData $suratData, SuratAction $suratAction)
    {
        $suratAction->execute($suratData);
        // return redirect()->route('dashboard.surat.index', $suratData->slug)->with('success','Sukses Update Surat');
        return redirect()->back()->with('success','Sukses Update Surat');
    }
    public function destroy(ActionDeleteSurat $ActionDeleteSurat, Surat $surat)
    {
        if($ActionDeleteSurat)
        {
            $ActionDeleteSurat->execute($surat);
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Surat']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Surat']);
        }
    }
    public function destroySuratArray(Request $request, SuratActionDeleteArray $suratActionDeleteArray)
    {
        if($suratActionDeleteArray)
        {
            $suratActionDeleteArray->execute($request);
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Surat']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Surat']);
        }
    }
    public function cetak_pdf($slug)
    {
        $surat = Surat::where('slug', $slug)->first();
        $nomor_surat = NomorSurat::all();
        $tgl_berangkat = $surat->tanggal_berangkat;
        $tgl_berangkat_formated = date('Y-m-d', strtotime($tgl_berangkat));
        $tgl_kembali = $surat->tanggal_kembali;
        $tgl_kembali_formated = date('Y-m-d', strtotime($tgl_kembali));

        return view('admin.cetak.cetak_surat',compact('surat','nomor_surat', 'tgl_berangkat_formated', 'tgl_kembali_formated'));

    }




}
