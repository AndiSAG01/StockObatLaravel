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
    return view('drugs.v_drugs', compact('drugs'));
  }

  public function create()
  {
    $medicine = Medicine::all();
    return view('drugs.create_drugs', compact('medicine'));
  }

  public function store(Request $request)
  {

    $validatedData = $request->validate([
      'date' => 'required',
      'code' => '|string|max:5',
      'stock' => 'required|string|max:4',
      'medicine_id' => 'required|string|exists:medicines,id',
      'production_date' => 'required|string|max:50',
      'expiration_date' => 'required|string|max:50',
    ]);

    $medicine = Medicine::find($validatedData['medicine_id']);
    if ($medicine) {
      if ($medicine->stok === 0) {
        return redirect()->route('drugs.index')->with('info', 'Stock Obat' . $medicine->name . 'Telah Habis.');
      }

      if ($validatedData['stock'] > $medicine->stok) {
        return redirect()->route('drugs.index')->with('info', 'StockObat' . $medicine->name  . 'Tidak Cukup.');
      }
      $medicine->stok -= $validatedData['stock'];
      if ($medicine->stok === -1) {
        $medicine->stok = true;
      }

      $medicine->save();

      $drugs =  Drugs::create($validatedData);

      if ($medicine->stok == -1) {
        $drugs->is_stock_empty = true;
      }
    }
    return redirect()->route('drugs.index')->with('success', 'Data Masuk obat Berhasil Ditambahkan');
  }

  public function edit($id)
  {
    $drugs = Drugs::findOrFail($id);
    $medicine = Medicine::all();
    $supplier = Supplier::all();
    return view('drugs.edit_drugs', compact('drugs', 'medicine', 'supplier'));
  }

  public function update(Request $request, $id)
  {
      $validatedData = $request->validate([
          'date' => 'required|date',
          'stock' => 'required|integer|min:1',
          'production_date' => 'required|date',
          'expiration_date' => 'required|date',
      ]);
  
      // Find the drug record by ID
      $drug = Drugs::findOrFail($id);
      
      // Calculate the difference in stock
      $originalStock = $drug->stock;
      $newStock = $validatedData['stock'];
      $stockDifference = $newStock - $originalStock;
  
      // Find the associated medicine record
      $medicine = Medicine::findOrFail($drug->medicine_id);
  
      // Check if the medicine exists and adjust the stock
      if ($medicine) {
          if ($medicine->stok < $stockDifference) {
              return redirect()->route('drugs.index')->with('info', 'Stock Obat ' . $medicine->name . ' Tidak Cukup.');
          }
  
          // Adjust the stock of the medicine
          $medicine->stok -= $stockDifference;
          $medicine->save();
      }
  
      // Update the drug record with validated data
      $drug->update($validatedData);
  
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
    $year = Carbon::now()->format('M-Y');

    return view('drugs.laporan_drugs', compact('drugs', 'year'));
  }
  public function getMedicineName($code)
  {
    $medicine = Medicine::where('kode', $code)->first();
    if ($medicine) {
      return response()->json([$medicine->id => $medicine->name]);
    } else {
      return response()->json([]);
    }
  }
}
