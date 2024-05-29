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
                <label for="">Tanggal Obat Masuk</label>
            <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="medicine_code">Kode Obat</label>
                <select name="medicine_code" id="medicine_code" class="form-control">
                    <option value="">==Pilih Kode Obat==</option>
                    @foreach ($medicine as $md)
                        <option value="{{ $md->kode }}">{{ $md->kode }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="medicine_name">Nama Obat</label>
                <select name="medicine_id" id="medicine_name" class="form-control" disabled>
                    <option value="">Pilih Kode Obat terlebih dahulu</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock">
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
