@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/customer/list') }}" class="btn btn-primary pull-right">Back</a>
    	<br><br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Customer</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('customernewspaper/update') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $customernewspaper->id }}">

                        <div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Customer</label>

                            <div class="col-md-6">
                                <select name="customer" class="form-control">
                                    @foreach($customers as $customer)
                                        @if($customernewspaper->customer == $customer->id)
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

                        <div class="form-group{{ $errors->has('newspaper') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">Newspaper</label>

                            <div class="col-md-6">
                                <select name="newspaper" class="form-control">
                                    @foreach($newspapers as $newspaper)
                                        @if($customernewspaper->newspaper == $newspaper->id)
                                            <option value="{{ $newspaper->id }}" selected>{{ $newspaper->name }}</option> 
                                        @else
                                            <option value="{{ $newspaper->id }}">{{ $newspaper->name }}</option>
                                        @endif 
                                    @endforeach                                   
                                </select>

                                @if ($errors->has('newspaper'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newspaper') }}</strong>
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
