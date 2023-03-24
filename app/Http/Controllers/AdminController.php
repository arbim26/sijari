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

    public function create_caleg(Request $request)
    {
        if ($request->validate(['name'=> 'required','email'=> 'required|unique:users','password' => 'required',])) {
            $data = User::create([
                'name'    => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'role'  => 1,
            ]);
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function create_supervisor(Request $request)
    {
        if ($request->validate(['name'=> 'required','email'=> 'required|unique:users','password' => 'required',])) {
            $data = User::create([
                'name'    => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'role'  => 2,
            ]);
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function create_relawan(Request $request)
    {
        if ($request->validate(['name'=> 'required','email'=> 'required|unique:users','password' => 'required',])) {
            $data = User::create([
                'name'    => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'role'  => 3,
            ]);
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan!']);
        }
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

    function chart(){
        $userData = User::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');
        
        return view('dashboards.admins.chart', compact('userData'));
    }
}
