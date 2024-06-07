<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Models\Drugs;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $drugs = Drugs::all();
        $supplier = Supplier::all();
        $medicine = Medicine::all();
        $outOfStockDrug = $drugs->where('stock', 0)->first();
        return view("transaction.v_drugs_out", compact("transactions", "drugs","outOfStockDrug","supplier",'medicine'));
    }

    public function create()
    {
        $drugs = Drugs::with('medicine')->get();
        return view('transaction.create_drugs_out',compact('drugs'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|string|max:100',
            'quantity_sell' => 'required|string|max:4',
            'drug_id' => 'exists:drugs,id',
            'description' => 'required|string|'
        ]);

        $drug = Drugs::find($validatedData['drug_id']);

        if ($drug) {
            // Check if the stock is already 0
            if ($drug->stock === 0) {
                return redirect()->route('transaction.index')->with('info', 'Stock obat ' . $drug->name . ' telah habis.');
            }
            

            // Check if the requested quantity is greater than the available stock
            if ($validatedData['quantity_sell'] > $drug->stock) {
                return redirect()->route('transaction.index')->with('info', 'Stock Obat ' . $drug->name . 'Tidak Cukup .'  );
            }

            // Decrease the stock in the "drugs" table
            $drug->stock -= $validatedData['quantity_sell'];

            // Check if the stock is now 0
            if ($drug->stock === -1) {
                // Set a flag in the drug model
                $drug->stock = true;                
            }

            // Save the changes to the drug
            $drug->save();

            // Check if stock is 0 and set a flag in the transaction model
            $transaction = Transaction::create($validatedData);
            if ($drug->stock === -1) {
                $transaction->is_stock_empty = true;
            }
        }

        return redirect()->route('transaction.index')->with('success', 'Data obat Keluar berhasil ditambahkan');
    }


    public function edit($id)
    {
       
        $transaction = Transaction::findOrFail($id);
        $drugs = Drugs::with('medicine')->get();
        return view('transaction.edit_drugs_out', compact('transaction','drugs'));
    }


public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'date' => 'required|string|max:100',
        'quantity_sell' => 'required|integer|min:1',
        'description' => 'required|string|max:255'
    ]);

    // Find the existing transaction by ID
    $transaction = Transaction::findOrFail($id);

    // Calculate the difference in quantity
    $originalQuantity = $transaction->quantity_sell;
    $newQuantity = $validatedData['quantity_sell'];
    $quantityDifference = $newQuantity - $originalQuantity;

    // Find the associated drug record
    $drug = Drugs::findOrFail($transaction->drug_id);
    if ($drug) {
        if ($drug->stock < $quantityDifference) {
            return redirect()->route('transaction.index')->with('info', 'Stock Obat ' . $drug->medicine->name . ' Tidak Cukup.');
        }

        // Adjust the stock of the drug$drug
        $drug->stock -= $quantityDifference;
        $drug->save();
    }

    // Update the transaction record with validated data
    $transaction->update($validatedData);

    return redirect()->route('transaction.index')->with('success', 'Data Obat Keluar Berhasil Di Edit');
}


    public function delete($id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();
        return redirect()->route('transaction.index')->with('danger','Data Obat Keluar Berhasil Di Hapus');
    }

    public function laporan()
    {
        $transactions = Transaction::all();
        $year = Carbon::now()->format('M-Y');
        return view('transaction.laporan_drugs_out', compact('transactions','year'));
    }

    public function print(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Transaction::query();

        if ($start_date) {
            $query->where('date', '>=', $start_date);
        }

        if ($end_date) {
            $query->where('date', '<=', $end_date);
        }

        $transactions = $query->get();

        return view('transaction.print', compact('transactions'));
    }

  public function filter(Request $request)
  {
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $query = Transaction::query();

    if ($start_date) {
        $query->where('date', '>=', $start_date);
    }

    if ($end_date) {
        $query->where('date', '<=', $end_date);
    }

    $transactions = $query->get();

    return view('transaction.laporan_drugs_out', compact('transactions'));
  }

  public function export(Request $request)
  {
      $start_date = $request->input('start_date');
      $end_date = $request->input('end_date');

      return Excel::download(new TransactionsExport($start_date, $end_date), 'laporan_obat_Keluar.xlsx');
  }
}
