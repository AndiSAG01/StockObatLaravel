@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Obat</li>
  </ol>
</nav>
<div class="col-lg-12">
  <x-alert></x-alert>
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA OBAT</h6>
        <a href="{{ route('medicines.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="table-responsive p-3">
        <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Kode Obat</th>
              <th>Supplier</th>
              <th>Nama Obat</th>
              {{-- <th>Jumlah Stok Awal</th> --}}
              <th>Merek</th>
              <th>Jenis</th>
              <th>Satuan</th>
              <th>Keterangan</th>
              <th style="width: 12%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $medicine as $no => $mb )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $mb->kode }}</td>
                <td>{{ $mb->supplier->name }}</td>
                <td>{{ strtoupper($mb->name) }}</td>
                {{-- <td>
                  @if ($mb->stok == 0)
                      <a href="#" class="btn btn-danger">Stok Habis</a>
                  @elseif ($mb->stok < 11)
                      <a href="#" class="btn btn-warning">{{ $mb->stok }}</a>
                  @else
                      {{ $mb->stok }}
                  @endif
              </td>               --}}
                <td>{{ $mb->brand->name }}</td>
                <td>{{ $mb->type->name }}</td>
                <td>{{ $mb->satuan->name }}</td>
                <td>{{ $mb->description }}</td>
                <td>
                    <a href="{{ route('medicines.edit', $mb->id ) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <form id="deleteForm" class="d-inline" action="{{ route('medicines.delete',$mb->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{-- <p>Keterangan :</p>
        <span><b>STOK MENIPIS</b></span> = <a href="" class="btn btn-warning"></a>
        <p>
          <span><b>STOK HABIS</b></span> = <a href="" class="btn btn-danger"></a>
        </p>
      </div> --}}
    </div>
  </div>
@endsection