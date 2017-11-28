@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/bill/list') }}" class="btn btn-primary pull-right">Back</a>
    	<br><br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Bill</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('bill/update') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $bill->id }}">

                        <div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Customer</label>

                            <div class="col-md-6">
                                <select name="customer" class="form-control">
                                    @foreach($customers as $customer)
                                        @if($bill->customer == $customer->id)
                                            <option value="{{ $customer->id }}" selected>{{ $customer->name . ' | ' . $customer->address }}</option> 
                                        @else
                                            <option value="{{ $customer->id }}">{{ $customer->name . ' | ' . $customer->address }}</option> 
                                        @endif
                                    @endforeach                                   
                                </select>

                                @if ($errors->has('customer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input class="form-control" name="amount" type="text" value="{{ $bill->amount }}">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input class="form-control" name="from_date" type="text" value="{{ $bill->from_date }}">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                   

                        <div class="form-group{{ $errors->has('to_date') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">To Date</label>

                            <div class="col-md-6">
                                <input class="form-control" name="to_date" type="text" value="{{ $bill->to_date }}">

                                @if ($errors->has('to_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
