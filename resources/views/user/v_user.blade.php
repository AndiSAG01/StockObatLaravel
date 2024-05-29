@extends('layouts.admin')

@section('content')

<div class="col-lg-12">
  <x-alert></x-alert>
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA USER</h6>
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="table-responsive p-3">
        <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama User</th>
              <th>Username</th>
              <th>Role</th>
              <th>Aksi</th>

            </tr>
          </thead>
          <tbody>
            @foreach ( $users as $no => $us )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>
                  @if ($us->isAdmin == 1)
                  <span>Pemilik</span>
                  @elseif($us->isAdmin == 0)
                  <span>Pengawai</span>
                  @endif
                </td>
                <td>
                    <a href="{{ route('user.edit', $us->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form id="deleteForm" class="d-inline" action="{{ route('user.delete',$us->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection