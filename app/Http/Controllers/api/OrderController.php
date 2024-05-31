<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $orders = OrderResource::collection(Order::get());
        return $this->apiResponse($orders,'successful',200);
    }

    public function show($id){
        $order = Order::find($id);
        if($order){
            return $this->apiResponse($order,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'orderDate'=> 'required|date|after_or_equal:today',
            'deliveryAdress'=>'required|string|max:255',
            'totalAmount'=>'required|numeric',
            'status'=>'required|in:pending,confirmed,delivered'
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->restaurant_id = $request->restaurant_id;
        $order->orderDate = $request->orderDate;
        $order->deliveryAdress = $request->deliveryAdress;
        $order->totalAmount = $request->totalAmount;
        $order->status = $request->status;

        $order->save();

        if($order){
            return $this->apiResponse(new OrderResource($order),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'user_id'=>'required|exists:users,id',
            'restaurant_id'=>'required|exists:restaurants,id',
            'orderDate'=> 'required|date|after_or_equal:today',
            'deliveryAdress'=>'required|string|max:255',
            'totalAmount'=>'required|numeric',
            'status'=>'required|in:pending,confirmed,delivered'
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }
        $order = Order::findOrFail($id);

        if(! $order){
          return $this->apiResponse(null,'not found',404); 
       }

        $order->user_id = $request->user_id;
        $order->restaurant_id = $request->restaurant_id;
        $order->orderDate = $request->orderDate;
        $order->deliveryAdress = $request->deliveryAdress;
        $order->totalAmount = $request->totalAmount;
        $order->status = $request->status;

        $order->save();

        if($order){
            return $this->apiResponse(new OrderResource($order),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
    }

    public function destroy($id){
        $order = Order::find($id);

        if(! $order){
            return $this->apiResponse(null,'not found',404);
        }
         $order->delete($id);

         if($order){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
        
    }
}
