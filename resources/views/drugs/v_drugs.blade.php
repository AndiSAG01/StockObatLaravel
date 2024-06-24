@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Data Obat Masuk</li>
  </ol>
</nav>
<div class="col-lg-12">
<x-alert/> 
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DATA OBAT MASUK</h6>
        <a href="{{ route('drugs.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="table-responsive p-3">
        <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Kode Obat Masuk</th>
              <th>Tanggal Masuk</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Jumlah Obat Masuk</th>
              <th>Tanggal Produksi</th>
              <th>Tanggal Kadaluarsa</th>
              <th style="width: 12%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $drugs as $no => $ob )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $ob->code }}</td>
                <td>{{ $ob->date }}</td>
                <td>{{ $ob->medicine->kode }}</td>
                <td>{{ $ob->medicine->name }}</td>
                <td>
                  @if ($ob->stock == 0)
                      <a href="#" class="btn btn-danger">Stok Habis</a>
                  @elseif ($ob->stock < 11)
                      <a href="#" class="btn btn-warning">{{ $ob->stock }}</a>
                  @else
                      {{ $ob->stock }}
                  @endif
              </td>     
                <td>{{ $ob->production_date }}</td>
                <td>
                  @if ($ob->expiration_date < date('Y-m-d'))
                      <a href="#" class="btn btn-danger">Kadaluarsa</a>
                  @else
                      {{ $ob->expiration_date }}
                  @endif
                </td>
                <td>
                    <a href="{{ route('drugs.edit', $ob->id ) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <form id="deleteForm" class="d-inline" action="{{ route('drugs.delete',$ob->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete()"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <p>Keterangan :</p>
        <span><b>STOK MENIPIS</b></span> = <a href="" class="btn btn-warning"></a>
        <p>
          <span><b>STOK HABIS</b></span> = <a href="" class="btn btn-danger"></a>
        </p>
      </div>
    </div>
  </div>
@endsection