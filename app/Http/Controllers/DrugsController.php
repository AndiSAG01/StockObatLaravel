<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Medicine;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DrugsController extends Controller
{
   public function index()
   {
      $drugs = Drugs::get();
    return view('drugs.v_drugs',compact('drugs'));
   }

   public function create()
   {
    $supplier = Supplier::whereDoesntHave('drugs')->get();
    $medicine = Medicine::whereDoesntHave('drugs')->get();
      return view('drugs.create_drugs', compact('supplier','medicine'));
   }

   public function store(Request $request)
   {
       
       $validatedData = $request->validate([
         'code' => '|string|max:5',
         'stock' => 'required|string|max:4',
         'supplier_id' => 'required|string|exists:suppliers,id',
         'medicine_id' => 'required|string|exists:medicines,id',
         'production_date' => 'required|string|max:50',
         'expiration_date' => 'required|string|max:50',
       ]);

       Drugs::create($validatedData);
       

       return redirect()->route('drugs.index')->with('success', 'Data Masuk obat Berhasil Ditambahkan');
   }

   public function edit($id)
   {
      $drugs = Drugs::findOrFail($id);
      $medicine = Medicine::all();
      $supplier = Supplier::all();
      return view('drugs.edit_drugs',compact('drugs','medicine','supplier'));
   }

   public function update(Request $request, $id)
   {
      $validatedData=$request->validate([
        'code' => '|string|max:5',
        'stock' => 'required|string|max:4',
        'supplier_id' => 'string|exists:suppliers,id',
        'medicine_id' => 'string|exists:medicines,id',
        'production_date' => 'required|string|max:50',
        'expiration_date' => 'required|string|max:50',
     ]);
     Drugs::find($id)->update($validatedData);
     
     return redirect()->route('drugs.index')->with('success', 'Data Masuk obat Berhasil Diubah');

   }
   public function delete($id)
    {
        // Delete related transactions
        Drugs::where('id', $id)->delete();

        return redirect()->back()->with(
            'danger',
            'Data Masuk obat Telah Di hapus'
        );
    }

    public function laporan()
    {
        $drugs = Drugs::get();
    
        // Simpan snapshot stok sebelum membuat laporan
        foreach ($drugs as $drug) {
            $drug->saveSnapshotStock();
        }
    
        $year = Carbon::now()->format('M-Y');
        return view('drugs.laporan_drugs', compact('drugs', 'year'));
    }
    

}
