<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable =['name','description','adress','phone','openingHours','rating','image'];

    public function dish(){
        return $this->hasMany(Dish::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function favorite(){
        return $this->hasMany(Favorite::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
