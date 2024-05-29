@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card-header text-white" style="background-color: blue">
            <b>
                Form Tambah Data Supplier
            </b>
        </div>
        <form id="formfield" action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Nama Supplier</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group mb-4">
                <label for="telphone">Telphone</label>
                <input type="number" class="form-control" name="telphone">
            </div>
            {{-- <div id="medicine-container">
                <div class="form-group mb-4">
                    <label for="medicine">Obat</label>
                    <input type="text" name="medicine[]" class="form-control">
                </div>
            </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        {{-- <div class="controls">
            <button class="add btn btn-success" onclick="addMedicineField()"><i class="fa fa-plus"></i> Tambah</button>
            <button class="remove btn btn-danger" onclick="removeMedicineField()"><i class="fa fa-minus"></i> Hapus</button>
        </div> --}}
    </div>
    </div>
@endsection
