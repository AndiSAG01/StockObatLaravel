@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('satuan.index') }}">Satuan</a></li>
      <li class="breadcrumb-item">Edit Data</li>
    </ol>
  </nav>
<div class="container-fluid">
    <div class="card-header text-white" style="background-color: blue">
        <b>
            Form Edit Data Satuan
        </b>
    </div>
    <div class="card-body text-dark">
        <form action="{{ route('satuan.update', $satuan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Nama Satuan</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $satuan -> name) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
