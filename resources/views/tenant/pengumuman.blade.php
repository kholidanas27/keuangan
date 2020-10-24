@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h3>Pengumuman</h3>
            </div>
            <div class="card-body">
                <div class="ul-contact-list">
                    <div class="contact-close-mobile-icon float-right mb-2"><i class="i-Close-Window text-15 font-weight-600"></i></div>
                    <form action="{{ route('tenant.search')}}" method="GET">
                        <input value="{{ Request::get('keyword') }}" name="keyword" class="form-control form-control-rounded col-md-12" id="exampleFormControlInput1" type="text" placeholder="Search Tenant..." />
                    </form>
                    <br>
                    <div class="list-group" id="list-tab" role="tablist"><a class="list-group-item list-group-item-action border-0 {{ set_active('tenant.pengumuman' )}}" id="list-home-list" href="{{ route('tenant.pengumuman')}}" role="tab" aria-controls="home"><i class="nav-icon i-Business-Mens"></i> Semua Pengumuman</a>
                        <a class="list-group-item list-group-item-action border-0 {{ set_active('tenant.non-tenant' )}}" id="list-profile-list" href="{{ route('tenant.non-tenant')}}" role="tab" aria-controls="profile"><i class="nav-icon i-Conference"></i> Non Tenan</a>
                        <label class="text-muted font-weight-600 py-8" for="">MEMBERS INKUBATOR</label>
                        <select class="form-control form-control-rounded">
                            <option>All Inkubator</option>
                            <option></option>
                        </select>
                        </br>
                        @foreach($kategori as $y)
                        <a class="list-group-item list-group-item-action border-0" id="list-profile-list" href="{{ route('tenant.kategori-id', $y->id)}}" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i>{{ $y->name }}</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengumuman as $p)
                        <tr>
                            <td>
                                <a href="{{ route('tenant.show', $p->slug)}}">
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
                        </tr>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    });
</script>
@endsection