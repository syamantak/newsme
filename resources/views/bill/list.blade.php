@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/bill/add') }}" class="btn btn-primary pull-right">Add Bill to Customer</a>
    	<br><br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bills List
                    
                </div>
                <div class="panel-body">
                    <span class="pull-right">
                        <form action="{{ url('bill/search') }}" method="get" class="form-inline">
                            <input class="form-control" type="text" name="search" placeholder="Enter customer name...">
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ \App\Customer::find($bill->customer)->name }}</td>
                                    <td>{{ $bill->amount }}</td>
                                    <td>{{ $bill->from_date }}</td>
                                    <td>{{ $bill->to_date }}</td>
                                    <td>
                                        <a href="{{ url('/bill/edit/' . $bill->id )}}">Edit</a>
                                        <a href="{{ url('/bill/delete/' . $bill->id )}}">Delete</a>
                                    </td>
                                </tr>
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{ $bills->links() }}
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
