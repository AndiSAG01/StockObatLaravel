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
                Form Edit Data User
            </b>
        </div>
        <div class="card-body text-dark">
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user -> name) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user -> email) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password', $user -> password) }}">
                </div>
                <div class="form-group mb-4">
                    <label for="code">Role</label>
                    <select name="isAdmin" id="code" class="form-control">
                            <option value="1">Pemilik</option>
                            <option value="0">Pegawai</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
