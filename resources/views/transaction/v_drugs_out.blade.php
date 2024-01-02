@extends('layouts.admin')

@section('content')

<div class="col-lg-12">
  @if ($message = Session::get('success'))
    <div class="alert alert-primary alert-block">
        <strong>{{ $message }}</strong>
    </div>
    @elseif  ($message = Session::get('danger'))
    <div class="alert alert-primary alert-block">
        <strong>{{ $message }}</strong>
    </div>
  @elseif ($errors->all())
    <div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>
  @endif

  {{-- Display any danger messages from the controller --}}
  @if($dangerMessage = Session::get('info'))
    <div class="alert alert-danger" role="alert">
        {{ $dangerMessage }}
    </div>
  @endif

  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">DATA OBAT KELUAR</h6>
      <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="table-responsive p-3">
      <table id="example" class="table align-items-center table-flush table-hover" id="dataTableHover">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Kode Obat Keluar</th>
            <th>Tanggal</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Jumlah Keluar</th>
            <th>Jenis Obat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $no => $ts )
            <tr>
              <td>{{ ++$no }}</td>
              <td>{{ $ts->code_transaction }}</td>
              <td>{{ $ts->date }}</td>
              <td>{{ $ts->drug->code }}</td>
              <td>{{ $ts->supplier->medicine }}</td>
              <td>{{ $ts->quantity_sell }}</td>
              <td>{{ $ts->medicine->kind }}</td>
              <td>
                <a href="{{ route('transaction.edit', $ts->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form id="deleteForm" class="d-inline" action="{{ route('transaction.delete',$ts->id) }}" method="post">
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
