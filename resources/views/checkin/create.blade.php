@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('items.index') }}"> Back </a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong>Something went wrong.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'items.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Name:</strong>
            {!! Form::text('item_name', null, array('placeholder' => 'Item Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Code:</strong>
            {!! Form::text('item_code', null, array('placeholder' => 'Item Code','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Barcode:</strong>
            {!! Form::select('item_barcode', ['Code25' => 'Code25', 'Code39' => 'Code39', 'Code128' => 'Code128', 'EAN8' => 'EAN8', 'EAN13' => 'EAN13', 'UPC-A' => 'UPC-A', 'UPC-E' => 'UPC-E'], null, ['placeholder' => 'Pick a barcode', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            {!! Form::select('category_id', ['1' => 'Jamel Gibson', '2' => 'Miss Augusta Schinner', '3' => 'Gregoria Howell', '4' => 'Melissa Hayes', '5' => 'Mrs. Juana Crona', '6' => 'Chyna Herzog', '7' => 'Gillian Kutch', '8' => 'Prof. Josh Pfeffer I', '9' => 'Neil Sanford', '10' => 'Dr. Novella Pagac'], null, ['placeholder' => 'Pick a Category', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Brand:</strong>
            {!! Form::select('brand_id', ['1' => 'Trudie Turner', '2' => 'Jena Jaskolski', '3' => 'Dominic Kerluke III', '4' => 'Scot Bartoletti', '5' => 'Prof. Darron Hintz', '6' => 'Adam Runte', '7' => 'Ari Jacobs', '8' => 'Aiyana Pouros', '9' => 'Jacklyn Wolf', '10' => 'Brad Barton'], null, ['placeholder' => 'Pick a Brand', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Quantity:</strong>
            {!! Form::text('item_quantity', null, array('placeholder' => 'Quantity','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Unit:</strong>
            {!! Form::text('item_unit', null, array('placeholder' => 'Unit','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Alert Quantity:</strong>
            {!! Form::text('item_alert_quantity', null, array('placeholder' => 'Alert Quantity','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection