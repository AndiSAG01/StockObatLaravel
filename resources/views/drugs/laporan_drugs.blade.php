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
                        <th>Kode</th>
                        <th>Nama Obat</th>
                        <th>Stock</th>
                        <th>Jenis Obat</th>
                        <th>Tanggal Produksi</th>
                        <th>Tanggal Kadaluarsa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drugs as $no => $ob)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $ob->code }}</td>
                        <td>{{ $ob->supplier->medicine }}</td>
                        <td>
                            {{ $ob->snapshot_stock ?? 'N/A' }}
                        </td>
                        <td>{{ $ob->medicine->kind }}</td>
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
