@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="display table" id="ul-contact-list" style="width:100%">
                    <tbody>
                        @foreach($pengumuman as $p)
                        <!-- <iframe src="/img/pengumuman/{{ $p->foto }}" class="dokumen" alt="dokumen" style="width:600px;height:700px;border:none;"></iframe> -->
                        <center>
                            <h3>{{ $p->title }}</h3>
                        </center>
                        <p style="text-align: center;">Diposkan pada {{ date('d F Y', strtotime($p->created_at)) }}
                        </p>
                        <br>
                        <br>
                        <p style="text-align:justify; text-indent: 0.5in;">{!! $p->pengumuman !!}</p>
                        <center><object data="{{ asset('img/pengumuman/'. $p->foto ) }}" width="700" height="500"></object></center>
                        <div style="clear:both;"></div>
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
<!-- <script>
    $('#ul-contact-list').DataTable({
        responsive: true,
        order: [
            [2, 'DESC']
        ]
    });
</script> -->
@endsection