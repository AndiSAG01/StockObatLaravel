<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.v_brand', compact('brands'));
    }

    public function create()
    {
        return view('brand.create_brand');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        Brand::create($validateData);
        return redirect()->route('brand.index')->with('success', 'Data Berhasil Di tambah');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.edit_brand', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' =>'required',
        ]);

        Brand::find($id)->update($validateData);
        return redirect()->route('brand.index')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('danger', 'Data Berhasil Di Hapus');
    }
}
