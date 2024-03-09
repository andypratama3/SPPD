<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Pimpinan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\PimpinanData;
use App\Actions\Dashboard\Pimpinan\PimpinanAction;
use App\Actions\Dashboard\Pimpinan\PimpinanActionDelete;

class PimpinanController extends Controller
{
    public function index()
    {
        $pimpinans = Pimpinan::all();
        return view('admin.pimpinan.index', compact('pimpinans'));
    }
    public function create()
    {
        return view('admin.pimpinan.create');
    }
    public function store(PimpinanData $pimpinanData, PimpinanAction $pimpinanAction)
    {
        $pimpinanAction->execute($pimpinanData);
        return redirect()->route('dashboard.pimpinan.index')->with('success', 'Berhasil Menambahkan Pimpinan');
    }
    public function edit(Pimpinan $pimpinan)
    {
        return view('admin.pimpinan.edit', compact('pimpinan'));
    }
    public function update(PimpinanData $pimpinanData, PimpinanAction $pimpinanAction)
    {
        $pimpinanAction->execute($pimpinanData);
        return redirect()->route('dashboard.pimpinan.index')->with('success', 'Berhasil Update Pimpinan');
    }
    public function destroy(PimpinanActionDelete $pimpinanActionDelete, Pimpinan $pimpinan)
    {
        $pimpinanActionDelete->execute($pimpinan);
        return redirect()->route('dashboard.pimpinan.index')->with('success', 'Berhasil Hapus Pimpinan');

    }
}
