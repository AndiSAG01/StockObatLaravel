@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card-header text-white" style="background-color: blue">
        <b>
            Form Tambah Data Masuk Obat
        </b>
    </div>
    <div class="card-body text-dark">
        <form action="{{ route('drugs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="code">Nama Obat</label>
                <select name="supplier_id" id="code" class="form-control">
                    @foreach ($supplier as $sp)
                        <option value="{{ $sp->id }}">{{ $sp->id }}. {{ $sp->medicine}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock">
            </div>
            <div class="form-group mb-4">
                <label for="code">Jenis Obat</label>
                <select name="medicine_id" id="code" class="form-control">
                    @foreach ($medicine as $md)
                        <option value="{{ $md->id }}">{{ $md->id }}. {{ $md->kind}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="production_date">Tanggal Produksi</label>
                <input type="date" class="form-control" name="production_date">
            </div>
            <div class="form-group mb-4">
                <label for="expiration_date">Tanggal Kadaluarsa</label>
                <input type="date" class="form-control" name="expiration_date">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
