@extends('layouts.app')
@section('css')
<link href="{{ asset('theme/css/plugins/toastr.css')}}" rel="stylesheet" />
<style>
	.item-divider {
		height: 0;
		margin: 0.5rem 0.5rem;
		overflow: hidden;
		border-left: 1px solid #979b9e;
		border-right: 1px
	}
</style>
@endsection
@section('content')
<section class="ul-contact-page">
<div class="row">
	<div class="col-lg-12 col-md-12 mb-4">
		<div class="card">
			<div class="card-body ">
				<strong>Pendamping</strong>
			@role('inkubator')		
			<a href="{{route('inkubator.mentor')}}">Grid</a>
			<a class="item-divider"></a>
			<a href="{{ route('inkubator.mentor-list') }}">List</a>
			<button class="btn btn-primary btn-md m-1 float-right" type="button" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="i-Add-User text-white mr-2"></i> Tambah Pendamping</button>
			@endrole
			@role('tenant')		
			<a href="{{route('tenant.mentor')}}">Grid</a>
			<a class="item-divider"></a>
			<a href="{{ route('tenant.mentor-list') }}">List</a>
			@endrole
			</div>
		</div>
	</div>
</div>
<div class="row">
@foreach($data as $data)
	<div class="col-lg-4 col-xl-4 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="ul-contact-page__profile">
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('img/mentor/profile/'.$data->foto)}}" alt="{{ $data->nama ?? '-'  }}" /></div>
					<div class="ul-contact-page__info">
						@role('inkubator')
						<a href="{{route('inkubator.profile-detail',$data->uid)}}"><p class="m-0 text-24">{{$data->nama}}</p></a>
						@endrole
						@role('tenant')
						<a href="{{route('tenant.profile-detail',$data->uid)}}"><p class="m-0 text-24">{{$data->nama}}</p></a>
						@endrole
						<p class="text-muted m-0">{{$data->kontak}}</p>
						<p class="text-muted mt-3">{{$data->alamat}}</p>
						<p class="text-muted mt-3">NO: {{$data->id}}</p>
					</div>
				</div>
			</div>
			@role('inkubator')
			<div class="card-footer">
				<a class="btn btn-sm btn-success float-right adduser" type="submit" data-toggle="modal" data-id="{{ $data->uid }}" data-name="{{ $data->nama }}" data-target=".bd-contoh-modal-lg"><i class="i-Add-User text-white mr-2"></i><span class="text-white">Jadikan Pendamping</span> </a>
			</div>
			@endrole
		</div>
	</div>
@endforeach
</div>
</section>
@role('inkubator')
	<!-- begin::modal-->
	<div class="ul-card-list__modal">
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
					<h2>Tambah Pendamping</h2>
						<form action="{{ route('inkubator.regis') }}" method="POST">
							@csrf
							<div class="form-group">
								<label>Email</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							</div>
							<div class="form-group">
								<label>Password</label>
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							</div>
							<div class="form-group">
								<label class="fw">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>									
							<div class="form-group row">
								<div class="col-sm-10 float-right">
									<button class="btn btn-success" type="submit">Tambah Pendamping</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end::modal-->
	<div class="ul-card-list__modal">
		<div class="modal fade bd-contoh-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
					<h2>Tambah Pendamping</h2>
						<form action="{{ route('inkubator.mentor.tenant') }}" method="POST">
							@csrf	
							<div class="row">
								<div class="form-group col-md-6">
									<label for="mentpr">Mentor</label>
									<input class="form-control" name="nama" id="nama" disabled>
									</div>
									<input class="form-control" name="user_id" id="user_id" type="hidden">
									<div class="form-group col-md-6">
									<label for="publish">Tenant</label>
									<select name="tenant_id" class="form-control" id="tenant_id">
										@foreach ($tenant as $item)
										<option value="{{ $item->id }}" >{{ $item->title }}</option>
										@endforeach
									</select>
									</div>
								</div>
							<div class="form-group row">
								<div class="col-sm-10 float-right">
									<button class="btn btn-success" type="submit">Tambah Pendamping</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end::modal-->
@endrole
@endsection

@section('js')
<script src="{{ asset('theme/js/plugins/toastr.min.js')}}"></script>
<script src="{{ asset('theme/js/script/toastr.script.min.js')}}"></script>

<script>

	
	$('.adduser').click(function() {
		var id = $(this).data('id');      
		var nama = $(this).data('name');
		  

		$('#user_id').val(id);  
		$('#nama').val(nama);  
		} );
		


	toastr.options = {
        "debug": false,
        //   "positionClass": "toast-bottom-full-width",
        "onclick": null,
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "timeOut": 2000,
        "extendedTimeOut": 1000
    }

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
@endsection