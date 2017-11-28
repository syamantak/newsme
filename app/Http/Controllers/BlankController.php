<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blank;
use App\Customer;
use App\Newspaper;
use Auth;


class BlankController extends Controller
{
    public function list(Request $request)
    {
        $blanks = Blank::where('user', Auth::user()->id)->paginate(10);
        return view('blank.list', ['blanks' => $blanks]);
    }

    public function add(Request $request)
    {
    	$customers = Customer::where('user', Auth::user()->id)->get();
    	$newspapers = Newspaper::where('user', Auth::user()->id)->get();
    	return view('blank.add', [ 'customers' => $customers, 'newspapers' => $newspapers ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'newspaper' => 'required',
            'date' => 'required',
        ]);

        Blank::create([
            'customer' => $request->customer,
            'newspaper' => $request->newspaper,            
            'date' => $request->date,
            'user' => Auth::user()->id
        ]);

        return back();
    }

    public function edit(Request $request, $id)
    {
    	$customers = Customer::where('user', Auth::user()->id)->get();
    	$newspapers = Newspaper::where('user', Auth::user()->id)->get();
    	$blank = Blank::find($id);
    	return view('blank.edit', ['blank' => $blank, 'customers' => $customers, 'newspapers' => $newspapers ]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'customer' => 'required',
            'newspaper' => 'required',
            'date' => 'required',
        ]);
    	$blank = Blank::find($request->id);
    	$blank->customer = $request->customer;
    	$blank->newspaper = $request->newspaper;
    	$blank->date = $request->date;
    	$blank->save();

    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Blank::where('id', $id)->delete();
    	return back();
    }
}
