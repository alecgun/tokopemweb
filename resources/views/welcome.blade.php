@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content">
        
            @foreach($barangs as $barang)
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('uploads') }}/{{ $barang->image }}" class="card-img-top" height="200px"; alt="{{ $barang->nama_barang }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text">Harga: Rp {{ $barang->harga }}</p>
                        <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary">Detail</a>
                        
                    </div>
                </div>
            </div>
            @endforeach  
        
    </div>
</div>
@endsection
