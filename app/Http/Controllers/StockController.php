<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use Auth;
use App\Newspaper;
use DB;

class StockController extends Controller
{
    public function list(Request $request)
    {
        $stocks = Stock::where('user', Auth::user()->id)->paginate(10);
        return view('stock.list', ['stocks' => $stocks]);
    }

    public function add(Request $request)
    {
    	$newspapers = Newspaper::where('user', Auth::user()->id)->get();
    	return view('stock.add', [ 'newspapers' => $newspapers ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'newspaper' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sold' => 'required',
            'date' => 'required',
        ]);

        Stock::create([
            'newspaper' => $request->newspaper,
            'user' => Auth::user()->id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'sold' => $request->sold,
            'date' => $request->date,
        ]);
        $request->session()->flash('message', 'Stock created successfully.');
        return back();
    }

    public function edit(Request $request, $id)
    {
    	$stock = Stock::find($id);
    	$newspapers = Newspaper::where('user', Auth::user()->id)->get();
    	return view('stock.edit', ['stock' => $stock, 'newspapers' => $newspapers ]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'newspaper' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'sold' => 'required',
            'date' => 'required',
        ]);

    	$stock = Stock::find($request->id);
    	$stock->newspaper = $request->newspaper;
    	$stock->quantity = $request->quantity;
    	$stock->price = $request->price;
    	$stock->sold = $request->sold;
    	$stock->date = $request->date;
    	$stock->save();
    	$request->session()->flash('message', 'Stock updated successfully.');
    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Stock::where('id', $id)->delete();
    	$request->session()->flash('message', 'Stock deleted successfully.');
    	return back();
    }

    public function search(Request $request)
    {
    	$request->validate([
    		'search' => 'required',
        ]);

        $stocks = DB::table('stocks')
        ->join('newspapers', 'newspapers.id', '=', 'stocks.newspaper')
        ->where('newspapers.name', 'like', '%' . $request->search . '%')
        ->select('stocks.*')
        ->paginate(10);
        $request->session()->flash('message', 'Search results.');
    	return view('stock.list', ['stocks' => $stocks]);
    }
}
