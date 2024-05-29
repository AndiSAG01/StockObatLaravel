<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('type.v_type', compact('types'));
    }

    public function create()
    {
        return view('type.create_type');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        Type::create($validateData);
        return redirect()->route('type.index')->with('success', 'Data Berhasil Di tambah');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('type.edit_type', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' =>'required',
        ]);

        Type::find($id)->update($validateData);
        return redirect()->route('type.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->route('type.index')->with('danger', 'Data Berhasil Di Hapus');
    }
}
