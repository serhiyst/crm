@extends('clients.layout')

@section('content')
<div class="container">
  <h2>Details</h2>
  <p>
	<dl class="row">
	  <dt class="col-sm-3">Id</dt>
	  <dd class="col-sm-9">{{ $client->id }}</dd>

	  <dt class="col-sm-3">Name</dt>
	  <dd class="col-sm-9">{{ $client->name }}</dd>

	  <dt class="col-sm-3">Address</dt>
	  <dd class="col-sm-9">{{ $client->address }}</dd>

	  <dt class="col-sm-3">Phone number</dt>
	  <dd class="col-sm-9">{{ $client->phone_number }}</dd>

	  <dt class="col-sm-3"><p>E-Mail</p></dt>
	  <dd class="col-sm-9">{{ $client->email }}</dd>

	  <div>
	  	<a href="/clients/{{ $client->id }}/edit" class="btn btn-primary">Edit</a>
	  	<button type="submit" form="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
	    <a class="btn btn-secondary" href="{{ url('/clients') }}">Back</a>
	  </div>
	 
	  <form id="delete" method="POST" action="/clients/{{ $client->id }}">
	    @method('DELETE') 
	  	@csrf
	  </form> 
	</dl>
  </p>
</div>
@endsection