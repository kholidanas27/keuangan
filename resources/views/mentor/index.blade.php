@extends('layouts.app')
@section('content')
<section class="ul-contact-page">
<div class="row">
	<div class="col-lg-12 col-md-12 mb-4">
		<div class="card">
			<div class="card-body">
				<strong>Pendamping</strong>
			<a href="{{route('admin.inkubator.view','grid')}}">Grid</a>
			<a href="{{route('admin.inkubator.view','list')}}">List</a>
			<button class="btn btn-primary btn-md m-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="i-Add-User text-white mr-2"></i> Tambah Pendamping</button>
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
					<div class="user-profile"><img class="profile-picture mb-2" src="{{ asset('theme/images/faces/'.$data->foto)}}" alt="alt" /></div>
					<div class="ul-contact-page__info">
						<a href="{{route('inkubator.profile-detail',$data->uid)}}"><p class="m-0 text-24">{{$data->nama}}</p></a>
						<p class="text-muted m-0">{{$data->kontak}}</p>
						<p class="text-muted mt-3">{{$data->alamat}}</p>
						<p class="text-muted mt-3">NO: {{$data->id}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>
</section>
<!-- begin::modal-->
			<div class="ul-card-list__modal">
				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body">
							<h2>Tambah Pendamping</h2>
								<form>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="inputName">Name</label>
										<div class="col-sm-10">
											<input class="form-control" id="inputName" type="name" placeholder="Name" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="inputName">Username</label>
										<div class="col-sm-10">
											<input class="form-control" id="inputName" type="text" placeholder="Userame" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="inputEmail3">Email</label>
										<div class="col-sm-10">
											<input class="form-control" id="inputEmail3" type="email" placeholder="Email" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="password">Password</label>
										<div class="col-sm-10">
											<input class="form-control" id="password" type="password" placeholder="Password" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="confirm_password">Confirm Password</label>
										<div class="col-sm-10">
											<input class="form-control" id="confirm_password" type="password" placeholder="Confirm Password" />
										</div>
									</div>
									
									
									<div class="form-group row">
										<div class="col-sm-10">
											<button class="btn btn-success" type="submit">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end::modal-->
@endsection