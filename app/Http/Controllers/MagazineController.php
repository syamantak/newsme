<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Magazine;
use Auth;

class MagazineController extends Controller
{
    public function list(Request $request)
    {
        $magazines = Magazine::where('user', Auth::user()->id)->paginate(10);
        return view('magazine.list', ['magazines' => $magazines]);
    }

    public function add(Request $request)
    {
    	return view('magazine.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        Magazine::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'user' => Auth::user()->id
        ]);
        $request->session()->flash('message', 'Magazine created successfully.');
        return back();
    }

    public function edit(Request $request, $id)
    {
    	$magazine = Magazine::find($id);
    	return view('magazine.edit', ['magazine' => $magazine]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required',
            'quantity' => 'required',
        ]);
    	$magazine = Magazine::find($request->id);
    	$magazine->name = $request->name;
    	$magazine->price = $request->price;
    	$magazine->quantity = $request->quantity;
    	$magazine->save();
    	$request->session()->flash('message', 'Magazine updated successfully.');
    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Magazine::where('id', $id)->delete();
    	$request->session()->flash('message', 'Magazine updated successfully.');
    	return back();
    }

    public function search(Request $request)
    {
    	$request->validate([
    		'search' => 'required',
        ]);

        $magazines = Magazine::where('name', 'like', '%' . $request->search . '%')
        ->paginate(10);
        $request->session()->flash('message', 'Search results.');
    	return view('magazine.list', ['magazines' => $magazines]);
    }
}
