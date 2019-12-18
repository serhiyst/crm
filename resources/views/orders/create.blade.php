@extends('clients.layout')

@section('content')
<div class="container">
  <form method="POST" action="/clients/{{ $client->id }}/orders">
    @csrf
    <h2>Create Order</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>id</th>
          <th>Name</th>
          <th>Price</th>
          <th>Check</th>
        </tr>
      </thead>
      <tbody>      
        @foreach($product as $data)
          <tr>
            <td>{{ $data->id }}</td>  
            <td>{{ $data->name }}</td>  
            <td>{{ $data->price }}$</td> 
            <td><input type="checkbox" name="id_{{ $data->id }}" value="{{ $data->id }}"></td>
            <input type="hidden" name="client_id" value="{{ $client->id }}">  
          </tr>
        @endforeach
      </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Create</button> 
    <a class="btn btn-secondary" href="{{ url('/client') }}">Back</a>     
  </form>
</div>
@endsection