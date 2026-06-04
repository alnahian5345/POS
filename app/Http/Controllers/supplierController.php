<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(){
       $supplier=Supplier::all();
       return view('setup.supplier',compact('supplier'));
   }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $supplier=new Supplier();
        $supplier->supplier_name    =$request->supplier_name;
        $supplier->phone            =$request->phone;
        $supplier->address          =$request->address;
        $supplier->save();
        return redirect()->route('setup.supplier')->with('success','Successfully Supplier Added');
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
    public function destroy($supplier_id)
    {
        $supplier=Supplier::findOrfail($supplier_id);
        $supplier->delete();
        return redirect()->route('setup.supplier')->with('delete','Successfully Deleted');
    }
}
