@extends('layout.Home.main')

@section('content')
    
<div class="container">
    <div class="card">
        <div class="card-header ">
            <div class="card-title text-bold ">Detail Product :  {{ $product->name }}</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img class="rounded-lg"  src="{{ url('storage/product-images/' . $product->image) }}" width="300px" alt="">
                </div>
                <div class="col-8">
                    <h6>{{ $product->description }}</h6>
                    <hr>
                    <h5>Rp.{{ $product->price }}</h5>
                    <hr>
                    <h5>Stock: {{ $product->stock }}</h5>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection