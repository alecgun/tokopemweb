@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="bi bi-cart"></i> Keranjang</h3>
                    @if(!empty($pesanan))
                    <table class="table table-hover">
                        <thead align="center">
                            <tr>
                                <th></th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Kuantitas</th>
                                <th>Harga Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach($pesanan_details as $isiKeranjang)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/uploads/'.$isiKeranjang->barang->image)}}" width="100" height="65" alt="...">
                                </td>
                                <td>{{ $isiKeranjang->barang->nama_barang }}</td>
                                <td>Rp {{ number_format($isiKeranjang->barang->harga) }}</td>
                                <td>{{ $isiKeranjang->jumlah }}</td>
                                <td>Rp. {{ number_format($isiKeranjang->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('keranjang') }}/{{ $isiKeranjang->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                <td align="center"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="#" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out  ?');">
                                        <i class="bi bi-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <p align="center">Keranjang anda kosong.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection