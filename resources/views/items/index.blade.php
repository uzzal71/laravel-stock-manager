@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
<<<<<<< HEAD
            <h2>Item Management</h2>
        </div>
        <div class="pull-right">
            @can('items.create')
            <a class="btn btn-success" href="{{ route('items.create') }}"> Create New Item </a>
=======
            <h2>Customer Management</h2>
        </div>
        <div class="pull-right">
            @can('customers.create')
            <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer </a>
>>>>>>> 2ab1c47993581c5e5ae0470ccd6c56d52d881e40
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
<<<<<<< HEAD
   <th>Code</th>
   <th>Barcode</th>
   <th>Category</th>
   <th>Brand</th>
   <th>Quantity</th>
   <th>unit</th>
   <th>Alert Quantity</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $item)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $item->item_name }}</td>
    <td>{{ $item->item_code }}</td>
    <td>{{ $item->item_barcode }}</td>
    <td>{{ $item->category_id  }}</td>
    <td>{{ $item->brand_id }}</td>
    <td>{{ $item->item_quantity }}</td>
    <td>{{ $item->item_unit }}</td>
    <td>{{ $item->item_alert_quantity }}</td>
    <td>
        @can('items.show')
       <a class="btn btn-info" href="{{ route('items.show',$item->id) }}">Show</a>
       @endcan

       @can('items.edit')
       <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}">Edit</a>
       @endcan

       @can('items.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['items.destroy', $item->id],'style'=>'display:inline']) !!}
=======
   <th>Email</th>
   <th>Phone</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $customer)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $customer->customer_name }}</td>
    <td>{{ $customer->customer_email }}</td>
    <td>{{ $customer->customer_phone }}</td>
    <td>
        @can('customers.show')
       <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
       @endcan

       @can('customers.edit')
       <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
       @endcan

       @can('customers.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['customers.destroy', $customer->id],'style'=>'display:inline']) !!}
>>>>>>> 2ab1c47993581c5e5ae0470ccd6c56d52d881e40
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection