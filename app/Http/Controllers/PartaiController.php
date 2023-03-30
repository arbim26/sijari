<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    function index(){
        $data = Partai::latest()->paginate(5);
        return view('dashboards.admins.partais.index', compact('data'));
    }

    /**
     * create
     *
     * @return void
     */
    function create()
    {
        return view('dashboards.admins.partais.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'p_nama'     => 'required',
        ]);

        //create post
        Partai::create([
            'p_nama'   => $request->p_nama,
        ]);

        //redirect to index
        // return redirect()->route('partai.index')->with(['success' => 'Data Berhasil Disimpan!']);
        return redirect()->back()->with(['success' => 'Data berhasil di ubah!']);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    // public function edit(Partai $data, $id)
    // {
    //     $data = Partai::find($id);
    //     return view('dashboards.admins.partais.edit', compact('data'));
    // }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, $id)
    {
        $data = Partai::find($id);
        $data->update([
            'p_nama' => $request->p_nama,
        ]);
        return redirect()->back()->with(['success' => 'Data berhasil di ubah!']);
    }


    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id)
    {
        $data = Partai::find($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data berhasil di hapus!']);
    }

    // public function destroy(Partai $data)
    // {
    //     //delete image
    //     Storage::delete('public/partai/'. $data->image);

    //     //delete post
    //     $data->delete();

    //     //redirect to index
    //     return redirect()->route('partai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    // }

}
