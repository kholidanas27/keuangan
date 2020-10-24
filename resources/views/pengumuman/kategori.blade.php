@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
    <strong>Berhasil!</strong> {{session('success')}}
</div>
@elseif(session('update'))
<div class="alert alert-warning" role="alert">
    <strong>Berhasil!</strong> {{session('update')}}
</div>
@elseif(session('delete'))
<div class="alert alert-danger" role="alert">
    <strong>Berhasil!</strong> {{session('delete')}}
</div>
@endif
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h3>Pengumuman</h3>
            </div>
            <div class="card-body">
                <div class="ul-contact-list">
                    <div class="contact-close-mobile-icon float-right mb-2"><i class="i-Close-Window text-15 font-weight-600"></i></div>
                    <!-- modal-->
                    <button class="btn btn-outline-secondary btn-block mb-4" type="button" data-toggle="modal" data-target="#exampleModal" name="create_record" id="create_record">Tambah Pengumuman</button>
                    <!-- end:modal-->
                    <!-- <form action="/inkubator/kategori/search" method="GET">
                        <input value="{{ Request::get('keyword') }}" name="keyword" class="form-control form-control-rounded col-md-12" id="exampleFormControlInput1" type="text" placeholder="Search Tenant..." />
                    </form>
                    <br> -->
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action border-0 {{ set_active('inkubator.pengumuman')}}" id="list-home-list" href="{{ route('inkubator.pengumuman') }}" role="tab" aria-controls="home"><i class="nav-icon i-Business-Mens"></i> Semua Pengumuman</a>
                        <a class="list-group-item list-group-item-action border-0 {{ set_active('inkubator.non-tenant')}}" id="list-profile-list" href="{{ route('inkubator.non-tenant')}}" role="tab" aria-controls="profile"><i class="nav-icon i-Conference"></i> Non Tenan</a>
                        <label class="text-muted font-weight-600 py-8" for="">MEMBERS INKUBATOR</label>
                        <select class="form-control form-control-rounded">
                            <option>All Inkubator</option>
                        </select>
                        </br>
                        <!-- <a class="list-group-item list-group-item-action border-0 {{ set_active('inkubator.kategori')}}" id="list-home-list" href="{{route('inkubator.kategori')}}" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i>All Kategori</a> -->
                        @foreach($kategori as $y)
                        @if( $y->id == 1)
                        <a class="list-group-item list-group-item-action border-0 " id="list-home-list" href="{{ route('inkubator.kategori-id', $y->id )}}" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i>{{ $y->name }}</a>
                        @elseif( $y->id == 2)
                        <a class="list-group-item list-group-item-action border-0 " id="list-home-list" href="{{ route('inkubator.kategori-id', $y->id )}}" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i>{{ $y->name }}</a>
                        @elseif( $y->id == 3)
                        <a class="list-group-item list-group-item-action border-0 " id="list-home-list" href="{{ route('inkubator.kategori-id', $y->id )}}" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i>{{ $y->name }}</a>
                        @else($y->id == 4)
                        <a class="list-group-item list-group-item-action border-0 " id="list-home-list" href="{{ route('inkubator.kategori-id', $y->id )}}" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i>{{ $y->name }}</a>
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <table class="display table" id="ul-contact-list" style="width:100%">
                    <thead>
                        <tr>
                            <th width="65%">Pengumuman</th>
                            <th width="15%">Kategori</th>
                            <th width="15%">Tanggal</th>
                            <th width="15%">Status</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dynamic-row">
                        @foreach($pengumuman as $p)
                        <tr>
                            <td>
                                <a href="{{ route('inkubator.show', $p->slug )}}">
                                    <strong>{{ $p->title }}</strong>
                                    <p>{!! str_limit($p->pengumuman) !!}</p>
                                </a>
                            </td>
                            <td>
                                @if($p->priority_id == 1)
                                <a class="badge badge-success m-2 p-2" href="#">{{ $p->priority->name }}</a>
                                @elseif($p->priority_id == 2)
                                <a class="badge badge-danger m-2 p-2" href="#">{{ $p->priority->name }}</a>
                                @elseif($p->priority_id == 3)
                                <a class="badge badge-primary m-2 p-2" href="#">{{ $p->priority->name }}</a>
                                @else
                                <a class="badge badge-warning m-2 p-2" href="#">{{ $p->priority->name }}</a>
                                @endif
                            </td>
                            <td>{{ date('d F Y', strtotime($p->created_at)) }}</td>
                            <td class="custom-align">
                                <div class="btn-group">
                                    @if($p->publish == 1)
                                    <button class="btn btn-success custom-btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Publish</button>
                                    @else
                                    <button class="btn btn-danger custom-btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Draf</button>
                                    @endif
                                    <div class="dropdown-menu ul-task-manager__dropdown-menu">
                                        @if($p->publish == 1)
                                        <a class="dropdown-item btn btn-danger" href="{{ route('inkubator.status-id', $p->id)}}">Draf</a>
                                        @else
                                        <a class="dropdown-item btn btn-success" href="{{ route('inkubator.status-id', $p->id)}}">Publish</a>
                                        @endif
                                    </div>
                            </td>
                            <td><a class="ul-link-action text-success" data-toggle="tooltip" href="{{ route('inkubator.edit', $p->id)}}" data-placement="top" title="Edit"><i class="i-Edit"></i>
                                    <a class="ul-link-action text-danger mr-1 delete" href="{{ route('inkubator.delete', $p->id)}}" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                        <i class="i-Eraser-2"></i></a>
                            </td>
                        </tr>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- end of main-content -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Tenant</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" id="sample_form" action="{{route('inkubator.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-lable">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Title...." name="title" id="title" value="{{ old('title') }}" />
                        @if($errors->has('title'))
                        <div class="text-danger">
                            {{ $errors->first('title')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Kategori</label>
                        <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
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
                        <label class="control-lable">Inkubator</label>
                        <select class="form-control @error('inkubator') is-invalid @enderror" name=" inkubator" id="inkubator">
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
                        <label class="control-lable">Pengumuman</label>
                        <textarea class="form-control @error('pengumuman') is-invalid @enderror" rows=" 3" placeholder="Pengumuman ...." name="pengumuman" id="pengumuman">{{old('pengumuman')}}</textarea>

                        @if($errors->has('pengumuman'))
                        <div class="text-danger">
                            {{ $errors->first('pengumuman')}}
                        </div>
                        @endif

                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" id="file" value="{{ old('foto') }}">
                        <label class="custom-file-label" for="exampleInputFile">Choose File</a>

                        </label>

                        @if($errors->has('file'))
                        <div class="text-danger">
                            {{ $errors->first('file')}}
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" value="Simpan" class="btn btn-primary" />
                        <a href="/inkubator/pengumuman/"><button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
<link href="{{asset('theme/css/main.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('theme/css/plugins/datatables.min.css')}}" />
<link rel="stylesheet" href="{{asset('theme/css/plugins/sweetalert2.min.css')}}" />
@endsection
@section('js')
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/contact-list-table.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/datatables.script.min.js')}}"></script>
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
<script src="{{asset('theme/js/extention/choices.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="{{asset('theme/js/plugins/sweetalert2.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/sweetalert.script.js')}}"></script>
<script>
    CKEDITOR.replace('pengumuman');
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 1500);

    $('#ul-contact-list').DataTable({
        responsive: true,
        order: [
            [2, 'DESC']
        ]
    });
    $('.delete').on("click", function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Apa Anda Yakin Menghapus ?',
            text: "Anda tidak akan dapat mengembalikan data ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection