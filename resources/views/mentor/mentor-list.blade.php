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

    .dataTables_filter {
                float: right !important;
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
	<div class="col-lg-12 col-md-12 mb-4">
		<div class="card">
			<div class="card-body table-responsive">	
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
                    @foreach($data as $data)
                        <tr>
                            <td>
                                @role('inkubator')
                                <a href="{{route('inkubator.profile-detail',$data->uid)}}">
                                    <div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('img/mentor/profile/'.$data->foto)}}" alt="Profil" />{{$data->nama}}</div>
                                </a>
                                @endrole
                                @role('tenant')
                                <a href="{{route('tenant.profile-detail',$data->uid)}}">
                                    <div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('img/mentor/profile/'.$data->foto)}}" alt="Profil" />{{$data->nama}}</div>
                                </a>
                                @endrole
                            </td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->kontak }}</td>
                            <td><a class="badge badge-primary m-2 p-2" href="#">Developer</a></td>
                            <td>20</td>
                            <td>{{ $data->created_at->format("d M Y") }}</td>
                            <td>$320,800</td>
                            <td><a class="ul-link-action text-success" href="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1" href="" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a></td>
                        </tr>
                    @endforeach
	                </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/datatables.script.min.js')}}"></script>    
    <script>
        $('#ul-contact-list').DataTable(
            {
                "scrollX": true
            }
        );
 
    </script>
@endsection