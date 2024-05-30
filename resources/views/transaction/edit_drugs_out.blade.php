@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
    @endif
    <div class="container-fluid">
        <div class="card-header text-white" style="background-color: blue">
            <b>
                Form Edit Data Keluar Obat
            </b>
        </div>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item"><a href="#">{{ $transaction->code_transaction }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $transaction->drug->medicine->name }}</li>
            </ol>
          </nav>
        <div class="card-body text-dark">
            <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">Tanggal Keluar</label>
                    <input type="date" name="date" class="form-control" id="date"
                        value="{{ old('date', $transaction->date) }}" required>
                </div>

                <div class="form-group">
                    <label for="quantity_sell">Jumlah Keluar</label>
                    <input type="number" name="quantity_sell" class="form-control" id="quantity_sell"
                        value="{{ old('quantity_sell', $transaction->quantity_sell) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Keterangan</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description', $transaction->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
