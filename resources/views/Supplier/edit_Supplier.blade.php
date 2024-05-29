@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card-header text-white" style="background-color: blue">
        <b>
            Form Edit Data Supplier
        </b>
    </div>
    <div class="card-body text-dark">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Nama Supplier</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $supplier -> name) }}">
            </div>
            <div class="form-group mb-4">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" value="{{ old('address', $supplier -> address) }}">
            </div>
            <div class="form-group mb-4">
                <label for="telphone">Telphone</label>
                <input type="number" class="form-control" name="telphone" value="{{ old('telphone', $supplier -> telphone) }}">
            </div>
            {{-- <div class="form-group mb-4">
                <label for="medicine">Obat</label>
                <input type="text" class="form-control" name="medicine" value="{{ old('medicine', $supplier -> medicine) }}">
            </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
