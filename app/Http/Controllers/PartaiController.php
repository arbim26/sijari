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
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_partai'     => 'required|',
            'ketua_partai'   => 'required|'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/partai', $image->hashName());

        //create post
        Partai::create([
            'image'     =>       $image->hashName(),
            'nama_partai'     => $request->nama_partai,
            'ketua_partai'   => $request->ketua_partai
        ]);

        //redirect to index
        return redirect()->route('partai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Partai $data)
    {
        return view('dashboards.admins.partais.edit', compact('data'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Partai $data)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_partai'     => 'required|',
            'ketua_partai'   => 'required|'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/partai', $image->hashName());

            //delete old image
            Storage::delete('public/partai/'.$data->image);

            //update post with new image
            $data->update([
                'image'     => $image->hashName(),
                'nama_partai'     => $request->nama_partai,
                'ketua_partai'   => $request->ketua_partai
            ]);

        } else {

            //update post without image
            $data->update([
                'nama_partai'     => $request->nama_partai,
                'ketua_partai'   => $request->ketua_partai
            ]);
        }

        //redirect to index
        return redirect()->route('partai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Partai $data)
    {
        //delete image
        Storage::delete('public/partai/'. $data->image);

        //delete post
        $data->delete();

        //redirect to index
        return redirect()->route('partai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
