@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-12 ">
	<div class="card text-left">
		<div class="card-body">
			<ul class="nav nav-tabs" id="myIconTab" role="tablist">
			<h3 class="" style="margin: 0 20px 0px 0px;padding: 5px;">Surat Masuk</h3>
			</ul>
				<a href="{{ url('/mentor/buatsurat')}}"><li  class="btn btn-danger btn-sm mt-2" width="10%" >Buat Surat</li></a>
			<div class="tab-content" id="myIconTabContent" style="padding: 1rem 0 !important; ">
				<div class="tab-pane fade show active" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
					<table class="display table" id="masuk" style="width:100%">
						<thead>
							<tr>
							<th width="65%">Surat</th>
							<th width="15%">Kategori</th>
							<th width="15%">Tanggal</th>
							<th width="5%">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($disposisi as $d)
						@if ( $d->inkubator_id == Auth::user()->inkubator_id )
							@if ( $d->user_id == Auth::user()->id )
							
							<tr>
								<td>
								<a href="{{ url('/mentor/suratmasuk/'.$d->surat->id)}}">
										<strong>{{ $d->surat->title }}</strong>
										<p>{!! str_limit($d->surat->perihal, $limit = 80, $end = '') !!}</p>
								</a>
								</td>
								<td>
								@if ($d->surat->priority_id == 1)
								<a class="badge badge-primary m-2 p-2" href="#">{{ $d->surat->priority->name }}</a></td>

								@elseif ($d->surat->priority_id == 2)
								<a class="badge badge-warning m-2 p-2" href="#">{{ $d->surat->priority->name }}</a></td>
								@elseif ($d->surat->priority_id == 3)
								<a class="badge badge-danger m-2 p-2" href="#">{{ $d->surat->priority->name }}</a></td>
								@else 
								<a class="badge badge-success m-2 p-2" href="#">{{ $d->surat->priority->name }}</a></td>
								@endif
								<td>{{ $d->surat->created_at }}</td>
								<td><a class="ul-link-action text-danger mr-1 delete"  data-toggle="tooltip" data-placement="top" disposisi-id="{{ $d->id }}" title="Want To Delete !!!"><i class="i-Eraser-2" ></i></a></td>
							</tr>
							
							@endif
						@endif
						@endforeach
						@foreach($surat as $s)
							
							<tr>
								<td>
								<a href="{{ url('/mentor/suratmasuk/'.$s->id )}}">
										<strong>{{ $s->title}}</strong>
										<p>{!! str_limit($s->perihal, $limit = 80, $end = '') !!}</p>
								</a>
								</td>
								<td>
								@if ($s->priority_id == 1)
								<a class="badge badge-primary m-2 p-2" href="#">{{ $s->priority->name }}</a></td>

								@elseif ($s->priority_id == 2)
								<a class="badge badge-warning m-2 p-2" href="#">{{ $s->priority->name }}</a></td>
								@elseif ($s->priority_id == 3)
								<a class="badge badge-danger m-2 p-2" href="#">{{ $s->priority->name }}</a></td>
								@else 
								<a class="badge badge-success m-2 p-2" href="#">{{ $s->priority->name }}</a></td>
								@endif
								<td>{{ $s->created_at }}</td>
								<td><a class="ul-link-action text-success" href="{{ url('/mentor/surat/edit/'. $s->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1 hapus"  data-toggle="tooltip" data-placement="top" persuratan-id="{{ $s->id }}" title="Want To Delete !!!"><i class="i-Eraser-2" ></i></a></td>
							</tr>
							
						@endforeach
						</tbody>
					</table>
				</div>
				
				<div class="tab-pane fade" id="contactIcon" role="tabpanel" aria-labelledby="contact-icon-tab">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore.</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('theme/css/plugins/datatables.min.css')}}" />
	<!-- Asset Alert iziToast -->
	<link rel="stylesheet" href="{{asset('izitoast/dist/css/iziToast.min.css')}}">
@endsection
@section('js')
	<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('theme/js/scripts/contact-list-table.min.js')}}"></script>
    <script src="{{asset('theme/js/scripts/datatables.script.min.js')}}"></script>
	<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
	<!-- Asset Alert iziToast -->
	<script src="{{asset('izitoast/dist/js/iziToast.min.js')}}" type="text/javascript"></script>

    <script>
        $('#masuk').DataTable({
			responsive:true,
		});
		
		$('#keluar').DataTable({
			responsive:true,
		});
    </script>
	<!-- Alert iziToast -->
	<script type="text/javascript">
		$('.delete').click(function(){

			var disposisi_id = $(this).attr('disposisi-id');

			// alert(disposisi_id);

			iziToast.question({
			timeout: 20000,
			close: false,
			overlay: true,
			displayMode: 'once',
			id: 'question',
			zindex: 999,
			title: 'Hey',
			message: 'Anda yakin ingin hapus surat ini?',
			// position: 'bottomRight',bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
			position: 'topCenter',
			buttons: [
				['<button><b>YES</b></button>', function (instance, toast) {
		
					instance.hide({ transitionOut: 'fadeOut' }, toast, 'button', window.location = "/mentor/surat/"+ disposisi_id +"/hapus");
		
				}, true],
				['<button>NO</button>', function (instance, toast) {
		
					instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
		
				}],
			]
			});
		});
		
    </script>
	<script type="text/javascript">
		$('.hapus').click(function(){

			var surat_id = $(this).attr('persuratan-id');

			// alert(disposisi_id);

			iziToast.question({
			timeout: 20000,
			close: false,
			overlay: true,
			displayMode: 'once',
			id: 'question',
			zindex: 999,
			title: 'Hey',
			message: 'Anda yakin ingin hapus surat ini?',
			// position: 'bottomRight',bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
			position: 'topCenter',
			buttons: [
				['<button><b>YES</b></button>', function (instance, toast) {
		
					instance.hide({ transitionOut: 'fadeOut' }, toast, 'button', window.location = "/mentor/surat/"+surat_id+"/delete");
		
				}, true],
				['<button>NO</button>', function (instance, toast) {
		
					instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
		
				}],
			]
			});
		});
		
    </script>
	<script>
		@if(Session::has('success'))

			iziToast.success({
				title: 'OK',
				message: '{{ session('success') }}',
				position: 'topRight',
				transitionIn: 'fadeInUp',
			});
		@endif	
	</script>
@endsection