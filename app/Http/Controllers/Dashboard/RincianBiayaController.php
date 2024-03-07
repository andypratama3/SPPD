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
