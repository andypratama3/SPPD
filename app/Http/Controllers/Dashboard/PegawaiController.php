<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('admin.pegawai.index');
    }
    public function create()
    {
        return view('admin.pegawai.create');
    }
}
