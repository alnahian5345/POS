<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table="products";
   protected $primaryKey="product_id";
   public $timestamps = false;


   public function Category(){
       return $this->belongsTo(Category::class,'category_id','category_id');
   }
}
