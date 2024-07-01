<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::middleware(['auth'])->group(function () {
   Route::get('/', [HomeController::class,'index'])->name('home');

   #user
   Route::get('/user', [UserController::class,'index'])->name('user.index');
   Route::get('/user/create', [UserController::class,'create'])->name('user.create');
   Route::post('/user/store', [UserController::class,'store'])->name('user.store');
   Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('user.edit');
   Route::post('/user/update/{id}', [UserController::class,'update'])->name('user.update');
   Route::delete('/user/delete/{id}', [UserController::class,'delete'])->name('user.delete');
   Route::post('/logout', [HomeController::class,'logout'])->name('user.logout');
   
   #type
   Route::get('/type', [TypeController::class,'index'])->name('type.index');
   Route::get('/type/create', [TypeController::class,'create'])->name('type.create');
   Route::post('/type/store', [TypeController::class,'store'])->name('type.store');
   Route::get('/type/edit/{id}', [TypeController::class,'edit'])->name('type.edit');
   Route::post('/type/update/{id}', [TypeController::class,'update'])->name('type.update');
   Route::delete('/type-delete/{id}', [TypeController::class,'delete'])->name('type.delete');
   #satuan
   Route::get('/satuan', [SatuanController::class,'index'])->name('satuan.index');
   Route::get('/satuan/create', [SatuanController::class,'create'])->name('satuan.create');
   Route::post('/satuan/store', [SatuanController::class,'store'])->name('satuan.store');
   Route::get('/satuan/edit/{id}', [SatuanController::class,'edit'])->name('satuan.edit');
   Route::post('/satuan/update/{id}', [SatuanController::class,'update'])->name('satuan.update');
   Route::delete('/satuan-delete/{id}', [SatuanController::class,'delete'])->name('satuan.delete');
   #Brand
   Route::get('/brand', [BrandController::class,'index'])->name('brand.index');
   Route::get('/brand/create', [BrandController::class,'create'])->name('brand.create');
   Route::post('/brand/store', [BrandController::class,'store'])->name('brand.store');
   Route::get('/brand/edit/{id}', [BrandController::class,'edit'])->name('brand.edit');
   Route::post('/brand/update/{id}', [BrandController::class,'update'])->name('brand.update');
   Route::delete('/brand-delete/{id}', [BrandController::class,'destroy'])->name('brand_delete');
    
   #medicines
   Route::get('/medicines', [MedicineController::class,'index'])->name('medicines.index');
   Route::get('/medicines/create', [MedicineController::class,'create'])->name('medicines.create');
   Route::post('/medicines/store', [MedicineController::class,'store'])->name('medicines.store');
   Route::get('/medicines/edit/{id}', [MedicineController::class,'edit'])->name('medicines.edit');
   Route::post('/medicines/update/{id}', [MedicineController::class,'update'])->name('medicines.update');
   Route::delete('/medicines-delete/{id}', [MedicineController::class,'delete'])->name('medicines.delete');
 
   #drugs
   Route::get('/drugs', [DrugsController::class,'index'])->name('drugs.index');
   Route::get('/drugs/create', [DrugsController::class,'create'])->name('drugs.create');
   Route::post('/drugs/store', [DrugsController::class,'store'])->name('drugs.store');
   Route::get('/drugs/edit/{id}', [DrugsController::class,'edit'])->name('drugs.edit');
   Route::post('/drugs/update/{id}', [DrugsController::class,'update'])->name('drugs.update');
   Route::delete('/drugs-delete/{id}', [DrugsController::class,'delete'])->name('drugs.delete');
   Route::get('/Drugs', [DrugsController::class,'laporan'])->name('drugs.laporan');
   Route::get('/get-medicine-name/{code}', [DrugsController::class, 'getMedicineName']);
   Route::get('/drugs/print',[DrugsController::class, 'print'])->name('print');
   Route::get('/drugs/filter', [DrugsController::class, 'filter'])->name('drugs.filter');
   Route::get('drugs/export', [DrugsController::class, 'export'])->name('drugs.export');

   #supplier
   Route::get('/supplier', [SupplierController::class,'index'])->name('supplier.index');
   Route::get('/supplier/create', [SupplierController::class,'create'])->name('supplier.create');
   Route::post('/supplier/store', [SupplierController::class,'store'])->name('supplier.store');
   Route::get('/supplier/edit/{id}', [SupplierController::class,'edit'])->name('supplier.edit');
   Route::post('/supplier/update/{id}', [SupplierController::class,'update'])->name('supplier.update');
   Route::delete('/supplier-delete/{id}', [SupplierController::class,'delete'])->name('supplier.delete');
 

   #transaction
   Route::get('/transaction', [TransactionController::class,'index'])->name('transaction.index');
   Route::get('/transaction/create', [TransactionController::class,'create'])->name('transaction.create');
   Route::post('/transaction/store', [TransactionController::class,'store'])->name('transaction.store');
   Route::get('/transaction/edit/{id}', [TransactionController::class,'edit'])->name('transaction.edit');
   Route::post('/transaction/update/{id}', [TransactionController::class,'update'])->name('transaction.update');
   Route::delete('/transaction-delete/{id}', [TransactionController::class,'delete'])->name('transaction.delete');
   Route::get('/transaction/laporan', [TransactionController::class,'laporan'])->name('transaction.laporan');
   Route::get('/transaction/print',[TransactionController::class, 'print'])->name('transaction.print');
   Route::get('/transaction/filter', [TransactionController::class, 'filter'])->name('transaction.filter');
   Route::get('/transaction/export', [TransactionController::class, 'export'])->name('transaction.export');

  
   
});

