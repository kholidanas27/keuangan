@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('inkubator.update-id', $p->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $p->title }}" placeholder="Title...." name="title">
                        {{ $errors->first('title')}}
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kategori">
                            <option selected="" disabled="">Pilih Kategori</option>
                            @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" {{($p->priority_id == $k->id) ? 'selected' : ''}}>{{ $k->name }}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('kategori')}}
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="inkubator">
                            <option selected="" disabled="">Pilih Inkubator</option>
                            <option value="0"{{($p->inkubator_id == 0) ? 'selected' : ''}}>Umum / Non Tenant</option>
                            @foreach ($inkubator as $i)
                            <option value="{{ $i->id }}" {{($p->inkubator_id == $i->id) ? 'selected' : ''}}>{{ $i->nama }}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('inkubator')}}
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Pengumuman ...." name="pengumuman" id="pengumuman">{{ $p->pengumuman }}</textarea>
                        {{ $errors->first('pengumuman')}}
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">{{$p->foto}}</label>
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" multiple>
                        <object data="/img/pengumuman/{{ $p->foto }}" width="400px"></object>
                        <input type="hidden" class="custom-file-input" id="hidden_image" name="hidden_image" value="{{ $p->foto }}">
                        {{ $errors->first('foto')}}
                    </div>
                    <div class="modal-footer">
                        <a href="/inkubator/pengumuman/"><button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button></a>
                        <button class="btn btn-primary" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- end of main-content -->
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('theme/css/plugins/datatables.min.css')}}" />
@endsection
@section('js')
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/contact-list-table.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/datatables.script.min.js')}}"></script>
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
<script>
    $('#ul-contact-list').DataTable({
        responsive: true,
        order: [
            [2, 'DESC']
        ]
    });
    $(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('pengumuman');
</script>
@endsection