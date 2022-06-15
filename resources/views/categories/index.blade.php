@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category Management</h2>
        </div>
        <div class="pull-right">
            @can('categories.create')
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category </a>
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
   <th>Category Code</th>
   <th>Category Name</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $category)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $category->category_code }}</td>
    <td>{{ $category->category_name }}</td>
    <td>
        @can('categories.show')
       <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>
       @endcan

       @can('categories.edit')
       <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
       @endcan

       @can('categories.delete')
        {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection