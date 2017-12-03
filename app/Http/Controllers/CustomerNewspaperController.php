<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerNewspaper;
use App\Customer;
use App\Newspaper;
use Auth;
use DB;

class CustomerNewspaperController extends Controller
{
    public function list(Request $request)
    {
        $customernewspapers = CustomerNewspaper::where('user', Auth::user()->id)->paginate(10);
        return view('customernewspaper.list', ['customernewspapers' => $customernewspapers]);
    }

    public function add(Request $request)
    {
    	$customers = Customer::where('user', Auth::user()->id)->get();
    	$newspapers = Newspaper::where('user', Auth::user()->id)->get();
    	return view('customernewspaper.add', [ 'customers' => $customers, 'newspapers' => $newspapers ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'newspaper' => 'required',
        ]);
        foreach ($request->newspaper as $value) {
        	CustomerNewspaper::create([
	            'customer' => $request->customer,
	            'newspaper' => $value,            
	            'user' => Auth::user()->id
	        ]);
        }
        $request->session()->flash('message', 'Record created successfully.');
        return back();
    }

    public function edit(Request $request, $id)
    {
    	$customers = Customer::where('user', Auth::user()->id)->get();
    	$newspapers = Newspaper::where('user', Auth::user()->id)->get();
    	$customernewspaper = CustomerNewspaper::find($id);
    	return view('customernewspaper.edit', ['customernewspaper' => $customernewspaper, 'customers' => $customers, 'newspapers' => $newspapers ]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'customer' => 'required',
            'newspaper' => 'required',
        ]);
    	$customernewspaper = CustomerNewspaper::find($request->id);
    	$customernewspaper->customer = $request->customer;
    	$customernewspaper->newspaper = $request->newspaper;
    	$customer->save();
    	$request->session()->flash('message', 'Record updated successfully.');
    	return back();
    }

    public function delete(Request $request, $id)
    {
    	CustomerNewspaper::where('id', $id)->delete();
    	return back();
    }

    public function search(Request $request)
    {
    	$request->validate([
    		'search' => 'required',
        ]);

        $customernewspapers = DB::table('customer_newspapers')
        ->join('customers', 'customers.id', '=', 'customer_newspapers.customer')
        ->where('customers.name', 'like', '%' . $request->search . '%')
        ->where('customers.user', Auth::user()->id)
        ->select('customer_newspapers.*')
        ->paginate(10);

        $request->session()->flash('message', 'Search results.');
    	return view('customernewspaper.list', ['customernewspapers' => $customernewspapers]);
    }
}
