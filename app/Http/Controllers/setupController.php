<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class setupController extends Controller
{
    public function category(){
        return view('setup.category');
    }
    public function categoryCreate(Request $request){
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->save();
        return redirect()->back()->with('success','Successfully Supplier Added');
    }



    public function product(){
        return view('setup.product');
    }

}
