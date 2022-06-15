@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Supplier Management</h2>
        </div>
        <div class="pull-right">
            @can('suppliers.create')
            <a class="btn btn-success" href="{{ route('suppliers.create') }}"> Create New Supplier </a>
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
 @foreach ($data as $key => $supplier)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $supplier->supplier_name }}</td>
    <td>{{ $supplier->supplier_email }}</td>
    <td>{{ $supplier->supplier_phone }}</td>
    <td>
        @can('suppliers.show')
       <a class="btn btn-info" href="{{ route('suppliers.show',$supplier->id) }}">Show</a>
       @endcan

       @can('suppliers.edit')
       <a class="btn btn-primary" href="{{ route('suppliers.edit',$supplier->id) }}">Edit</a>
       @endcan

       @can('suppliers.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['suppliers.destroy', $supplier->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection