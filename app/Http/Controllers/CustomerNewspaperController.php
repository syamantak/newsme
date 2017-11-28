<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerNewspaper;
use App\Customer;
use App\Newspaper;
use Auth;

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

        CustomerNewspaper::create([
            'customer' => $request->customer,
            'newspaper' => $request->newspaper,            
            'user' => Auth::user()->id
        ]);

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

    	return back();
    }

    public function delete(Request $request, $id)
    {
    	CustomerNewspaper::where('id', $id)->delete();
    	return back();
    }
}
