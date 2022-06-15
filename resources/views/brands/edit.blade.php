@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('suppliers.index') }}"> Back </a>
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


{!! Form::model($supplier, ['method' => 'PATCH','route' => ['suppliers.update', $supplier->id]]) !!}
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supplier Name:</strong>
            {!! Form::text('supplier_name', null, array('placeholder' => 'Supplier Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supplier Email:</strong>
            {!! Form::text('supplier_email', null, array('placeholder' => 'Supplier Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supplier Phone:</strong>
            {!! Form::text('supplier_phone', null, array('placeholder' => 'Supplier Phone','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supplier Custom Field 1:</strong>
            {!! Form::text('supplier_cf1', null, array('placeholder' => 'Supplier Custom Field 1','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supplier Custom Field 2:</strong>
            {!! Form::text('supplier_cf2', null, array('placeholder' => 'Supplier Custom Field 2','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection