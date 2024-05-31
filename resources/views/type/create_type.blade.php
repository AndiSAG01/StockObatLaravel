@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('type.index') }}">Jenis</a></li>
      <li class="breadcrumb-item">Tambah Data</li>
    </ol>
  </nav>
    <div class="container-fluid">
        <div class="card-header text-white" style="background-color: blue">
            <b>
                Form Tambah Data Jenis
            </b>
        </div>
           <form action="{{ route('type.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Nama Jenis</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
@endsection
