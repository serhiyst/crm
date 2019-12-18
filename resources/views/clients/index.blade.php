@extends('clients.layout')

@section('content')
<div class="container">
  <h2>List of Clients</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone number</th>
        <th>E-Mail</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($client as $data)
        <tr class="table-tr-hover" onclick="location.href = '/clients/{{ $data->id }}';">
          <td>{{ $data->id }}</td>	
          <td>{{ $data->name }}</td>	
          <td>{{ $data->address }}</td>	
          <td>{{ $data->phone_number }}</td>	
          <td>{{ $data->email }}</td>	
          <td>
          	<div class="btn-group">
              <a href="/clients/{{ $data->id }}/orders" class="btn btn-success btn-sm">Orders</a>
              <a href="/clients/{{ $data->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
              <button type="submit" form="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
              <form id="delete" method="POST" action="/clients/{{ $data->id }}">
              @method('DELETE') 
              @csrf
              </form> 
        	  </div>
          </td>
        </tr>
      @endforeach
    </tbody>    
  </table> 
</div>
@endsection