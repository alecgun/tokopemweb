@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('dashboard.update',$barang->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input name="nama_barang" type="name" class="form-control" id="nama_barang" value="{{$barang->nama_barang}}">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input name="harga" type="number" class="form-control" id="harga" value="{{$barang->harga}}">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input name="stok" type="number" class="form-control" id="stok" value="{{$barang->stok}}">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="2" value="{{$barang->keterangan}}"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Ganti Foto Profil</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection