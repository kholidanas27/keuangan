<!DOCTYPE html>
<html lang="en" dir="">

<head>

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Dashboard SISKUBIS</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
	<link href="{{ asset('theme/css/themes/lite-purple.css')}}" rel="stylesheet" />
	<link href="{{ asset('theme/css/plugins/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('theme/css/plugins/fontawesome-5.css')}}" />
    <link href="{{ asset('theme/css/plugins/metisMenu.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/toastr.min.css') }}" />
	@yield('css')
	@livewireStyles
</head>

<body class="text-left">
	@guest
	<div class="app-admin-wrap">
		@else
		<div class="app-admin-wrap layout-sidebar-vertical sidebar-full">
			@role('admin')
			@include('admin.sidebar.sidebar')
			@endrole
			@role('inkubator')
			@include('inkubator.sidebar.sidebar')
			@endrole
			@role('mentor')
			@include('mentor.sidebar.sidebar')
			@endrole
			@role('tenant')
			@include('tenant.sidebar.sidebar')
			@endrole
			@role('user')
			@include('user.sidebar.sidebar')
			@endrole
			@endguest
			<div class="switch-overlay" style="display:none"></div>
			<div class="main-content-wrap mobile-menu-content bg-off-white m-0">
				@auth
				@role('admin')
				@include('admin.header.header')
				@endrole
				@role('inkubator')
				@include('inkubator.header.header')
				@endrole
				@role('mentor')
				@include('mentor.header.header')
				@endrole
				@role('tenant')
				@include('tenant.header.header')
				@endrole
				@role('user')
				@include('user.header.header')
				@endrole
				@endauth
				<!-- ============ Body content start ============= -->
				<div class="main-content pt-4">
					@yield('breadcrumb')
					@yield('content')
				</div>
				<div class="sidebar-overlay open"></div><!-- Footer Start -->
				@include('layouts.footer')
				<!-- fotter end -->
			</div>
		</div>
		<script src="{{ asset('theme/js/plugins/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ asset('theme/js/plugins/bootstrap.bundle.min.js')}}"></script>
		<script src="{{ asset('theme/js/plugins/perfect-scrollbar.min.js')}}"></script>
		<script src="{{ asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
		<script src="{{ asset('theme/js/scripts/script.min.js')}}"></script>
		<script src="{{ asset('theme/js/scripts/script_2.min.js')}}"></script>
		<script src="{{ asset('theme/js/scripts/sidebar.large.script.min.js')}}"></script>
		<script src="{{ asset('theme/js/plugins/feather.min.js')}}"></script>
		<script src="{{ asset('theme/js/plugins/metisMenu.min.js')}}"></script>
        <script src="{{ asset('theme/js/scripts/layout-sidebar-vertical.min.js')}}"></script>
        <script src="{{ asset('theme/js/plugins/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('theme/js/plugins/sweetalert2.script.min.js') }}"></script>
        <script src="{{ asset('theme/js/plugins/toastr.min.js') }}"></script>
        <script src="{{ asset('theme/js/script/toastr.script.min.js') }}"></script>
		@yield('js')

		<script>
			$('.switch-overlay').on('click', function() {
				$(this).hide();
			});
			$(document).on('click', '.menu-toggle', function() {
				$('.switch-overlay').show();
			});
		</script>
		@livewireScripts
</body>

</html>

