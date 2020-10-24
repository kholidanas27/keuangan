@extends('layouts.app')

@section('content')

<div class="main-content pt-4">
    <div class="breadcrumb">
        <h1>Persuratan</h1>
        <ul>
            <li><a href="href">Detail</a></li>
            <li>Persuratan</li>
        </ul>
    </div>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
            @foreach($surat as $p)

            <div class="col-6">
                <h4>Dari</h4>
                    <p>{{ $p->dari }}</p>
            </div>
        
            <div class="col-6">
                <h4>Kepada</h4>
                
                    <p>{{ $p->email}}</p>
            </div>
            <div class="col-6">
              <h4> Judul</h4>
              <p>{{ $p->title }}</p>
            </div>
            <div class="col-6">
            <a class="btn btn-primary" href="{{ url('/inkubator/disposisi/'. $p->id )}}" role="button">Disposisi</a>

            </div>
            <div class="col-12">
                <h4>Perihal</h4>
                    <p>{!! $p->perihal !!}</p>
            </div>

            <div class="col-12">
                <h4>Dokumen</h4>
                    <iframe src="/file/dokumen/{{ $p->dokumen }}" class="dokumen" alt="dokumen" style="width:100%;height:1200px;border:none;"></iframe>
            </div>
              @endforeach
            </div>
          </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
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
        $('#masuk').DataTable({
			responsive:true,
		});
		
		$('#keluar').DataTable({
			responsive:true,
		});
    </script>
    <script>
        $("#file").change(function(){
        $("#custom-file-label").text(this.files[0].name);
      }); 
    </script>
@endsection