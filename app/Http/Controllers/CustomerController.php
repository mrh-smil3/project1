<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = 'Customers';
        $data['q'] = $request->get('q');
        $data['customers'] = Customer::where('customer_name', 'like', '%' . $data['q'] . '%')->get();
        return view('frontend.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add Customer';
        return view('backend.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'contact_name' => 'required',
        ]);

        $customer = new Customer($request->all());
        $customer->save();
        return redirect('customer')->with('success', 'Customer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $data['title'] = 'Edit Customer';
        $data['customer'] = $customer;
        return view('backend.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => 'required',
            'contact_name' => 'required',
        ]);
        $customer->customer_name = $request->customer_name;
        $customer->contact_name = $request->contact_name;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->save();
        return redirect('customer')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customer')->with('success', 'Customer deleted successfully');
    }
}
