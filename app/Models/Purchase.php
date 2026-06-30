<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use function Carbon\this;

class Purchase extends Model
{
    protected $table="purchase";
    protected $primaryKey="purchase_id";
    public $timestamps=false;

//    public function Supplier(){
//        return $this->belongsTo(Supplier::class,'supplier_id','supplier_id');
//    }
//    public function Product(){
//        return $this->belongsTo(Supplier::class,'supplier_id','supplier_id');
//    }


    public function PurchaseDetails(){
        return $this->hasMany(PurchaseDetails::class,'purchase_id','purchase_id');
    }
}
