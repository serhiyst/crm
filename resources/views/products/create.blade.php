@extends('clients.layout')

@section('content')
<div class="container">
  <h2>Add Product</h2>
  <form class="container" method="POST" action="/products">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
      <label for="address">Description</label>
      <textarea class="form-control" name="description" required></textarea> 
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="phone_number">Price</label>
        <input type="text" class="form-control" name="price" required>
      </div>
      <div class="form-group col-md-6">
        <label for="email">Category</label>
        <input type="text" class="form-control" name="category" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Add</button> 
    <a class="btn btn-secondary" href="{{ url('/products') }}">Back</a>    	
  </form>
</div>
@endsection