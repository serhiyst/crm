@extends('clients.layout')

@section('content')
<div class="container">
  <h2>List of Products
    <span style="float: right;">
      <a href="products/create" class="btn btn-success btn-sm">
      <span data-feather="plus"></span> Add product</a></span>
  </h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($product as $data)
        <tr>
          <td>{{ $data->id }}</td>	
          <td>{{ $data->name }}</td>	
          <td>{{ $data->description }}</td>	
          <td>{{ $data->category }} </td>	
          <td>{{ $data->price }}$</td> 
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection