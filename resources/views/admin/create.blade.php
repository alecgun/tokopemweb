@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('dashboard.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input name="nama_barang" type="name" class="form-control" id="nama_barang">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input name="harga" type="number" class="form-control" id="harga">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input name="stok" type="number" class="form-control" id="stok">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Foto Profil</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection