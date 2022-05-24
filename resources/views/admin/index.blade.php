@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead align="center">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach($barangs as $barang)
                    <tr>
                        <td>{{$barang->nama_barang}}</td>
                        <td>{{$barang->harga}}</td>
                        <td>{{$barang->stok}}</td>
                        <td align="left">{{$barang->keterangan}}</td>
                        <td width="150px">
                            <form action="{{ route('dashboard.destroy',$barang->id) }}" method="post">
                                <a href="{{ route('dashboard.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah {{$barang->nama_barang}} akan dihapus?')">Delete</button>
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