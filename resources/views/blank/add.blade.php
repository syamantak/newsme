@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/blank/list') }}" class="btn btn-primary pull-right">Back</a>
    	<br><br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Blank</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('blank/create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
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

                        <div class="form-group{{ $errors->has('newspaper') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">Newspaper</label>

                            <div class="col-md-6">
                                <select name="newspaper" class="form-control" multiple>
                                    @foreach($newspapers as $newspaper)
                                        <option value="{{ $newspaper->id }}">{{ $newspaper->name }}</option> 
                                    @endforeach                                   
                                </select>

                                @if ($errors->has('newspaper'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newspaper') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input class="form-control" name="date" type="text">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
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
