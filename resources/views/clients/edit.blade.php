@extends('clients.layout')

@section('content')
<div class="container">
  <h2>Edit Client</h2>
  <form class="container" method="POST" action="/clients/{{ $client->id }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="{{ $client->name }}" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" value="{{ $client->address }}" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" name="phone_number" value="{{ $client->phone_number }}" required>
      </div>
       <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $client->email }}" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>    	
    <button type="submit" form="delete" class="btn btn-danger">Delete</button>
    <a class="btn btn-secondary" href="{{ url('/client') }}">Back</a>    	
  </form>
  <form id="delete" method="POST" action="/clients/{{ $client->id }}">
    @csrf
    @method('DELETE')
  </form>
</div>
@endsection