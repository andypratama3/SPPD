<?php

namespace App\Http\Controllers\Dashboard;

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
<<<<<<< Updated upstream
    public function datatable()
    {
        $query = RincianBiaya::with('surat')->select(['id','rincian','jumlah','rp','total','keterangan','dp','sisa_pembayaran','pelunasan','status','created_at']);

        return DataTables::of($query)
                ->addColumn('nomor_surat', function ($rincian) {
                    $nomor_surat = '';
                    foreach ($rincian->surat as $surat) {
                        $nomor_surat .= $surat->nomor_surat . ', ';
                    }
                    // Remove trailing comma and space
                    return rtrim($nomor_surat, ', ');
                })
                ->addColumn('options', function ($row){
                    return '
                        <a href="' . route('dashboard.rincian.biaya.show', $row->id) . '" class="btn btn-xs btn-info"><i class="fa fa-eye text-white"></i></a>
                        <a href="' . route('dashboard.rincian.biaya.edit', $row->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-pen text-white"></i></a>
                    ';
                })
                ->rawColumns(['options'])
                ->addIndexColumn()
                ->make(true);
    }
=======

>>>>>>> Stashed changes
    public function store(RincianBiayaData $rincianData,RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        return redirect()->back()->with('success','Berhasil Menambahkan Rincian');
    }
    public function show($rincian)
    {
        $rincian = RincianBiaya::where('id', $rincian)->firstOrFail();
        return view('admin.rincian-biaya.show',compact('rincian'));
    }
    public function edit($rincian)
    {
        $rincian = RincianBiaya::where('id', $rincian)->firstOrFail();
        return view('admin.rincian-biaya.edit',compact('rincian'));

    }
    public function update(RincianBiayaData $rincianData, RincianBiayaAction $rincianBiayaAction)
    {
        $rincianBiayaAction->execute($rincianData);
        return redirect()->back()->with('success','Berhasil Update Rincian');
    }
    public function destroy(RincianBiayaDelete $rincianBiayaDelete, $slug)
    {
        $result = $rincianBiayaDelete->execute($slug);
        if($result) {
            return response()->json(['success' => 'Berhasil Rincian Biaya']);
        } else {
            return response()->json(['message' => 'Gagal Rincian Biaya'], 500);
        }

    }
    public function destroyRincianArray(Request $request,RincianBiayaActionDelete $rincianBiayaActionDelete)
    {
        $rincianBiayaActionDelete->execute($request);
        return response()->json(['success' => 'Berhasil Rincian Biaya']);
    }
}
