@extends('layout.Home.main')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="card-title">{{ __('Add New Product') }}</div>
    </div>
    <form action="{{ route('store_product') }}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name Product</label>
          <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}">

          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="price">Price Product</label>
          <input type="number" name="price" id="price" min="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">

          @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="stock">Stock Product</label>
          <input type="number" name="stock" id="stock" min="1" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
          @error('stock')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="image">Upload Image Product</label>
          <input type="file" name="image" id="image" min="1" class="form-control @error('image') is-invalid @enderror ">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="5" rows="5" class="form-control @error('description') is-invalid @enderror "></textarea>

          @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror

        </div>
      </div>
      <div class="card-footer">
        <a href="{{ route('list_product') }}" class="btn btn-primary btn-sm">Back</a>
        <button type="submit" class="btn btn-sm btn-info ml-2">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection

