@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/newspaper/add') }}" class="btn btn-primary pull-right">Add Newspaper</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Newspaper List</div>
                <div class="panel-body">
                    <span class="pull-right">
                        <form action="{{ url('newspaper/search') }}" method="get" class="form-inline">
                            <input class="form-control" type="text" name="search">
                            <button type="submit" class="btn btn-default">Search Newspaper</button>
                        </form>
                    </span>
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
                    {{ $newspapers->links() }}
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
