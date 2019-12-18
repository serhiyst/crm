<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client, Product $product)
    {
        $order = $client->orders;
        return view('orders.index', compact('order', 'client', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Client $client)
    {
        $product = Product::all();
        return view('orders.create', compact('product', 'client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order, Client $client)
    {
      
        $productsId = array_values($request->except('client_id', '_token'));
        $products = Product::whereIn('id', $productsId)->get();

        $order = Order::create(['day_of_delivery' => Carbon::tomorrow(), 
                                'client_id' => $request->input('client_id'), 
                                'items' => implode(', ', $productsId) , 
                                'total' => $products->sum('price')]);
        $order->products()->sync($productsId);
        return redirect()->route('orders.index', $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Order $order)
    {
        $counter = 0;
        return view('orders.show', compact('product', 'client', 'order', 'counter'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

    public function markAsCompleted(Client $client, Order $order)
    {
        $order->update(['status' => true, 'completed_at' => Carbon::now()]);
        return redirect()->back();
    }
}
