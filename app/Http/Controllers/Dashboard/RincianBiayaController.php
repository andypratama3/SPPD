<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\RincianBiaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\DataTransferObjects\RincianBiayaData;
use App\Actions\Dashboard\RincianBiaya\RincianBiayaAction;
use App\Actions\Dashboard\RincianBiaya\RincianBiayaDelete;
use App\Actions\Dashboard\RincianBiaya\RincianBiayaActionDelete;

class RincianBiayaController extends Controller
{
    public function index()
    {
        return view('admin.rincian-biaya.index');
    }
    public function create()
    {
        $surats = Surat::orderBy('nomor_surat','asc')->get();
        // $pegawais = Pegawai::all();

        return view('admin.rincian-biaya.create', compact('surats'));
    }
    public function datatable()
    {
        $query = RincianBiaya::with('surat','pegawaiRincian')->select(['id','rincian','jumlah','rp','total','keterangan','dp','sisa_pembayaran','pelunasan','status','created_at']);

        return DataTables::of($query)
                ->addColumn('nomor_surat', function ($rincian) {
                    $nomor_surat = '';
                    foreach ($rincian->surat as $surat) {
                        $nomor_surat .= $surat->nomor_surat . ', ';
                    }
                    return rtrim($nomor_surat, ', ');
                })
                ->addColumn('nama.personil', function ($pegawais){
                    foreach ($pegawais->pegawaiRincian as $pegawai) {
                        return $pegawai->name;
                    }
                    // return $pegawai;
                })
                ->addColumn('options', function ($row){
                    return '
                        <a href="' . route('dashboard.rincian.biaya.show', $row->id) . '" class="btn btn-xs btn-info"><i class="fa fa-eye text-white"></i></a>
                        <a href="' . route('dashboard.rincian.biaya.edit', $row->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-pen text-white"></i></a>
                        <button data-id="' . $row['id'] . '" class="btn btn-xs btn-danger" id="btn-delete"><i class="fa fa-trash text-white"></i></button>
                    ';
                })
                ->rawColumns(['options'])
                ->addIndexColumn()
                ->make(true);
    }
    public function store(RincianBiayaData $rincianData,RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        return redirect()->route('dashboard.rincian.biaya.index')->with('success','Berhasil Update Rincian');
    }
    public function show($rincian)
    {
        $rincian = RincianBiaya::where('id', $rincian)->firstOrFail();
        return view('admin.rincian-biaya.show',compact('rincian'));
    }
    public function edit($rincian)
    {
        $surats = Surat::orderBy('nomor_surat','asc')->get();
        $pegawais = Pegawai::all();
        $rincian = RincianBiaya::where('id', $rincian)->firstOrFail();

        return view('admin.rincian-biaya.edit',compact('surats','pegawais','rincian'));

    }
    public function update(RincianBiayaData $rincianData, RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        return redirect()->back()->with('success','Berhasil Update Rincian');
    }
    public function find_pegawai(Request $request)
    {
        $surat_id = $request->surat_id;
        $surat = Surat::where('id', $surat_id)->first();

        $pegawaiData = [];

        if ($surat) {
            foreach ($surat->pegawai as $pegawai) {
                // Additional logic for each employee
                $pegawaiData[] = [
                    'id' => $pegawai->id,
                    'name' => $pegawai->name,
                    // Add more properties if needed
                ];
            }
            return response()->json(['pegawai' => $pegawaiData, 'message' => 'Berhasil Mendapatkan Data']);
        } else {
            return response()->json(['error' => 'Gagal Mendapatkan Data']);
        }
    }


    public function destroy(RincianBiayaDelete $RincianBiayaDelete, $id)
    {
        if($RincianBiayaDelete)
        {
            $RincianBiayaDelete->execute($id);
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Rincian']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Gagal Menghapus Rincian']);
        }

    }
    public function destroyRincianArray(Request $request,RincianBiayaActionDelete $rincianBiayaActionDelete)
    {
        $rincianBiayaActionDelete->execute($request);
        return response()->json(['success' => 'Berhasil Rincian Biaya']);
    }
}
