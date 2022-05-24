@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content">
        
            @foreach($barangs as $barang)
            <div class="col-md-3 mb-4">
                <a href="{{ url('pesan') }}/{{ $barang->id }}" class="card shadow p-2 mb-5 bg-white rounded" style="width: 295px; text-decoration:none; color:black;">
                    <img src="{{ asset('storage/uploads/'.$barang->image)}}" class="card-img-top" height="200px"; alt="{{ $barang->nama_barang }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text"><strong>Rp {{ number_format($barang->harga) }}</strong></p>
                    </div>
                </a>
            </div>
            @endforeach  
        
    </div>
</div>
@endsection
