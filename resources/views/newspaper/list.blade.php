@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/newspaper/add') }}" class="btn btn-primary pull-right">Add Newspaper</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Newspaper List
                    
                </div>
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
                    {{ $newspapers->links() }}
                </div>
                <div class="panel-footer clearfix">
                    <form action="{{ url('newspaper/search') }}" method="get" class="form-inline pull-right">
                            <input class="form-control" type="text" name="search" placeholder="Newspaper...">
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                </div>

            </div> 
        </div>
    </div>
</div>
@endsection
