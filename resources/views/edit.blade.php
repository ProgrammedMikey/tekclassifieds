@extends('layouts.main')

@section('title', 'Edit')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Listing</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(array('action' => ['ClassifiedsController@update', $classified->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', $value = $classified->title, $attributes = ['class' => 'form-control', 'name' => 'title' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                <select name="category_id" class="form-control">
                    <option value="1">Desktops</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', $value=$classified->description, $attributes = ['class' => 'form-control', 'name' => 'description' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', $value=$classified->price, $attributes = ['class' => 'form-control', 'name' => 'price' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('condition', 'Condition') !!}
                {!! Form::select('condition', array(
                'O' => 'Choose Condition',
                'Now' => 'Now',
                'Like New' => 'Like New',
                'Used' => 'Used',
                'Bad' => 'Bad',
                'Broken' => 'Broken'
                ), $classified->condition, $attributes = ['class' => 'form-control', 'name' => 'condition' ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('main_image', 'Main Image') !!}
                {!! Form::file('main_image', $attributes = ['class' => 'btn btn-default' ]) !!}
            </div>

            <h3>Seller Contact Info</h3>
            <div class="form-group">
                {!! Form::label('location', 'Location') !!}
                {!! Form::text('location', $value=$classified->location, $attributes = ['class' => 'form-control', 'name' => 'location' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Contact Email') !!}
                {!! Form::text('email', $value=$classified->email, $attributes = ['class' => 'form-control', 'name' => 'email' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Contact Phone') !!}
                {!! Form::text('phone', $value=$classified->phone, $attributes = ['class' => 'form-control', 'name' => 'phone' ]) !!}
            </div>
            {!! Form::submit('Submit', $attributes = ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop