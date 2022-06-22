@extends('layouts.app')


@section('content')
<div class="row mb-2">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Item Management</h2>
        </div>
        <div class="pull-right">
            @can('checkouts.create')
            <a class="btn btn-success" href="{{ route('checkout.create') }}"> Create New Checkout </a>
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
   <th>Date</th>
   <th>Reference</th>
   <th>Customer</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $checkout)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $checkout->checkout_date }}</td>
    <td>{{ $checkout->reference }}</td>
    <td>{{ $checkout->customer->customer_name }}</td>
    <td>
        @can('checkouts.show')
       <a class="btn btn-info" href="{{ route('checkout.show',$checkout->id) }}">Show</a>
       @endcan

       @can('checkouts.edit')
       <a class="btn btn-primary" href="{{ route('checkout.edit',$checkout->id) }}">Edit</a>
       @endcan

       @can('checkouts.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['checkout.destroy', $checkout->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection