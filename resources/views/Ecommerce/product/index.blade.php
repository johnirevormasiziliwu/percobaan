@extends('layout.Home.main')

@section('content')

@if (session()->has('success'))
    
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session()->has('update'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('update') }}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
    
@endif

@if (session()->has('delete'))


<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('delete') }}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>

    
@endif


   <div class="container">
    <div class="card">
      <div class="card-header">{{ __('Products') }}</div>
      <div class="container">
        <div class="flex">
        <div class="card-columns ml-3 mt-3 mb-3 ">
      @foreach ($products as $product)
          
      <div class="card text-center  mt-3" style="width: 20rem;">
        <img src="{{ url('storage/product-images/' . $product->image) }}" class="card-img-top rounded-top" alt="...">
        <div class="card-body ">
          <h5 class=" text-center text-bold ">{{ $product->name }}</h5>

          <h6 class=" text-lg text-center">Rp:{{ $product->price }}</h6>
         

        </div>
        <div class="card-footer">
          <a href="{{ route('edit_product', $product) }}" class="btn btn-warning btn-sm">Update</a>
          <button type="button" class="btn btn-danger btn-sm ml-3 mr-3" data-toggle="modal" data-target="#delete{{ $product->id }}">
          Delete
          </button>
          <a href="{{ route('show_product', $product) }}" class="btn btn-primary btn-sm">Detail Product</a>

        </div>
      </div>
      @endforeach
    </div>
    </div>
    </div>
    </div>
   </div>

<!-- Button trigger modal -->


<!-- Modal -->
@foreach ($products as $product)
    
<div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure delete this data ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('delete_product', $product) }}" method="POST">
        @method('delete')
        @csrf
        <div class="modal-body">
      <h5>Name Product : {{ $product->name }}</h5>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Delete Product</button>
      </div>
    </form>
  </div>
</div>
</div>
@endforeach

@endsection




