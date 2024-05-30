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
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Tanggal Keluar</label>
                    <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="drug_id">Kode Obat Masuk</label>
                    <select name="drug_id" id="drug_id" class="form-control" required>
                        <option value="">==Pilih Kode Obat==</option>
                        @foreach($drugs as $drug)
                            <option value="{{ $drug->id }}" {{ old('drug_id') == $drug->id ? 'selected' : '' }}>{{ $drug->code }} - {{ $drug->medicine->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="quantity_sell">Jumlah Keluar</label>
                    <input type="number" name="quantity_sell" class="form-control" id="quantity_sell" value="{{ old('quantity_sell') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Keterangan</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
