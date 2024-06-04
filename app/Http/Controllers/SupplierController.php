<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
   public function index()
   {
      $supplier = Supplier::get();
    return view('Supplier.v_Supplier',compact('supplier'));
   }

   public function create()
   {
      return view('Supplier.create_Supplier');
   }

   public function store(Request $request)
   {
       
       $validatedData = $request->validate([
         'name' => 'required|string|max:100',
         'address' => 'required|string|max:100',
         'telphone' => 'required|string|max:20',
       ]);
       
       Supplier::create($validatedData);
       

       return redirect()->route('supplier.index')->with('success', 'Data Supplier Berhasil Ditambahkan');
   }

   public function edit($id)
   {
      $supplier = Supplier::findOrFail($id);
      return view('Supplier.edit_Supplier',compact('supplier'));
   }

   public function update(Request $request, $id)
   {
      $request->validate([
        'name' => 'required|string|max:100',
        'address' => 'required|string|max:100',
        'telphone' => 'required|string|max:20',
      //   'medicine' => 'required|string|max:100',
     ]);
     $Supplier = Supplier::findOrFail($id);
     $Supplier->name = $request->name;
     $Supplier->address= $request->address;
     $Supplier->telphone = $request->telphone;

     $Supplier->save();
     
     return redirect()->route('supplier.index')->with('success', 'Data Supplier Berhasil Diubah');

   }
   public function delete($id)
    {
        // Delete related transactions
        Supplier::where('id', $id)->delete();

        return redirect()->back()->with(
            'danger',
            'Data obat Telah Di hapus'
        );
    }
}
