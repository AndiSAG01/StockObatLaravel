@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item">Laporan Data Obat Masuk</li>
    </ol>
  </nav>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Laporan Data Obat Masuk</h3>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('drugs.filter') }}" class="form-inline">
            <div class="form-group mb-2">
                <label for="start_date" class="mr-2">Tanggal Mulai:</label>
                <input type="date" id="start_date" name="start_date" class="form-control mr-2" style="width: 200px">
            </div>
            <div class="form-group mb-2">
                <label for="end_date" class="mr-2">Tanggal Akhir:</label>
                <input type="date" id="end_date" name="end_date" class="form-control mr-2" style="width: 200px">
            </div>
            <button type="submit" class="btn btn-primary mb-2 mr-2">Filter</button>
            <button type="button" onclick="resetForm()" class="btn btn-danger mb-2">Reset</button>
        </form>
    </div>
    <div class="card-body">
        <a href="{{ route('print', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-secondary mb-4">Print</a>
        <a href="{{ route('drugs.export', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-success mb-4">Excel</a>
        <div class="table-responsive">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>kode obat Masuk</th>
                        <th>tanggal masuk</th>
                        <th>Kode obat</th>
                        <th>Nama Obat</th>
                        <th>Jumlah Obat Masuk</th>
                        <th>Tanggal Produksi</th>
                        <th>Tanggal Kadaluarsa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drugs as $no => $ob)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $ob->code }}</td>
                        <td>{{ $ob->date }}</td>
                        <td>{{ $ob->medicine->kode }}</td>
                        <td>{{ $ob->medicine->name }}</td>
                        <td>{{ $ob->transactions->sum('quantity_sell') + $ob->stock  }}</td>
                        {{-- <td>{{ $ob->stock  }}</td> --}}
                        <td>{{ $ob->production_date }}</td>
                        <td>{{ $ob->expiration_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
