@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Merek</li>
  </ol>
</nav>
<div class="col-lg-12">
  <x-alert></x-alert>
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA MEREK</h6>
        <a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="table-responsive p-3">
        <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Merek</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $brands as $no => $item )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('brand.edit', $item->id ) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <form id="deleteForm" class="d-inline" action="{{ route('brand.delete',$item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()"><i class="fas fa-trash-alt"></i></button>
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