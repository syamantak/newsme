@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<a href="{{ url('/magazine/list') }}" class="btn btn-primary pull-right">Back</a>
    	<br><br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Magazine</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('magazine/update') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $magazine->id }}">

                        <div class="form-group{{ $errors->has('magazine') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $magazine->name }}" required autofocus>

                                @if ($errors->has('magazine'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('magazine') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="total" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $magazine->price  }}" required>

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
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $magazine->quantity }}" required>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
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
