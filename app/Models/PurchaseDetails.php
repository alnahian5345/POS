<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $table="purchase_details";
    protected $primaryKey="purchase_details_id";
    public $timestamps = false;
}
