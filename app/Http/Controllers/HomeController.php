<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
        return view('dashboard', compact('supplier','drugs','medicine','transaction'));
    }

}
