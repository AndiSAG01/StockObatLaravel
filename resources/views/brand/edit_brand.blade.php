@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="card-header text-white" style="background-color: blue">
        <b>
            Form Edit Data Merek
        </b>
    </div>
    <div class="card-body text-dark">
        <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Nama Merek</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $brand -> name) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
