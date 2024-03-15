<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Sbm;
use Illuminate\Http\Request;
use App\DataTransferObjects\SbmData;
use App\Http\Controllers\Controller;
use App\Actions\Dashboard\Sbm\SbmAction;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\Sbm\SbmActionDelete;

class SbmController extends Controller
{
    public function index()
    {
        return view('admin.sbm.index');
    }
    public function datatable()
    {
        $query = Sbm::select(['biaya','daerah','satuan','nilai', 'slug']);

        return DataTables::of($query)
                ->addColumn('options', function ($row){
                    return '
                    <a href="' . route('dashboard.datamaster.sbm.edit', $row->slug) . '" class="btn btn-xs btn-warning"><i class="fa fa-pen text-white"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-xs btn-danger" id="btn-delete"><i class="fa fa-trash text-white"></i></button>
                ';
                })
                ->rawColumns(['options'])
                ->addIndexColumn()
                ->make(true);
    }
    public function create()
    {
        return view('admin.sbm.create');
    }
    public function store(SbmData $sbmData,SbmAction $sbmAction)
    {
        $sbmAction->execute($sbmData);
        return redirect()->route('dashboard.datamaster.sbm.index')->with('success', 'Berhasil Menambahkan Sbm');
    }
    public function edit(Sbm $sbm)
    {
        return view('admin.sbm.edit', compact('sbm'));
    }
    public function update(SbmData $sbmData,SbmAction $sbmAction)
    {
        $sbmAction->execute($sbmData);
        return redirect()->route('dashboard.datamaster.sbm.index')->with('success', 'Berhasil Menambahkan Sbm');
    }
    public function destroy(SbmActionDelete $sbmActionDelete, Sbm $sbm)
    {
        $sbmActionDelete->execute($sbm);
        return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Sbm Data']);
    }
}
