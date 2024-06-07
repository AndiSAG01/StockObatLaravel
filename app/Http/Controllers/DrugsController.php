<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Medicine;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\DrugsExport;
use Maatwebsite\Excel\Facades\Excel;

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

    Drugs::create($validatedData);

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
  
    Drugs::findOrFail($id)->update($validatedData);
  
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

  public function print(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Drugs::query();

        if ($start_date) {
            $query->where('date', '>=', $start_date);
        }

        if ($end_date) {
            $query->where('date', '<=', $end_date);
        }

        $drugs = $query->get();

        return view('drugs.print', compact('drugs'));
    }

  public function filter(Request $request)
  {
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $query = Drugs::query();

    if ($start_date) {
        $query->where('date', '>=', $start_date);
    }

    if ($end_date) {
        $query->where('date', '<=', $end_date);
    }

    $drugs = $query->get();

    return view('drugs.laporan_drugs', compact('drugs'));
  }

  public function export(Request $request)
  {
      $start_date = $request->input('start_date');
      $end_date = $request->input('end_date');

      return Excel::download(new DrugsExport($start_date, $end_date), 'laporan_obat_masuk.xlsx');
  }
}
