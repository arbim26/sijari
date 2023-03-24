<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MasyarakatsImport;
// use App\Exports\UsersExport;
use Illuminate\Routing\Controller;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data = Masyarakat::paginate(8);
        return view('dashboards.masyarakats.index', compact('data'));
    }

    public function fileImport(Request $request) 
    {
        // dd($request);
        $request->validate(['file'=> 'required']);
        $file = $request->file('file');
        Excel::import(new MasyarakatsImport, $file->store('temp'));
        return back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
