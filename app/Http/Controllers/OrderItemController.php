<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderItems = OrderItem::paginate(10);
        return view('pages.orderItems.index',compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.orderItems.create');
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
            'order_id'=>'required|exists:orders,id',
            'dish_id'=>'required|exists:dishes,id',
            'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer|min:1|max:255',
        ]);

        $orderItem = new OrderItem();
        $orderItem->order_id = $request->order_id;
        $orderItem->dish_id = $request->dish_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price = $request->price;
    
        $orderItem->save();

        return redirect()->route('orderItems.index')->with('success','order items added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderItem= OrderItem::findOrFail($id);
        return view('pages.orderItems.show',compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderItem= OrderItem::findOrFail($id);
        return view('pages.orderItems.edit',compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id'=>'required|exists:orders,id',
            'dish_id'=>'required|exists:dishes,id',
            'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer|min:1|max:255',
        ]);

        $orderItem= OrderItem::findOrFail($id);

        $orderItem->order_id = $request->order_id;
        $orderItem->dish_id = $request->dish_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price = $request->price;
    
        $orderItem->save();

        return redirect()->route('orderItems.index')->with('success','order items updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderItem= OrderItem::findOrFail($id);
        $orderItem->delete();

        return redirect()->route('orderItems.index')->with('success','order Items deleted successfuly!');
    }
}
