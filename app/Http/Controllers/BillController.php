<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Auth;
use App\Customer;


class BillController extends Controller
{
    public function list(Request $request)
    {
        $bills = Bill::where('user', Auth::user()->id)->paginate(10);
        return view('bill.list', ['bills' => $bills]);
    }

    public function add(Request $request)
    {
    	$customers = Customer::where('user', Auth::user()->id)->get();
    	return view('bill.add', [ 'customers' => $customers]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);

        Bill::create([
            'customer' => $request->customer,
            'amount' => $request->amount,            
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'user' => Auth::user()->id
        ]);

        return back();
    }

    public function edit(Request $request, $id)
    {
    	$customers = Customer::where('user', Auth::user()->id)->get();
    	$bill = Bill::find($id);
    	return view('bill.edit', ['bill' => $bill, 'customers' => $customers]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'customer' => 'required',
            'amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
    	$bill = Bill::find($request->id);
    	$bill->amount = $request->amount;
    	$bill->from_date = $request->from_date;
    	$bill->to_date = $request->to_date;
    	$bill->save();
    	
    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Bill::where('id', $id)->delete();
    	return back();
    }
}
