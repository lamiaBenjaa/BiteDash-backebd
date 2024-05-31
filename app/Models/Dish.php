<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable=['restaurant_id','categorie_id','name','description','price','image'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
