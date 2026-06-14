<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Carbon\this;

class Purchase extends Model
{
    protected $table="purchase";
    protected $primaryKey="purchase_details";
    public $timestamps=false;

    public function SupplierList(){
        return $this->belongsTo(Supplier::class,'supplier_id','supplier_id');
    }
}
