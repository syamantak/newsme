@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/stock/add') }}" class="btn btn-primary pull-right">Add Stock</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Stock 
                    
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Newspaper</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sold</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td>{{ $stock->date }}</td>
                                    <td>{{ \App\Newspaper::find($stock->newspaper)->name }}</td>
                                    <td>{{ $stock->quantity }}</td>
                                    <td>{{ $stock->price }}</td>
                                    <td>{{ $stock->sold }}</td>
                                    <td>
                                        <a href="{{ url('/stock/edit/' . $stock->id )}}">Edit</a>
                                        <a href="{{ url('/stock/delete/' . $stock->id )}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer clearfix">
                    <form action="{{ url('stock/search') }}" method="get" class="form-inline pull-right">
                            <input class="form-control" type="text" name="search" placeholder="Newspaper...">
                            <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
