@extends('layouts.admin')

@section('content')
<body onload="window.print()">
    <div class="card">
        <div class="card-header header">
            <img src="/assets/img/logo/sanika3.png" alt="Logo" style="width: 150px">
            <div class="title">
                <h2>APOTIK SANIKA JAMBI</h2>
                <h4>LAPORAN OBAT MASUK</h4>
                <p> Jl. RB. Siagian No.19, Pasir Putih, Kec. Jambi Sel., Kota Jambi, Jambi 36129, No.Telpon : 0852-6893-9186</p>
                <p>Periode: {{ request('start_date') ? request('start_date') : 'Tidak Ditentukan' }} - {{ request('end_date') ? request('end_date') : 'Tidak Ditentukan' }}</p>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-4">
                <table class="table align-items-center">
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
                            <td>{{ $ob->transactions->sum('quantity_sell') + $ob->stock }}</td>
                            <td>{{ $ob->production_date }}</td>
                            <td>{{ $ob->expiration_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <table width = "100%">
                <tr>
                    <td></td>
                    <td class = "text-right">
                        <p>Kota Jambi, <?= date('d-m-Y');?></p>
                        Admin
                        <br><br><br><br><br>
                        <b>_________________________</b>
                        
                    </td>
                </tr>
    
            </table>
        </div>
    </div>
</body>
@endsection