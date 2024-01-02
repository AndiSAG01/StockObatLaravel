@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card-header text-white" style="background-color: blue">
        <b>
            Form Edit Data Masuk Obat
        </b>
    </div>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Alert Heading</strong>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>

    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    <div class="card-body text-dark">
        <form action="{{ route('drugs.update', $drugs->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="code">Nama Obat</label>
                <select name="medicine_id" id="code" class="form-control" disabled>
                    @foreach ($supplier as $sp)
                        <option value="{{ $sp->id }}">{{ $sp->id }}. {{ $sp->medicine}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{ old('stock', $drugs -> stock) }}">
            </div>
            <div class="form-group mb-4">
                <label for="code">Jenis</label>
                <select name="medicine_id" id="code" class="form-control" disabled>
                    @foreach ($medicine as $md)
                        <option value="{{ $md->id }}">{{ $md->id }}. {{ $md->kind}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="production_date">Tanggal Produksi</label>
                <input type="date" class="form-control" name="production_date" value="{{ old('production_date', $drugs -> production_date) }}">
            </div>
            <div class="form-group mb-4">
                <label for="expiration_date">Tanggal Kadarluarsa</label>
                <input type="date" class="form-control" name="expiration_date" value="{{ old('expiration_date', $drugs -> expiration_date) }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
