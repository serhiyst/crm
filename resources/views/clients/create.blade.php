@extends('clients.layout')

@section('content')
<div class="container">
  <h2>Add Client</h2>
    <form class="container" method="POST" action="/clients">
      @csrf
        <div class="form-group">
      	  <label for="name">Name</label>
      	  <input type="text" class="form-control" name="name" required>
    	</div>
    	<div class="form-group">
      	  <label for="address">Address</label>
      	  <input type="text" class="form-control" name="address" required>
    	</div>
    	<div class="form-row">
      	  <div class="form-group col-md-6">
        	<label for="phone_number">Phone Number</label>
        	<input type="text" class="form-control" name="phone_number" required>
          </div>
       	  <div class="form-group col-md-6">
        	<label for="email">Email</label>
        	<input type="text" class="form-control" name="email" required>
          </div>
    	</div>
    	<button type="submit" class="btn btn-primary">Add</button> 
    	<a class="btn btn-secondary" href="{{ url('/client') }}">Back</a>    	
    </form>
</div>
@endsection