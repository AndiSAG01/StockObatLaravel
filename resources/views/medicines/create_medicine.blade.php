@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('medicines.index') }}">Data Obat</a></li>
          <li class="breadcrumb-item">Tambah Data</li>
        </ol>
      </nav>
       <div class="container-fluid">
        <div class="card-header text-white" style="background-color: blue">
            <b>
                Form Tambah Data Obat
            </b>
        </div>
        <div class="card-body text-dark">
            <form action="{{ route('medicines.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="kode" hidden>
                <div class="form-group mb-4"> 
                    <label for="">Nama Obat</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="supplier_id">Pilih Supplier:</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        <option value="">==Pilih Supplier==</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Merek</label>
                    <select name="brand_id" id="code" class="form-control">
                        <option value="">==Pilih Merek==</option>
                        @foreach ($brands as $md)
                            <option value="{{ $md->id }}">{{ $md->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Jenis</label>
                    <select name="type_id" id="code" class="form-control">
                        <option value="">==Pilih Jenis Obat==</option>
                        @foreach ($types as $md)
                            <option value="{{ $md->id }}">{{ $md->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Satuan</label>
                    <select name="satuan_id" id="code" class="form-control">
                        <option value="">==Pilih Satuan Obat==</option>
                        @foreach ($satuans as $md)
                            <option value="{{ $md->id }}">{{ $md->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="description">Jumlah Stok</label>
                    <input type="number" name="stok" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
