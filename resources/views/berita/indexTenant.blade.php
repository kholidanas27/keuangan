@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-xl-8 col-lg-8">
<div class="card">
<div class="card-header container-fluid">
  {{-- <div class="row">
	<div class="col-md-7">
	  <h3>Berita</h3>
    </div>
    <div class="col-md-3">
        <a href="{{ route('inkubator.kategori.create') }}"><button class="btn btn-primary custom-btn btn-sm ml-5">+ Tambah Kategori</button></a>
    </div>
	<div class="col-md-2">
	  <a href="{{ route('inkubator.formBerita') }}"><button class="btn btn-primary custom-btn btn-sm">+ Tambah Berita</button></a>
	</div>
  </div> --}}
</div>
<div class="card-body">

<div class="row row-xs">
	<div class="col-md-4">
        <form action="{{ route('tenant.cariberita') }}" method="get" name="s" >
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="search" placeholder="Search...">
        </div>
	</div>
	<div class="col-md-4 mt-3 mt-md-0">
            <input class="form-control" type="date" name="tgl" placeholder="Tanggal">
    </div>
	<div class="col-md-2 mt-3 mt-md-0">
	 <div class="btn-group">
        <select name="status" class="btn btn-danger btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <option value="3">All</option>
            <option value="1">Publish</option>
            <option value="0">Draft</option>
        </select>
	  </div>
	</div>
	<div class="col-md-2 mt-3 mt-md-0">
		<button type="submit" class="btn btn-primary btn-block">Search</button>
	</div>
</form>
</div>
  <hr>
	<div class="ul-widget__body">
	<div class="ul-widget5">
		@foreach ($berita as $b)
		<div class="ul-widget5__item">
			<div class="ul-widget5__content">
				<div class="ul-widget5__pic"><img src="{{ asset('storage/berita/' . $b->foto) }}" alt="Third slide" /></div>
				<div class="ul-widget5__section">
					<a class="ul-widget4__title" href="{{ route('tenant.showBerita', $b->slug) }}">{{ Str::limit($b->tittle, 40) }}</a>
					<p class="ul-widget5__desc">{!! Str::limit($b->berita, 47) !!}</p>
					<div class="ul-widget5__info">
						<span>Status : </span>
							@if($b->publish == 1)
								<span class="badge badge-pill badge-success p-1 mr-2">Publish</span>
							@else
								<span class="badge badge-pill badge-danger p-1 mr-2">Draft</span>
							@endif
						<span>Author : </span><span class="text-primary">{{ $b->profil_user->nama }}</span><br>
						<span>Released : </span><span class="text-primary">{{ $b->created_at->format('d, M Y') }}</span>
					</div>
				</div>
			</div>
			<div class="ul-widget5__content">
				<div class="ul-widget5__stats">
					<span class="ul-widget5__sales">{{ $b->views }} <i class="i-Eye"></i></span>
					<span class="ul-widget5__sales">
						@php
							$total_komentar = DB::table('berita_komentar')->where('berita_id',$b->id)->count();
						@endphp
						{{ $total_komentar }}
						<i class="i-Speach-Bubble-3"></i>
					</span>
				</div>
				<div class="ul-widget5__stats"><span class="ul-widget5__number">
				{{-- <form action="{{ route('inkubator.destroyBerita', $b->id) }}" method="post">
                	@csrf
                	<input type="hidden" name="_method" value="DELETE">
					<a class="ul-link-action text-success" href="{{ route('inkubator.editBerita', $b->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="i-Edit"></i></a>
					<button type="submit" class="btn btn-link ul-link-action text-danger mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Want To Delete !!!"><i class="i-Eraser-2"></i></button>
				</form> --}}
				</span></div>
			</div>
		</div>
		@endforeach
	</div>

	<ul class="pagination justify-content-center">
		<li class="page-item">{{ $berita->links() }}</li>
	</ul>

	</div>
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
					<a class="ul-widget4__title" href="{{ route('tenant.showBerita', $row->slug) }}">{{ Str::limit($row->tittle, 40) }}</a>
				</div>
				<div class="ul-widget-app__profile-status">
					@if($row->publish == 1)
						<span class="badge badge-pill badge-success p-1 mr-2">Publish</span>
					@else
						<span class="badge badge-pill badge-danger p-1 mr-2">Draft</span>
					@endif
					<span class="text-mute">{{ $row->created_at->format('d, M Y') }}</span>
				</div>
			</div>
		</div>
		@empty
			<p class="text-center">Tidak Ada Berita Umum</p>
		@endforelse
		</div>
		<ul class="pagination justify-content-center">
			<li class="page-item">{{ $berita->links() }}</li>
		</ul>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="card-title mb-0">Recent Comments</div>
		</div>
		<div class="ul-widget-app__comments">
			@foreach ($hasil as $li)
			<div class="ul-widget-app__row-comments">
				<div class="ul-widget-app__profile-pic p-1"><img class="profile-picture avatar-md mb-2 rounded-circle" src="{{ asset('assets/images/images2.jpg')}}" alt="alt" /></div>
				<div class="ul-widget-app__comment">
					<div class="ul-widget-app__profile-title">
						<h6 class="heading">{{ $li->name}}</h6>
						<p class="mb-2">{{ $li->komentar}}</p>
					</div>
					<div class="ul-widget-app__profile-status">
					<span class="ul-widget-app__icons">
					<!-- <a href="inkubator/berita/destroy/{{ $li->id }}" class="badge badge-pill badge-danger p-2 m-1">Delete</a> -->
					</span>
					<span class="text-mute">{{ \Carbon\Carbon::parse($li->created_at)->diffForHumans() }}</span>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
</div>
@endsection
