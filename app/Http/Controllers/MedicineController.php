<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicine = Medicine::all();
        return view("medicines.v_medicines", compact("medicine"));
    }

    public function create()
    {
        $suppliers = Supplier::whereDoesntHave('medicines')->get();
        $medicine = Supplier::whereDoesntHave('medicines')->get();
        return view("medicines.create_medicine", compact("medicine",'suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => "required|string|max : 100",
            'kind' => "required|string|max : 100",
            'supplier_id' => 'required|string|exists:suppliers,id',
        ]);
        Medicine::create($validatedData);
        return redirect()->route('medicines.index')->with('success','Data Obat Berhasil Di Tambah');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
    
        if (!$medicine) {
            // Handle the case where the medicine is not found, for example, redirect to an error page.
            return redirect()->route('error')->with('error', 'Medicine not found');
        }
    
        return view('medicines.edit_medicine', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => "required|string|max : 100",
            'kind' => "required|string|max : 100",
            'supplier_id' => 'string|exists:suppliers,id',
        ]);

        Medicine::find($id)->update($validatedData);
        return redirect()->route('medicines.index')->with('success','Data Obat Berhasil Di Ubah');
    }

    public function delete($id)
    {
        Medicine::find($id)->delete();
        return redirect()->route('medicines.index')->with('danger','Data Obat Berhasil Di Hapus');
    }
    
}
