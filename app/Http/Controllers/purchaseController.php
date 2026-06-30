<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Supplier;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchase.purchase');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       $purchase=new Purchase();

       $grandTotal=0;
       foreach ($request->product_id as $key =>$prod ){
           $grandTotal=$request->qty[$key]  * $request->price[$key] ;
       }
        $purchase->invoice_no=$request->invoice_no;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->supplier_id=$request->supplier_id;
        $purchase->total_amount=$grandTotal;

        $purchase->save();

        foreach ($request->product_id as $key=>$pord){
            $purchaseDetails=new PurchaseDetails();

            $purchaseDetails->purchase_id=$purchase->purchase_id;
            $purchaseDetails->product_id=$pord;
            $purchaseDetails->qty = $request->qty[$key];
            $purchaseDetails->price = $request->price[$key];
            $purchaseDetails->total = $request->qty[$key] * $request->price[$key];

            $purchaseDetails->save();

        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

//
    public function getSupllierList(){
        $purSupplier=Supplier::all();
        return response()->json($purSupplier);
    }


    public function getProductList(){
        $productList=Product::all();
        return response()->json($productList);
    }
}
