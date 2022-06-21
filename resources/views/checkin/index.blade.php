@extends('layouts.app')


@section('content')
<div class="row mb-2">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Item Management</h2>
        </div>
        <div class="pull-right">
            @can('checkins.create')
            <a class="btn btn-success" href="{{ route('checkin.create') }}"> Create New Item </a>
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
   <th>Supplier</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $item)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $item->checkin_date }}</td>
    <td>{{ $item->reference }}</td>
    <td>{{ $item->supplier_id }}</td>
    <td>
        @can('items.show')
       <a class="btn btn-info" href="{{ route('items.show',$item->id) }}">Show</a>
       @endcan

       @can('items.edit')
       <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}">Edit</a>
       @endcan

       @can('items.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['items.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection