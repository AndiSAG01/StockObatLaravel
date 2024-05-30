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
    <div class="container-fluid">
        <div class="card-header text-white" style="background-color: blue">
            <b>
                Form Edit Obat
            </b>
        </div>
        <div class="card-body text-dark">
            <form action="{{ route('medicines.update', $medicine->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="kode" hidden>
                <div class="form-group mb-4">
                    <label for="code">Nama Supplier</label>
                    <select name="supplier_id" id="code" class="form-control">
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $medicine->supplier_id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Nama Obat</label>
                   <input type="text" name="name" class="form-control" value="{{ old('name',$medicine->name) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="code">Nama Jenis</label>
                    <select name="type_id" id="code" class="form-control">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $medicine->type_id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Nama Merek</label>
                    <select name="brand_id" id="code" class="form-control">
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $medicine->brand_id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Satuan</label>
                    <select name="satuan_id" id="code" class="form-control">
                        @foreach ($satuans as $satuan)
                        <option value="{{ $satuan->id }}" {{ $satuan->id == $medicine->satuan_id ? 'selected' : '' }}>
                            {{ $satuan->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="description">Stok</label>
                    <input type="text" name="stok" class="form-control" value="{{ old('stok', $medicine->stok) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $medicine->description) }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
