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
                Form Tambah Data Obat
            </b>
        </div>
        <div class="card-body text-dark">
            <form action="{{ route('medicines.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="supplier_id">Pilih Supplier:</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->id }}. {{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="code">Nama Obat</label>
                    <select name="supplier_id" id="code" class="form-control">
                        @foreach ($medicine as $md)
                            <option value="{{ $md->id }}">{{ $md->id }}. {{ $md->medicine }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="kind">Jenis Obat</label>
                    <input type="text" name="kind" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
