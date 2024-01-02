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
                Form Tambah Data Keluar Obat
            </b>
        </div>
        <div class="card-body text-dark">
            <form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="date">Tanggal</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="code">Kode Obat</label>
                    <select name="drug_id" id="code" class="form-control" >
                        @foreach ($drugs as $drug)
                            <option value="{{ $drug->id }}">{{ $drug->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="name">Nama Obat</label>
                    <select name="supplier_id" id="name" class="form-control">
                        @foreach ($supplier as $sp)
                            <option value="{{ $sp->id }}">{{ $sp->id }}. {{ $sp->medicine }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="quantity_sell">Jumlah Keluar</label>
                    <input type="number" class="form-control" name="quantity_sell">
                </div>
                <div class="form-group mb-4">
                    <label for="drug_id">Jenis</label>
                    <select name="medicine_id" id="drug_id" class="form-control">
                        @foreach ($medicine as $md)
                            <option value="{{ $md->id }}">{{ $md->id }}. {{ $md->kind }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
