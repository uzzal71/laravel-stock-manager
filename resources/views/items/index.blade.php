@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Customer Management</h2>
        </div>
        <div class="pull-right">
            @can('customers.create')
            <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customer </a>
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
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection