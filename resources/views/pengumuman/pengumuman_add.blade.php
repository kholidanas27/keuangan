@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$title}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('inkubator.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Title...." name="title" value="{{ old('title') }}" />
                        @if($errors->has('title'))
                        <div class="text-danger">
                            {{ $errors->first('title')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                            <option selected="" disabled="">Pilih Kategori</option>
                            @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" {{ old('kategori') == $k->id ? 'selected':''}}>{{ $k->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('kategori'))
                        <div class="text-danger">
                            {{ $errors->first('kategori')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control @error('inkubator') is-invalid @enderror" name=" inkubator">
                            <option selected="" disabled="">Pilih Inkubator</option>
                            @foreach ($inkubator as $i)
                            <option value="{{ $i->id }}" {{ old('inkubator') == $i->id ? 'selected':''}}>{{ $i->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('inkubator'))
                        <div class="text-danger">
                            {{ $errors->first('inkubator')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">

                        <textarea class="form-control @error('pengumuman') is-invalid @enderror" rows=" 3" placeholder="Pengumuman ...." name="pengumuman" id="pengumuman">{{old('pengumuman')}}</textarea>

                        @if($errors->has('pengumuman'))
                        <div class="text-danger">
                            {{ $errors->first('pengumuman')}}
                        </div>
                        @endif

                    </div>
                    <div class="custom-file">

                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id=" exampleInputFile" name="file" value="{{ old('foto') }}">
                        <label class="custom-file-label" for="exampleInputFile">Choose File</a>

                        </label>

                        @if($errors->has('file'))
                        <div class="text-danger">
                            {{ $errors->first('file')}}
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <a href="/inkubator/pengumuman/"><button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button></a>
                        <button class="btn btn-primary" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
            <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('pengumuman');
            </script>
            @endsection