@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('services.index') }}" class="pull-left">&laquo; Back to Services</a>
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">Create a Service</div>

                <div class="panel-body">
                    <form action="{{ route('services.create.submit') }}" method="post">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="label-control">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Service Title" value="{{ old('title') ? old('title') : '' }}" required>
                                    @if ($errors->has('title'))
                                        <div class="help-block danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price" class="label-control">Price</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="{{ old('price') ? number_format(old('price'), 2) : '' }}" required>
                                    </div>
                                    @if ($errors->has('price'))
                                        <div class="help-block danger">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label for="category" class="label-control">Category</label>
                                    <service-category-select selected-category="{{ null }}"></service-category-select>
                                    @if ($errors->has('category'))
                                        <div class="help-block danger">
                                            {{ $errors->first('category') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-block btn-form-lower pull-right">Create Service</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
