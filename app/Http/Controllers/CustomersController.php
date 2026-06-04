<?php

namespace App\Http\Controllers;

use App\Models\Customers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\requires;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer=Customers::all();
        return view('setup.customer',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'customer_name' => 'nullable|max:100',
                'phone'         => 'required|unique:customers,phone|max:11',
                'email'         => 'nullable|email|unique:customers,email',
                'address'       => 'max:255',
            ],
            [
//                'customer_name.required' => 'Please input customer name.',
                'customer_name.max'      => 'Customer name cannot exceed 100 characters.',
                'phone.max'              => 'Phone cannot exceed 11 characters.',
                'phone.required'         => 'Please input phone number.',
                'phone.unique'           => 'Phone number already exists.',

                'email.email'            => 'Please enter a valid email address.',
                'email.unique'           => 'Email already exists.',

                'address.max'            => 'Address cannot exceed 255 digit.',
            ]
        );
        $customer=new Customers();
        $customer->customer_name=$request->customer_name;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $customer->email=$request->email;
        $customer->save();
        return redirect()->route('setup.customer')->with('success','Inserted successfully');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customers,$customer_id)
    {
        $customer=Customers::all();
        $editCustomer=$customer->findOrfail($customer_id);
        return view('setup.customer',compact('customer','editCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$customer_id )
    {
        $customer=Customers::findOrfail($customer_id);
        $customer->customer_name=$request->customer_name;
        $customer->phone=$request->phone;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->save();
        return redirect()->route('setup.customer')->with('update','Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customers,$customer_id)
    {
        $customers=Customers::findOrfail($customer_id);
        $customers->delete();
        return redirect()->route('setup.customer')->with('delete','Successfully delete');
    }
}
