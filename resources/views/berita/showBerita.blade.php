@extends('layouts.app')
@section('css')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@endsection
@section('content')

<div class="row">
	<div class="col-xl-8 col-lg-8">
		<div class="card">
			<div class="card-body">
				<small>{{ $berita->created_at->format('d M Y | h:i') }}</small>
				<h1 class="card-title text-danger font-weight-bold">
					{{ $berita->tittle }}
				</h1>
				<small>{{ $berita->profil_user->nama }} - <b>SISKUBIS</b></small>
				<img src="{{ asset('storage/berita/' . $berita->foto) }}" alt="{{ $berita->slug }}" class="w-100" height="350px">
				<p class="text-justify">{!! $berita->berita !!}</p>
			</div>
			<footer>
				<div class="row mb-3 container">
					<div class="col-md-10">
						<button type="button" class="btn btn-sm btn-outline-secondary">Free Themes</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">Bootstrap 3</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">Responsive Web Design</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">HTML5</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">CSS3</button>
					</div>
					<div class="col-md-2">
						@php
						use App\BeritaLike;

						$likeExist = BeritaLike::where('user_id','=', Auth::user()->id)->where('berita_id','=',$berita->id)->first();
						@endphp

						@if($likeExist == null)
							<form id="likeForm" name="likeForm">
							{{-- <form action="{{ route('inkubator.likeBerita') }}" method="post"> --}}
							{{ csrf_field() }}
								<input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
								<input type="text" name="berita_id" value="{{ $berita->id }}" hidden>
								<button class="btn btn-sm btn-outline-primary" id="like" value="create">
	          						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  									<path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
									</svg>
									{{ $total_like }}
								</button>
							</form>
						@else
							<button class="btn btn-sm btn-danger" id="dislike" value="create">
		          				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  									<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
								</svg>
								{{ $total_like }}
							</button>
							</form>
						@endif
					</div>
				</div>
			</footer>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="card-title"><h6>{{ $total_komentar }} Responses</h6></div>
				@forelse($komentar as $row)
				<div class="row">
					<div class="col-md-2">
						<figure>
							<img src="{{asset('assets/images/images2.jpg')}}" style="width: 65px; height: 65px;" class="rounded-circle">
						</figure>
					</div>
					<div class="col-md-10">
						<h5 class="heading">{{ $row->name }}</h5>
						<span><small class="text-mute">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</small></span>
						<p>{{ $row->komentar }}</p>
					</div>
				</div>
				@empty
					<p>Belum Ada Komentar</p>
				@endforelse
				<br><br>
				<form action="{{ route('inkubator.komentarBerita') }}" method="post" class="row">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="id" class="form-control">
					<input type="hidden" name="berita_id" value="{{ $berita->id }}" class="form-control">
					<div class="col-md-12">
						<h3 class="title">Leave Your Response</h3>
					</div>
					<div class="form-group col-md-12" hidden>
						<label for="name">Nama</label>
						<input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
					</div>
					<div class="form-group col-md-12">
						<textarea class="form-control" name="komentar" placeholder="Write your response ..."></textarea>
					</div>
					<div class="form-group col-md-12">
						<button class="btn btn-primary">Send Response</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<div class="col-xl-4 col-lg-4">
<div class="card mb-4">
	<div class="card-body">
		<div class="card-title mb-0">Berita Umum</div>
	</div>
	<div class="ul-widget-app__comments">
		<!--  row-comments -->
		@forelse($umum as $row)
		<div class="ul-widget-app__row-comments">
			<div class="ul-widget-app__profile-pic p-3"><img class="profile-picture avatar-lg" src="{{ asset('storage/berita/' . $row->foto) }}" alt="alt" /></div>
			<div class="ul-widget-app__comment">
				<div class="ul-widget-app__profile-title">
					<a class="ul-widget4__title" href="{{ route('inkubator.showBerita', $row->slug) }}">{{ Str::limit($row->tittle, 40) }}</a>
				</div>
				<div class="ul-widget-app__profile-status">
							@if($row->publish == 1)
								<span class="badge badge-pill badge-success p-1 mr-2">Publish</span>
							@else
								<span class="badge badge-pill badge-danger p-1 mr-2">Draft</span>
							@endif
					<span class="ul-widget-app__icons">
						<a href="href"><i class="i-Approved-Window text-mute"></i></a>
						<a href="href"><i class="i-Like text-mute"></i></a>
						<a href="href"><i class="i-Heart1 text-mute"></i></a>
					</span>
					<span class="text-mute">{{ $row->created_at->format('d, M Y') }}</span>
				</div>
			</div>
		</div>
		@empty
			<p class="text-center">Tidak Ada Berita Umum</p>
		@endforelse
		</div>
		<ul class="pagination justify-content-center">
			<li class="page-item"></li>
		</ul>
	</div>
</div>
</div>
@endsection
@section('js')

	<script type="text/javascript">

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#like').click(function (e) {
                e.preventDefault();

                var _token      = $("input[name='_token']").val();
                var berita_id   = $("input[name='berita_id']").val();
                var user_id     = $("input[name='user_id']").val();

                $(this).html('Liked');
                $(this).prop('disabled', true);
                $(this).css({"background-color": "#dc3545", "border-color": "#dc3545", "color": "white", "opacity": "100%"})
                $.ajax({
                    data: $('#likeForm').serialize(),
                    url: "{{ route('inkubator.likeBerita') }}",
                    type: "POST",
                    dataType: 'json'
                });
            });
        });

    </script>

@endsection
