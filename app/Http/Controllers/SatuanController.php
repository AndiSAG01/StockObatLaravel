<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::all();
        return view('satuan.v_satuan', compact('satuan'));
    }

    public function create()
    {
        return view('satuan.create_satuan');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        Satuan::create($validateData);
        return redirect()->route('satuan.index')->with('success', 'Data Berhasil Di tambah');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan.edit_satuan', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' =>'required',
        ]);

        Satuan::find($id)->update($validateData);
        return redirect()->route('satuan.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuan.index')->with('danger', 'Data Berhasil Di Hapus');
    }
}
