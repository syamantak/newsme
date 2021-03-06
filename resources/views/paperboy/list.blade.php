@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/paperboy/add') }}" class="btn btn-primary pull-right">Add Paperboy</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    Paperboy List
                    
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paperboys as $paperboy)
                                <tr>
                                    <td>{{ $paperboy->name }}</td>
                                    <td>{{ $paperboy->address }}</td>
                                    <td>{{ $paperboy->mobile }}</td>
                                    <td>
                                        <a href="{{ url('/paperboy/edit/' . $paperboy->id )}}">Edit</a>
                                        <a href="{{ url('/paperboy/delete/' . $paperboy->id )}}">Delete</a>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $paperboys->links() }}
                </div>
                <div class="panel-footer clearfix">
                    <form action="{{ url('paperboy/search') }}" method="get" class="form-inline pull-right">
                            <input class="form-control" type="text" name="search" placeholder="Paperboy...">
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
