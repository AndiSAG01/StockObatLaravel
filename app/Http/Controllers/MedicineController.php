<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Medicine;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MedicineController extends Controller
{
    public function index()
    {
        $medicine = Medicine::all();
        return view("medicines.v_medicines", compact("medicine"));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $brands = Brand::all();
        $types = Type::all();
        $satuans = Satuan::all();
        $medicine = Supplier::whereDoesntHave('medicines')->get();
        return view("medicines.create_medicine", compact("medicine", 'suppliers', 'types', 'satuans', 'brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            // 'stok' => 'required|string|max:100',
            'supplier_id' => 'required|string|exists:suppliers,id',
            'satuan_id' => 'required|string|exists:satuans,id',
            'type_id' => 'required|string|exists:types,id',
            'brand_id' => 'string|exists:brands,id', // Corrected 'exites' to 'exists'
        ]);
        $validatedData['kode'] = rand(100000, 999999);
        Medicine::create($validatedData);
        return redirect()->route('medicines.index')->with('success', 'Data Obat Berhasil Di Tambah');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        $suppliers = Supplier::all(); // Get all suppliers
        $brands = Brand::all(); // Get all brands
        $types = Type::all(); // Get all types
        $satuans = Satuan::all(); // Get all satuan

        if (!$medicine) {
            // Handle the case where the medicine is not found, for example, redirect to an error page.
            return redirect()->route('error')->with('error', 'Medicine not found');
        }

        return view('medicines.edit_medicine', compact('medicine', 'suppliers', 'brands', 'types', 'satuans'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            // 'stok' => 'required|string|max:100',
            'supplier_id' => 'required|string|exists:suppliers,id',
            'satuan_id' => 'required|string|exists:satuans,id',
            'type_id' => 'required|string|exists:types,id',
            'brand_id' => 'string|exists:brands,id', // Corrected 'exites' to 'exists'
        ]);

        Medicine::find($id)->update($validatedData);
        return redirect()->route('medicines.index')->with('success', 'Data Obat Berhasil Di Ubah');
    }

    public function delete($id)
    {
        Medicine::find($id)->delete();
        return redirect()->route('medicines.index')->with('danger', 'Data Obat Berhasil Di Hapus');
    }
}
