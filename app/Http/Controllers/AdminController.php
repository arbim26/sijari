<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index(){

        return view('dashboards.admins.index');
    }

    public function caleg()
    {
        $data = User::where('role', 1)->get();
        return view('dashboards.calegs.index', compact('data'));
    }

    public function supervisor()
    {
        $data = User::where('role', 2)->get();
        return view('dashboards.supervisors.index', compact('data'));
    }

    public function relawan()
    {
        $data = User::where('role', 3)->get();
        return view('dashboards.relawans.index', compact('data'));
    }

    public function create(Request $request)
    {
        
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->update([
            'name' => $request->name,
            'email'  => $request->email,
        ]);
        return redirect()->back()->with(['success' => 'Data berhasil di ubah!']);
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data berhasil di hapus!']);
    }

    function profile(){

        return view('dashboards.admins.profile');
    }

    function settings(){

        return view('dashboards.admins.settings');
    }
}
