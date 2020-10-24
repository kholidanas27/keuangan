@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.module.sidebar') 
        </div>
      <div class="col-md">
        <a href="{{ route('inkubator.kategori.create') }}" class="btn btn-primary">Tambah Kategori <i class="fa fa-plus"></i></a>
        <h1></h1>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Pilihan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($berita_category as $kategori)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $kategori->category }}</td>
              <td>
                <a href="{{ route('inkubator.kategori.edit', $kategori) }}" class="btn btn-success btn-sm" style="float:left;">Edit</a>
                <form action="{{ route('inkubator.kategori.destroy',$kategori) }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" style="margin-left:3px;">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection()
