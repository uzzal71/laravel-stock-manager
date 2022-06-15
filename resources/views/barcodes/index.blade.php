@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Barcode Management</h2>
        </div>
        <div class="pull-right">
            @can('barcodes.create')
            <a class="btn btn-success" href="{{ route('barcodes.create') }}"> Create New Barcode </a>
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
   <th>Barcode Name</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $barcode)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $barcode->barcode_name }}</td>
    <td>
        @can('barcodes.show')
       <a class="btn btn-info" href="{{ route('barcodes.show',$barcode->id) }}">Show</a>
       @endcan

       @can('barcodes.edit')
       <a class="btn btn-primary" href="{{ route('barcodes.edit',$barcode->id) }}">Edit</a>
       @endcan

       @can('barcodes.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['barcodes.destroy', $barcode->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection