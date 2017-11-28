<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newspaper;
use Auth;

class NewspaperController extends Controller
{
    public function list(Request $request)
    {
        $newspapers = Newspaper::where('user', Auth::user()->id)->paginate(10);
        return view('newspaper.list', ['newspapers' => $newspapers]);
    }

    public function add(Request $request)
    {
    	return view('newspaper.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Newspaper::create([
            'name' => $request->name,
            'user' => Auth::user()->id
        ]);

        return back();
    }

    public function edit(Request $request, $id)
    {
    	$newspaper = Newspaper::find($id);
    	return view('newspaper.edit', ['newspaper' => $newspaper]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'name' => 'required|max:255',
        ]);
    	$newspaper = Newspaper::find($request->id);
    	$newspaper->name = $request->name;
    	$newspaper->save();

    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Newspaper::where('id', $id)->delete();
    	return back();
    }

    public function search(Request $request)
    {
    	$request->validate([
    		'search' => 'required',
        ]);

        $newspapers = Newspaper::where('name', 'like', '%' . $request->search . '%')
        ->paginate(10);

    	return view('newspaper.list', ['newspapers' => $newspapers]);
    }
}
