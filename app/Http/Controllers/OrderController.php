<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name')->get();

        $productsList = array();
        $productsList[0] = 'SELECIONE';
        foreach($products as $product) {
            $productsList[$product->id] = $product->id . ' - ' . $product->name . ' (R$ ' . $product->price . ')';
        }

        return view('orders.create', ['products' => $productsList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $orderProducts = array();
        foreach($request->products_id as $productId) {
            $orderProducts[] = ['product_id' => $productId, 'amount' => 10];
        }

        $order = new Order;
        $order->final_price = 1598.12;
        $order->status = 1;
        $order->save();

        $order->products()->attach($orderProducts);

        return redirect('order/show/' . $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Order::find($id)->products()->get();

        return view('orders.show', ['products' => $products]);
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
    public function destroy(Order $order)
    {
        //
    }

    public function getProduct(Request $request) {
        $product = Product::find($request->id);

        return response()->json($product);
    }
}
