<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $drugs = Drugs::all();
        $supplier = Supplier::all();
        $medicine = Medicine::all();
        return view('transaction.create_drugs_out',compact('drugs','supplier','medicine'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_transaction' => 'string|max:10',
            'date' => 'required|string|max:100',
            'quantity_sell' => 'required|string|max:4',
            'drug_id' => 'exists:drugs,id',
            'supplier_id' => 'exists:suppliers,id',
            'medicine_id' => 'exists:medicines,id',
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

        return redirect()->route('transaction.index')->with('success', 'Data obat berhasil ditambahkan');
    }


    public function edit($id)
    {
       
        $transactions = Transaction::findOrFail($id);
        $drugs = Drugs::all();
        $supplier = Supplier::all();
        $medicine = Medicine::all();
        return view('transaction.edit_drugs_out', compact('transactions','drugs','supplier','medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code_transaction' => 'string|max:10',
            'date' => 'required|string|max:100',
            'quantity_sell' => 'required|string|max:4',
            'drug_id' => '|exists:drugs,id',
        ]);
        Transaction::findOrFail($id)->update($request->all());

        $drug = Drugs::find($request['drug_id']);

        if ($drug) {
            // Check if the stock is already 0
            if ($drug->stock === 0) {
                return redirect()->route('transaction.index')->with('info', 'Stock obat ' . $drug->name . ' telah habis.');
            }
            

            // Check if the requested quantity is greater than the available stock
            if ($request['quantity_sell'] > $drug->stock) {
                return redirect()->route('transaction.index')->with('info', 'Stock Obat ' . $drug->name . 'Tidak Cukup .'  );
            }

            // Decrease the stock in the "drugs" table
            $drug->stock -= $request['quantity_sell'];

            // Check if the stock is now 0
            if ($drug->stock === -1) {
                // Set a flag in the drug model
                $drug->stock = true;
            }

            // Save the changes to the drug
            $drug->save();

        return redirect()->route('transaction.index')->with('success','Data Obat Keluar Berhasil Di Edit');
    }
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
}
