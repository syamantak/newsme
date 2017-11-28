<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class CustomerController extends Controller
{
    public function list(Request $request)
    {
        $customers = Customer::where('user', Auth::user()->id)->paginate(10);
        return view('customer.list', ['customers' => $customers]);
    }

    public function add(Request $request)
    {
    	return view('customer.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required|numeric:10',
        ]);

        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'user' => Auth::user()->id
        ]);

        return back();
    }

    public function edit(Request $request, $id)
    {
    	$customer = Customer::find($id);
    	return view('customer.edit', ['customer' => $customer]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required|numeric:10',
        ]);
    	$customer = Customer::find($request->id);
    	$customer->name = $request->name;
    	$customer->address = $request->address;
    	$customer->mobile = $request->mobile;
    	$customer->save();

    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Customer::where('id', $id)->delete();
    	return back();
    }

    public function search(Request $request)
    {
    	$request->validate([
    		'search' => 'required',
        ]);

        $customers = Customer::where('name', 'like', '%' . $request->search . '%')
        ->paginate(10);

    	return view('customer.list', ['customers' => $customers]);
    }
}
