@extends('layouts.app')


@section('content')
<div class="row mb-2">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Item Management</h2>
        </div>
        <div class="pull-right">
            @can('checkins.create')
            <a class="btn btn-success" href="{{ route('checkin.create') }}"> Create New Checkin </a>
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
   <th>Created By</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $checkin)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $checkin->checkin_date }}</td>
    <td>{{ $checkin->reference }}</td>
    <td>{{ $checkin->supplier->supplier_name }}</td>
    <td>{{ $checkin->user->name }}</td>
    <td>
        @can('checkins.show')
       <a class="btn btn-info" href="{{ route('checkin.show',$checkin->id) }}">Show</a>
       @endcan

       @can('checkins.edit')
       <a class="btn btn-primary" href="{{ route('checkin.edit',$checkin->id) }}">Edit</a>
       @endcan

       @can('checkins.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['checkin.destroy', $checkin->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection