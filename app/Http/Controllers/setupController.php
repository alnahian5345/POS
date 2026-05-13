<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class setupController extends Controller
{
   public function product(){
       return view('setup.product');
   }

    public function category(){
        return view('setup.category');
    }
}
