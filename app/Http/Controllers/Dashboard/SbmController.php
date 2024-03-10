<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Dashboard\Sbm\SbmAction;
use App\DataTransferObjects\SbmData;
use App\Http\Controllers\Controller;

class SbmController extends Controller
{
    public function index()
    {
        return view('admin.sbm.index');
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
}
