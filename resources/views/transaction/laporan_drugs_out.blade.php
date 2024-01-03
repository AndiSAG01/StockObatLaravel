@extends('layouts.admin')

@section('title')
Laporan Data Obat Keluar {{ $year }}
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Laporan Data Obat Keluar</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Kode Obat Keluar</th>
                    <th>Tanggal</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jumlah Keluar</th>
                    <th>Jenis Obat</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $no => $ts )
                    <tr>
                      <td>{{ ++$no }}</td>
                      <td>{{ $ts->code_transaction }}</td>
                      <td>{{ $ts->date }}</td>
                      <td>{{ $ts->drug->code }}</td>
                      <td>{{ $ts->supplier->medicine }}</td>
                      <td>{{ $ts->quantity_sell }}</td>
                      <td>{{ $ts->medicine->kind }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
