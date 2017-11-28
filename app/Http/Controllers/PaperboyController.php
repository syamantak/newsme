<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paperboy;
use Auth;

class PaperboyController extends Controller
{
    public function list(Request $request)
    {
        $paperboys = Paperboy::where('user', Auth::user()->id)->paginate(10);
        return view('paperboy.list', ['paperboys' => $paperboys]);
    }

    public function add(Request $request)
    {
    	return view('paperboy.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required|numeric:10',
        ]);

        Paperboy::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'user' => Auth::user()->id
        ]);

        return back();
    }

    public function edit(Request $request, $id)
    {
    	$paperboy = Paperboy::find($id);
    	return view('paperboy.edit', ['paperboy' => $paperboy]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'id' => 'required',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required|numeric:10',
        ]);
    	$paperboy = Paperboy::find($request->id);
    	$paperboy->name = $request->name;
    	$paperboy->address = $request->address;
    	$paperboy->mobile = $request->mobile;
    	$paperboy->save();

    	return back();
    }

    public function delete(Request $request, $id)
    {
    	Paperboy::where('id', $id)->delete();
    	return back();
    }

    public function search(Request $request)
    {
    	$request->validate([
    		'search' => 'required',
        ]);

        $paperboys = Paperboy::where('name', 'like', '%' . $request->search . '%')
        ->paginate(10);

    	return view('paperboy.list', ['paperboys' => $paperboys]);
    }
}