Route::middleware(['auth'])->group(function () {
   Route::get('/', [HomeController::class,'index'])->name('home');

   #user
   Route::get('/user', [UserController::class,'index'])->name('user.index');
   Route::get('/user/create', [UserController::class,'create'])->name('user.create');
   Route::post('/user/store', [UserController::class,'store'])->name('user.store');
   Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('user.edit');
   Route::post('/user/update/{id}', [UserController::class,'update'])->name('user.update');
   Route::delete('/user/delete/{id}', [UserController::class,'delete'])->name('user.delete');
   Route::post('/logout', [HomeController::class,'logout'])->name('user.logout');
   
   #medicines
   Route::get('/medicines', [MedicineController::class,'index'])->name('medicines.index');
   Route::get('/medicines/create', [MedicineController::class,'create'])->name('medicines.create');
   Route::post('/medicines/store', [MedicineController::class,'store'])->name('medicines.store');
   Route::get('/medicines/edit/{id}', [MedicineController::class,'edit'])->name('medicines.edit');
   Route::post('/medicines/update/{id}', [MedicineController::class,'update'])->name('medicines.update');
   Route::delete('/medicines/delete/{id}', [MedicineController::class,'delete'])->name('medicines.delete');
 
   #drugs
   Route::get('/drugs', [DrugsController::class,'index'])->name('drugs.index');
   Route::get('/drugs/create', [DrugsController::class,'create'])->name('drugs.create');
   Route::post('/drugs/store', [DrugsController::class,'store'])->name('drugs.store');
   Route::get('/drugs/edit/{id}', [DrugsController::class,'edit'])->name('drugs.edit');
   Route::post('/drugs/update/{id}', [DrugsController::class,'update'])->name('drugs.update');
   Route::delete('/drugs/delete/{id}', [DrugsController::class,'delete'])->name('drugs.delete');
   Route::get('/Drugs', [DrugsController::class,'laporan'])->name('drugs.laporan');

   #supplier
   Route::get('/supplier', [SupplierController::class,'index'])->name('supplier.index');
   Route::get('/supplier/create', [SupplierController::class,'create'])->name('supplier.create');
   Route::post('/supplier/store', [SupplierController::class,'store'])->name('supplier.store');
   Route::get('/supplier/edit/{id}', [SupplierController::class,'edit'])->name('supplier.edit');
   Route::post('/supplier/update/{id}', [SupplierController::class,'update'])->name('supplier.update');
   Route::delete('/supplier/delete/{id}', [SupplierController::class,'delete'])->name('supplier.delete');
 

   #transaction
   Route::get('/transaction', [TransactionController::class,'index'])->name('transaction.index');
   Route::get('/transaction/create', [TransactionController::class,'create'])->name('transaction.create');
   Route::post('/transaction/store', [TransactionController::class,'store'])->name('transaction.store');
   Route::get('/transaction/edit/{id}', [TransactionController::class,'edit'])->name('transaction.edit');
   Route::post('/transaction/update/{id}', [TransactionController::class,'update'])->name('transaction.update');
   Route::delete('/transaction/delete/{id}', [TransactionController::class,'delete'])->name('transaction.delete');
   Route::get('/transaction/laporan', [TransactionController::class,'laporan'])->name('transaction.laporan');

  
   
});


