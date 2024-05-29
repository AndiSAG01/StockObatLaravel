@extends('layouts.admin')

@section('content')

<div class="col-lg-12">
  <x-alert></x-alert>
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA SUPPLIER</h6>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="table-responsive p-3">
        <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Supplier</th>
              <th>Alamat</th>
              <th>Telpon</th>
              {{-- <th>Obat</th> --}}
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $supplier as $no => $sp )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $sp->name }}</td>
                <td>{{ $sp->address }}</td>
                <td>{{ $sp->telphone }}</td>
                {{-- <td>
                  @foreach (explode(',', $sp->medicine) as $medicine)
                      {{ $medicine }}
                      @if (!$loop->last)
                          <br>
                      @endif
                  @endforeach
              </td>      --}}
                <td>
                    <a href="{{ route('supplier.edit', $sp->id ) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <form id="deleteForm" class="d-inline" action="{{ route('supplier.delete',$sp->id) }}" method="post">
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