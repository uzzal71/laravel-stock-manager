@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New Customer</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back </a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Something went wrong.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($customer, ['method' => 'PATCH','route' => ['customers.update', $customer->id]]) !!}
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Name:</strong>
            {!! Form::text('customer_name', null, array('placeholder' => 'Customer Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Email:</strong>
            {!! Form::text('customer_email', null, array('placeholder' => 'Customer Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Phone:</strong>
            {!! Form::text('customer_phone', null, array('placeholder' => 'Customer Phone','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Custom Field 1:</strong>
            {!! Form::text('customer_cf1', null, array('placeholder' => 'Customer Custom Field 1','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Custom Field 2:</strong>
            {!! Form::text('customer_cf2', null, array('placeholder' => 'Customer Custom Field 2','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection