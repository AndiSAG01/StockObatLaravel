@extends('layouts.admin')

@section('title')
Laporan Data Obat Keluar {{ $year }}
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Laporan Data Obat Keluar</li>
  </ol>
</nav>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Laporan Data Obat Keluar</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table align-items-center table-flush table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Kode Obat Keluar</th>
                    <th>Tanggal Keluar</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jumlah Keluar</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $no => $ts )
                    <tr>
                      <td>{{ ++$no }}</td>
                      <td>{{ $ts->code_transaction }}</td>
                      <td>{{ $ts->date }}</td>
                      <td>{{ $ts->drug->code }}</td>
                      <td>{{ $ts->drug->medicine->name }}</td>
                      <td>{{ $ts->quantity_sell }}</td>
                      <td>{{ $ts->description }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
