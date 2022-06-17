@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Item Management</h2>
        </div>
        <div class="pull-right">
            @can('items.create')
            <a class="btn btn-success" href="{{ route('items.create') }}"> Create New Item </a>
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
   <th>Code</th>
   <th>Barcode</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $item)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $item->item_name }}</td>
    <td>{{ $item->item_code }}</td>
    <td>{{ $item->item_barcode }}</td>
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