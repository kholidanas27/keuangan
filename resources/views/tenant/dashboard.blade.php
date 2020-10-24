@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumb">
	<h1 class="mr-2">User Management</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
@endsection
@section('content')
   <div class="row">
   <div class="col-md-3">
	<div class="card">
		<div class="card-body">
			<div class="ul-contact-list">
				<div class="contact-close-mobile-icon float-right mb-2"><i class="i-Close-Window text-15 font-weight-600"></i></div>
				<!-- modal-->
				<button class="btn btn-outline-secondary btn-block mb-4" type="button" data-toggle="modal" data-target="#exampleModal">ADD USER</button>
				<!-- end:modal-->
				<input class="form-control form-control-rounded col-md-12" id="exampleFormControlInput1" type="text" placeholder="Search User..." />
				<br>
				<div class="list-group" id="list-tab" role="tablist"><a class="list-group-item list-group-item-action border-0 active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="nav-icon i-Business-Mens"></i>All User</a>
				<a class="list-group-item list-group-item-action border-0" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="nav-icon i-Conference"></i> Non Members</a>
				<label class="text-muted font-weight-600 py-8" for="">MEMBERS INKUBATOR</label>
					<select class="form-control form-control-rounded"><option>All Inkubator</option><option></option></select>
					</br>
					<a class="list-group-item list-group-item-action border-0" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i> Inkubator</a>
					<a class="list-group-item list-group-item-action border-0" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="nav-icon i-Arrow-Next"></i> Mentor</a>
					<a class="list-group-item list-group-item-action border-0" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="nav-icon i-Arrow-Next"></i> Tenant</a>
				</div>
			</div>
			<div class="ul-contact-list">
				<div class="contact-close-mobile-icon float-right mb-2"><i class="i-Close-Window text-15 font-weight-600"></i></div>
				<!-- modal-->
				<input class="form-control form-control-rounded col-md-12" id="exampleFormControlInput1" type="text" placeholder="Search User..." />
				<br>
				<div class="list-group" id="list-tab" role="tablist"><a class="list-group-item list-group-item-action border-0 active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="nav-icon i-Business-Mens"></i>All User</a>
				<label class="text-muted font-weight-600 py-8" for="">MEMBERS INKUBATOR</label>
					<a class="list-group-item list-group-item-action border-0" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="nav-icon i-Arrow-Next"></i> Inkubator</a>
					<a class="list-group-item list-group-item-action border-0" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="nav-icon i-Arrow-Next"></i> Mentor</a>
					<a class="list-group-item list-group-item-action border-0" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="nav-icon i-Arrow-Next"></i> Tenant</a>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/1.jpg" alt="" /> Jhon Wick</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/2.jpg" alt="" /> James Wann</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/3.jpg" alt="" /> Bradley Gunn</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/4.jpg" alt="" /> Riki Martin</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/5.jpg" alt="" /> Zack Snyder</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/1.jpg" alt="" /> Jhon Wick</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/2.jpg" alt="" /> James Wann</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/3.jpg" alt="" /> Bradley Gunn</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/4.jpg" alt="" /> Riki Martin</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/5.jpg" alt="" /> Zack Snyder</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/1.jpg" alt="" /> Jhon Wick</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/2.jpg" alt="" /> James Wann</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/3.jpg" alt="" /> Bradley Gunn</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/4.jpg" alt="" /> Riki Martin</div>
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
									<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="../../dist-assets/images/faces/5.jpg" alt="" /> Zack Snyder</div>
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
</div><!-- end of main-content -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New User</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<input class="form-control" type="text" placeholder="Name...." />
					</div>
					<div class="form-group">
						<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email...." />
					</div>
					<div class="form-group">
						<input class="form-control" id="exampleInputPassword1" type="text" placeholder="phone...." />
					</div>
					<div class="form-group">
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="notes...."></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
				<button class="btn btn-primary" type="button">
					Save
					changes
				</button>
			</div>
		</div>
	</div>
</div>
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
			responsive:true
		});
    </script>
@endsection