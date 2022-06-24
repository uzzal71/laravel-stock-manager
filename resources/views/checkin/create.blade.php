@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Checkin</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('checkin.index') }}"> Back </a>
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

<div class="row mt-2">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Checkin Date</strong>
            {!! Form::date('checkin_date', null, array('placeholder' => 'Checkin Date','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Reference:</strong>
            {!! Form::text('reference', null, array('placeholder' => 'Reference','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Supplier</strong>
            <select class="form-control" name="supplier_id">
                <option value="1">Select Supplier</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}({{ $supplier->id }})</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Add Item:</strong>
            <select class="form-control" name="item_id">
            <option value="1">Select Item</option>
                @foreach($items as $item)
                <option value="{{ $item->id }}">{{ $item->item_name }}({{ $item->item_code }})</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Delete</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="row mt-2">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Note:</strong>
            <textarea class="form-control" name="note"></textarea>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@endsection