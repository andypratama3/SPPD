<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index( )
    {
        $limit = 15;
        $users = User::select(['name','email','role','slug'])->orderBy('name','asc')->paginate($limit);
        $count = $users->count();
        $no = $limit * ($users->currentPage() - 1);
        return view('admin.user.index', compact('users','count','no'));
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
    public function update(Request $request, $slug)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $user = User::where('slug', $slug)->firstOrFail();
        $user->role = $request->role;

        $user->update();
        return redirect()->route('dashboard.datamaster.user.index')->with('success','Berhasil Merubah Role');
    }
    public function destroy(UserActionDelete $userActionDelete, $slug)
    {
        if($userActionDelete){
            $userActionDelete->execute($slug);
            return response()->json(['status' => 'success','message' => 'Berhasil Menghapus User']);
        }else{
            return response()->json(['status' => 'failed','message' => 'Gagal Menghapus User']);
        }
    }
}
