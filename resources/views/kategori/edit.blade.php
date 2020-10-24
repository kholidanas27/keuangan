@extends('layouts.app')
@section('content');
<div class="container">
  <div class="col-md">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Kategori</div>
      <div class="panel-body">
        <form action="{{ route('inkubator.kategori.update',$kategori) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Enter Your Name" value="{{$kategori->category}}">
          </div>
          <div class="form-group">
            <input type="submit" value="Edit" class="btn btn-primary">
            <a href="{{ route('inkubator.kategori.create') }}" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection();
