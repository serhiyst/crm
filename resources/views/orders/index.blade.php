@extends('clients.layout')

@section('content')
<div class="container">
  <h2>List of Orders
    <span style="float: right;">
      <a href="/clients/{{ $client->id }}/orders/create" class="btn btn-success btn-sm"><span data-feather="plus"></span> Add order</a></span></h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Day of Delivery</th>
        <th>List</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order as $data)
        <tr class="table-tr-hover" onclick="location.href = '/clients/{{ $client->id }}/orders/{{ $data->id }}'">
          <td>{{ $data->id }}</td>	
          <td>{{ $data->day_of_delivery }}</td>	
          <td>
            @foreach($order->find($data->id)->products as $product)
              {{ $product->name }} - {{ $product->price }} $<br>
            @endforeach</td>
          <td> {{ $data->total }} $</td>
          <td> 
            @if ($data->status == 1)
              <span class="badge badge-success">{{ 'completed' }}</span> 
            @else 
              <span class="badge badge-info">{{ 'processing'}}</span> 
            @endif
          </td>
          <td>
            <form id="delete" method="POST" action="/clients/{{ $client->id }}/orders/{{ $data->id }}">
              @method('DELETE') 
              @csrf
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
            </form>
          </td> 
        </tr>
      @endforeach
    </tbody>
  </table>
  @if ($order->isEmpty())
    <h5>There are no orders yet</h5> 
  @endif
</div>
@endsection