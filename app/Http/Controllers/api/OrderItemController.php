<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItemResource;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $orderItems = OrderItemResource::collection(OrderItem::get());
        return $this->apiResponse($orderItems,'successful',200);
    }

    public function show($id){
        $orderItem = OrderItem::find($id);
        if($orderItem){
            return $this->apiResponse($orderItem,'success',200);
        }
            return $this->apiResponse(null,'not found',404);
    }

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'order_id'=>'required|exists:orders,id',
            'dish_id'=>'required|exists:dishes,id',
            'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer|min:1|max:255',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $orderItem = new OrderItem();
        $orderItem->order_id = $request->order_id;
        $orderItem->dish_id = $request->dish_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price = $request->price;
    
        $orderItem->save();

        if($orderItem){
            return $this->apiResponse(new OrderItemResource($orderItem),'success',200);
        }
            return $this->apiResponse(null,'not saved!',400);
    }

    public function update(Request $request,$id){
        $validator =Validator::make($request->all(),[
            'order_id'=>'required|exists:orders,id',
            'dish_id'=>'required|exists:dishes,id',
            'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer|min:1|max:255',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $orderItem= OrderItem::findOrFail($id);

        if(! $orderItem){
            return $this->apiResponse(null,'not found',404); 
         }

        $orderItem->order_id = $request->order_id;
        $orderItem->dish_id = $request->dish_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price = $request->price;
    
        $orderItem->save();

        if($orderItem){
            return $this->apiResponse(new OrderItemResource($orderItem),'success',200);
        }
            return $this->apiResponse(null,'Update failed',404);
    }

    public function destroy($id){
        $orderItem = OrderItem::find($id);

        if(! $orderItem){
            return $this->apiResponse(null,'not found',404);
        }
         $orderItem->delete($id);

         if($orderItem){
            return $this->apiResponse(null,'successfuly deleted',200);
        }
    }
}
