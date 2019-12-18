@extends('clients.layout')

@section('content')
<div class="container">
  <h2>Order {{ $order->id }}
    <span style="float: right;">
      <a href="/clients/{{ $client->id }}/orders/create" class="btn btn-success btn-sm"><span data-feather="plus"></span> Add order</a></span></h2>
  <table class="table">
    <thead>
      <tr>
        <th>N</th>
        <th>Items</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->products as $product)
        <tr>  
          <td>{{ ++$counter }}.</td>	         	
          <td>{{ $product->name }} <br></td>
          <td> {{ '1' }} </td>
          <td>{{ $product->price }} $</td>          
        </tr>        
      @endforeach
      <tr>
        <td></td>
        <td></td>
        <td><span style="float: right;"><strong>Total:</strong></span></td>
        <td>{{ $order->products->sum('price') }} $</td>
      </tr>
    </tbody>
  </table>
  <div style="float: right;"> 
    @if ($order->status == 1) Order status: 
      <span class="badge badge-success">{{ 'completed' }}</span>
      <br> at {{ $order->completed_at }} 
    @else Order status: 
      <span class="badge badge-info">{{ 'processing'}}</span><br>
      <p><div style="float: right;">
        <form method="POST" action="/clients/{{ $client->id }}/orders/{{ $order->id }}/completed">
          @csrf
          @method('PATCH')
          <button type="confirm" class="btn btn-outline-success btn-sm">Mark as completed</button>
        </form>
      </div></p>
    @endif
  </div>
</div>
@endsection