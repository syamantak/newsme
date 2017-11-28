@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/magazine/add') }}" class="btn btn-primary pull-right">Add Magazine or Book</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Magazines List
                    
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($magazines as $magazine)
                                <tr>
                                    <td>{{ $magazine->name }}</td>
                                    <td>{{ $magazine->quantity }}</td>
                                    <td>{{ $magazine->price }}</td>
                                    <td>
                                        <a href="{{ url('/magazine/edit/' . $magazine->id )}}">Edit</a>
                                        <a href="{{ url('/magazine/delete/' . $magazine->id )}}">Delete</a>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $magazines->links() }}
                </div>
                <div class="panel-footer clearfix">
                    <form action="{{ url('magazine/search') }}" method="get" class="form-inline pull-right">
                            <input class="form-control" type="text" name="search" placeholder="Magazine...">
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
