@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/customer/add') }}" class="btn btn-primary pull-right">Add Customer</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Customers List
                	
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
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>
                                        <a href="{{ url('/customer/edit/' . $customer->id )}}">Edit</a>
                                        <a href="{{ url('/customer/delete/' . $customer->id )}}">Delete</a>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
                <div class="panel-footer clearfix">
                	<form action="{{ url('customer/search') }}" method="get" class="form-inline pull-right">
                            <input class="form-control" type="text" name="search" placeholder="Customer...">
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
