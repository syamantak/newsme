@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/stock/list') }}" class="btn btn-primary pull-right">Back</a>
    	<br><br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Stock</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('stock/create') }}">
                        {{ csrf_field() }}

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



                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" required>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sold') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Sold</label>

                            <div class="col-md-6">
                                <input id="sold" type="text" class="form-control" name="sold" value="{{ old('sold') }}" required>

                                @if ($errors->has('sold'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sold') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" required>

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
