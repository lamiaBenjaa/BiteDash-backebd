<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        $orders = Order::paginate(10);
        return view('pages.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'orderDate'=> 'required|date|after_or_equal:today',
            'deliveryAdress'=>'required|string|max:255',
            'totalAmount'=>'required|numeric',
            'status'=>'required|in:pending,confirmed,delivered'
        ]);

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->restaurant_id = $request->restaurant_id;
        $order->orderDate = $request->orderDate;
        $order->deliveryAdress = $request->deliveryAdress;
        $order->totalAmount = $request->totalAmount;
        $order->status = $request->status;

        $order->save();

        return redirect()->route('orders.index')->with('success','order added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('pages.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('pages.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'orderDate'=> 'required|date|after_or_equal:today|',
            'deliveryAdress'=>'required|string|max:255',
            'totalAmount'=>'required|numeric',
            'status'=>'required|in:pending,confirmed,delivered'
        ]);

        $order = Order::findOrFail($id);
        $order->user_id = $request->user_id;
        $order->restaurant_id = $request->restaurant_id;
        $order->orderDate = $request->orderDate;
        $order->deliveryAdress = $request->deliveryAdress;
        $order->totalAmount = $request->totalAmount;
        $order->status = $request->status;

        $order->save();

        return redirect()->route('orders.index')->with('success','order updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success','order deleted successfuly!');

    }
}
