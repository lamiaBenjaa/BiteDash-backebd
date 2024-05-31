<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'UserName'=>$this->UserName,
            'email'=>$this->email,
            'password'=>$this->password,
            'phone'=>$this->phone,
            'adress'=>$this->adress,
            'image'=>$this->image,
        ];
    }
}
