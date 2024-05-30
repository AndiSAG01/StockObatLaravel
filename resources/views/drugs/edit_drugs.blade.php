@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="card-header text-white" style="background-color: blue">
            <b>
                Form Edit Data Masuk Obat
            </b>
        </div>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item"><a href="#">{{ $drugs->medicine->kode }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $drugs->medicine->name }}</li>
            </ol>
          </nav>
        <div class="card-body text-dark">
            <form action="{{ route('drugs.update', $drugs->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="entry_date">Tanggal Obat Masuk</label>
                    <input type="date" name="date" class="form-control" value="{{ $drugs->date }}">
                </div>

                <div class="form-group mb-4">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="stock" value="{{ $drugs->stock }}">
                </div>

                <div class="form-group mb-4">
                    <label for="production_date">Tanggal Produksi</label>
                    <input type="date" class="form-control" name="production_date"
                        value="{{ $drugs->production_date }}">
                </div>

                <div class="form-group mb-4">
                    <label for="expiration_date">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" name="expiration_date"
                        value="{{ $drugs->expiration_date }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
