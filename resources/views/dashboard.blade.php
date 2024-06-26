@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>
    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Data Supplier</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $supplier }}</div>
              </div>
              <div class="col-auto">
                <a href="{{ route('supplier.index') }}">
                  <i class="fas fa-solid fa-user fa-2x text-primary"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Data Obat</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $medicine }}</div>
              </div>
              <div class="col-auto">
                <a href="{{ route('medicines.index') }}">
                  <i class="fas fa-solid fa-tablets fa-2x text-primary"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Data Obat Masuk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $drugs }}</div>
              </div>
              <div class="col-auto">
                <a href="{{ route('drugs.index') }}">
                  <i class="fas fa-sign-in-alt fa-2x text-info"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Data Obat Keluar</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $transaction }}</div>
              </div>
              <div class="col-auto">
                <a href="{{ route('transaction.index') }}">
                  <i class="fas fa-sign-out-alt fa-2x text-success"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Laporan Obat Masuk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $drugs }}</div>
              </div>
              <div class="col-auto">
                <a href="{{ route('drugs.laporan') }}">
                  <i class="fab fa-fw fa-wpforms fa-2x text-danger"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Pending Requests Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Laporan Obat Keluar</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $drugs }}</div>
              </div>
              <div class="col-auto">
                <a href="{{ route('transaction.laporan') }}">
                  <i class="fas fa-fw fa-columns fa-2x text-warning"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    {!! $chart->container() !!}
  
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

@endsection