@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/blank/add') }}" class="btn btn-primary pull-right">Add Blank to Customer</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Blank List</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>NewsPaper</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blanks as $blank)
                                <tr>
                                    <td>{{ \App\Customer::find($blank->customer)->name }}</td>
                                    <td>{{ \App\Newspaper::find($blank->newspaper)->name }}</td>
                                    <td>{{ $blank->date }}</td>
                                    <td>
                                        <a href="{{ url('/blank/edit/' . $blank->id )}}">Edit</a>
                                        <a href="{{ url('/blank/delete/' . $blank->id )}}">Delete</a>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
