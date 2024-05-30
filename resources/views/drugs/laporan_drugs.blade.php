@extends('layouts.admin')

@section('title')
Laporan Data Obat Masuk {{ $year }}
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Laporan Data Obat Masuk</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dataTable" class="table align-items-center table-flush table-hover" id="dataTableHover">
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
