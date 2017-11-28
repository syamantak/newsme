@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/customernewspaper/add') }}" class="btn btn-primary pull-right">Add Newspaper to Customer</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Customers List</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>NewsPaper</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customernewspapers as $customernewspaper)
                                <tr>
                                    <td>{{ \App\Customer::find($customernewspaper->customer)->name }}</td>
                                    <td>{{ \App\Newspaper::find($customernewspaper->newspaper)->name }}</td>
                                    <td>
                                        <a href="{{ url('/customernewspaper/edit/' . $customernewspaper->id )}}">Edit</a>
                                        <a href="{{ url('/customernewspaper/delete/' . $customernewspaper->id )}}">Delete</a>
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
