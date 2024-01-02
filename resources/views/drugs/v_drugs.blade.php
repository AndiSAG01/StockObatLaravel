@extends('layouts.admin')

@section('content')

<div class="col-lg-12">
  @if ($message = Session::get('success'))
<div class="alert alert-primary alert-block">
    <strong>{{ $message }}</strong>
</div>
@elseif ($errors->all())
<div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
@endif
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
              <th>Kode</th>
              <th>Nama Obat</th>
              <th>Stock</th>
              <th>Jenis Obat</th>
              <th>Tanggal Produksi</th>
              <th>Tanggal Kadaluarsa</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $drugs as $no => $ob )
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $ob->code }}</td>
                <td>{{ $ob->supplier->medicine }}</td>
                <td>
                  @if ($ob->stock == 0)
                  <a href="" class="btn btn-danger">Stock Habis</a>
                  @else
                    {{ $ob->stock }}
                  @endif
                </td>
                <td>{{ $ob->medicine->kind }}</td>
                <td>{{ $ob->production_date }}</td>
                <td>{{ $ob->expiration_date }}</td>
                <td>
                    <a href="{{ route('drugs.edit', $ob->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form id="deleteForm" class="d-inline" action="{{ route('drugs.delete',$ob->id) }}" method="post">
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