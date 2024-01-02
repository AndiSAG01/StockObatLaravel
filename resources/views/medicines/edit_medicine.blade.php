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
                <div class="form-group mb-4">
                    <label for="code">Nama Supplier</label>
                    <select name="supplier_id" id="code" class="form-control" disabled>
                        <option value="{{ $medicine->supplier->id }}">{{ $medicine->supplier->name }}</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Nama Obat</label>
                    <select name="supplier_id" id="code" class="form-control" disabled>
                        <option value="{{ $medicine->supplier->id }}">{{ $medicine->supplier->medicine }}</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $medicine->description) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="kind">Jenis</label>
                    <input type="text" name="kind" class="form-control" value="{{ old('kind', $medicine->kind) }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
