<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index( )
    {
        return view('admin.user.index');
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $user = User::where('id', $id)->firstOrFail();
        $user->role = $request->role;

        $user->update();
        return redirect()->route('dashboard.user.index')->with('success','Berhasil Merubah Role');
    }
}
