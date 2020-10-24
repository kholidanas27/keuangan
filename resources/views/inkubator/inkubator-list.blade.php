@extends('layouts.app')
@section('breadcrumb')
<div class="breadcrumb">
	<h1 class="mr-2">Inkubator</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
@endsection
@section('content')
<section class="ul-contact-page">
<div class="row">
	<div class="col-lg-12 col-md-12 mb-4">
		<div class="card">
			<div class="card-body">
			<a href="{{route('admin.inkubator.view','grid')}}">Grid</a>
			<a href="{{route('admin.inkubator.view','list')}}">List</a>
			<button class="btn btn-primary btn-md m-1" type="button" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="i-Add-User text-white mr-2"></i> Add Contact</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 mb-4">
		<div class="card">
			<div class="card-body">	
<table class="display table" id="ul-contact-list" style="width:100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Role</th>
			<th>Age</th>
			<th>Joining Date</th>
			<th>Salary</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/1.jpg')}}" alt="" /> Jhon Wick</div>
				</a></td>
			<td>jhonwick_23@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-primary m-2 p-2" href="#">Developer</a></td>
			<td>20</td>
			<td>April 25, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/2.jpg')}}" alt="" /> James Wann</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-success m-2 p-2" href="#">Programmer</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/3.jpg')}}" alt="" /> Bradley Gunn</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-danger m-2 p-2" href="#">Designer</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/4.jpg')}}" alt="" /> Riki Martin</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-info m-2 p-2" href="#">Backend</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/5.jpg')}}" alt="" /> Zack Snyder</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-warning m-2 p-2" href="#">Backend</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/1.jpg')}}" alt="" /> Jhon Wick</div>
				</a></td>
			<td>jhonwick_23@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-primary m-2 p-2" href="#">Developer</a></td>
			<td>20</td>
			<td>April 25, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/2.jpg')}}" alt="" /> James Wann</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-success m-2 p-2" href="#">Programmer</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/3.jpg')}}" alt="" /> Bradley Gunn</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-danger m-2 p-2" href="#">Designer</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/4.jpg')}}" alt="" /> Riki Martin</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-info m-2 p-2" href="#">Backend</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/5.jpg')}}" alt="" /> Zack Snyder</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-warning m-2 p-2" href="#">Backend</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/1.jpg')}}" alt="" /> Jhon Wick</div>
				</a></td>
			<td>jhonwick_23@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-primary m-2 p-2" href="#">Developer</a></td>
			<td>20</td>
			<td>April 25, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/2.jpg')}}" alt="" /> James Wann</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-success m-2 p-2" href="#">Programmer</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/3.jpg')}}" alt="" /> Bradley Gunn</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-danger m-2 p-2" href="#">Designer</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/4.jpg')}}" alt="" /> Riki Martin</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-info m-2 p-2" href="#">Backend</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
		<tr>
			<td><a href="">
					<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('theme/images/faces/5.jpg')}}" alt="" /> Zack Snyder</div>
				</a></td>
			<td>jameswann@gmail.com</td>
			<td>+88012378478</td>
			<td><a class="badge badge-warning m-2 p-2" href="#">Backend</a></td>
			<td>20</td>
			<td>April 34, 2019</td>
			<td>$320,800</td>
			<td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
		</tr>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
<!-- begin::modal-->
<div class="ul-card-list__modal">
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<form>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label" for="inputName">Name</label>
							<div class="col-sm-10">
								<input class="form-control" id="inputName" type="email" placeholder="Name" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label" for="inputEmail3">Email</label>
							<div class="col-sm-10">
								<input class="form-control" id="inputEmail3" type="email" placeholder="Email" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label" for="">Phone</label>
							<div class="col-sm-10">
								<input class="form-control" type="number" id="" placeholder="number...." />
							</div>
						</div>
						<fieldset class="form-group">
							<div class="row">
								<div class="col-form-label col-sm-2 pt-0">Radios</div>
								<div class="col-sm-10">
									<div class="form-check">
										<input class="form-check-input" id="gridRadios1" type="radio" name="gridRadios" value="option1" checked="" />
										<label class="form-check-label ml-3" for="gridRadios1">First radio</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" id="gridRadios2" type="radio" name="gridRadios" value="option2" />
										<label class="form-check-label ml-3" for="gridRadios2">Second radio</label>
									</div>
									<div class="form-check disabled">
										<input class="form-check-input" id="gridRadios3" type="radio" name="gridRadios" value="option3" disabled="" />
										<label class="form-check-label ml-3" for="gridRadios3">Third disabled radio</label>
									</div>
								</div>
							</div>
						</fieldset>
						<div class="form-group row">
							<div class="col-sm-2">Checkbox</div>
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input" id="gridCheck1" type="checkbox" />
									<label class="form-check-label ml-3" for="gridCheck1">Example checkbox</label>
								</div>
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
        $('#ul-contact-list').DataTable();
    </script>
@endsection