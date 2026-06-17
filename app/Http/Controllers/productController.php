<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use function Laravel\Prompts\Support\success;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function product()
    {
        $product=Product::with('Category')->get();
        $category = Category::all();
        return view('setup.product',compact('product','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product=new Product();
        $product->category_id=$request->category_id;
        $product->product_name=$request->product_name;
        $product->purchase_price=$request->purchase_price;
        $product->sale_price=$request->sale_price;
        $product->save();
        return redirect()->route('setup.product')->with('success','Successfully Insrted');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$product_id)
    {
        $product=Product::all();
        $category = Category::all();
        $editProduct=product::findOrfail($product_id);
        return view('setup.product',compact('product','editProduct','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product_id)
    {
        $product=Product::findOrfail($product_id);
        $product->category_id=$request->category_id;
        $product->product_name=$request->product_name;
        $product->purchase_price=$request->purchase_price;
        $product->sale_price=$request->sale_price;
        $product->save();
        return redirect()->route('setup.product')->with('update','Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $product_id)
    {
       $product=Product::findOrfail($product_id);
       $product->delete();
       return redirect()->route('setup.product')->with('delete','Successfully deleted');
    }


    public function getProductList(){
        $productList=Category::all();
        return response()->json($productList);
    }
}
