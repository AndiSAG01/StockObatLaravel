<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\Transaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $supplier = Supplier::count();
        $drugs = Drugs::count();
        $medicine = Medicine::count();
        $transaction = Transaction::count();

        $popularDrugs = Transaction::select('drug_id', DB::raw('SUM(quantity_sell) as total_quantity'))
            ->groupBy('drug_id')
            ->orderBy('total_quantity', 'desc')
            ->take(10) // Assuming you want the top 10
            ->with('drug.medicine') // Assuming a relation to a Drug model
            ->get();

            
        // Prepare data for the chart
        $drugNames = $popularDrugs->pluck('drug.medicine.name')->toArray();
        $drugTotals = $popularDrugs->pluck('total_quantity')->toArray();
        // dd($drugNames, $drugTotals);

        // Create the chart
        $chart = (new LarapexChart)->setTitle('Laporan Diagram Obat Keluar')
            ->setDataset($drugTotals)
            ->setLabels($drugNames);
        return view('dashboard', compact('supplier', 'drugs', 'medicine', 'transaction', 'chart'));
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Logout berhasil.');
    }
}
