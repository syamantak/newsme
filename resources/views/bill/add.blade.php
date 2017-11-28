@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/bill/list') }}" class="btn btn-primary pull-right">Back</a>
    	<br><br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Bill</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('bill/create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Customer</label>

                            <div class="col-md-6">
                                <select name="customer" class="form-control">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name . ' | ' . $customer->address }}</option> 
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
                                <input class="form-control" name="amount" type="text">

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input class="form-control" name="from_date" type="text">

                                @if ($errors->has('from_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group{{ $errors->has('to_date') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">To Date</label>

                            <div class="col-md-6">
                                <input class="form-control" name="to_date" type="text">

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
                                    Add
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
