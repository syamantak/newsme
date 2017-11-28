@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/newspaper/add') }}" class="btn btn-primary pull-right">Add Newspaper</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Customers List</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newspapers as $newspaper)
                                <tr>
                                    <td>{{ $newspaper->name }}</td>
                                    <td>
                                        <a href="{{ url('/newspaper/edit/' . $newspaper->id )}}">Edit</a>
                                        <a href="{{ url('/newspaper/delete/' . $newspaper->id )}}">Delete</a>
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
