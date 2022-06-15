@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Brand Management</h2>
        </div>
        <div class="pull-right">
            @can('brands.create')
            <a class="btn btn-success" href="{{ route('brands.create') }}"> Create New Brand </a>
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
   <th>Brand Code</th>
   <th>Brand Name</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $brand)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $brand->brand_code }}</td>
    <td>{{ $brand->brand_name }}</td>
    <td>
        @can('brands.show')
       <a class="btn btn-info" href="{{ route('brands.show',$brand->id) }}">Show</a>
       @endcan

       @can('brands.edit')
       <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Edit</a>
       @endcan

       @can('brands.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['brands.destroy', $brand->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection