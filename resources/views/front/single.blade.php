@extends('layouts.front')
@section('content')
		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-4 sidebar" id="sidebar">
						<aside>
							<div class="aside-body">
								<figure class="ads">
									<img src="{{asset('assets/images/ad.png')}}">
									<figcaption>Advertisement</figcaption>
								</figure>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">Recent Post</h1>
							<div class="aside-body">
								@foreach($recent as $row)
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="#">
												<img src="{{ asset('storage/berita/' . $row->foto) }}">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="{{ route('single', $row->slug) }}">{{ $row->tittle }}</a></h1>
											<div class="detail">
												<div class="category"><a href="#">{{ $row->beritaCategory->category }}</a></div>
												<div class="time">{{ $row->created_at->format('M d, Y') }}</div>
											</div>
										</div>
									</div>
								</article>
								@endforeach

							</div>
						</aside>
						<aside>
							<div class="aside-body">
								<form class="newsletter">
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" class="form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
						</aside>
					</div>
					<div class="col-md-8">
						<ol class="breadcrumb">
						  <li><a href="#">Home</a></li>
						  <li class="active">{{ $berita->beritaCategory->category }}</li>
						</ol>
						<article class="article main-article">
							<header>
								<h1>{{ $berita->tittle }}</h1>
								<ul class="details">
									<li>Posted on {{ $berita->created_at->format('d M, Y') }}</li>
									<li><a>{{ $berita->beritaCategory->category }}</a></li>
									<li>By <a href="#">{{ $berita->profil_user->nama }}</a></li>
								</ul>
							</header>
							<div class="main">
								<div class="featured">
									<figure>
										<img src="{{ asset('storage/berita/' . $berita->foto) }}">
										<figcaption>Image by siskubis.com</figcaption>
									</figure>
								</div>
								{!! $berita->berita !!}
							</div>
							<footer>
								<div class="col-md-10">
									@php
									use App\kategori;
									$tagsNews = kategori::orderBy('category')->get();
									@endphp
									<ul class="tags">
										@foreach($tagsNews as $row)
										<li><a href="{{ route('front.tag') }}">{{ $row->category }}</a></li>
										@endforeach
									</ul>
								</div>
								<div class="col">
									@php
										use App\BeritaLike;

										$total_like = DB::table('berita_like')->where('berita_id',$row->id)->count();
										$likeExist = BeritaLike::where('user_id','=', Auth::user()->id ?? '')->where('berita_id','=',$berita->id)->first();
									@endphp

						@if($likeExist == null)
							<form action="{{ route('single.likeBerita') }}" method="post">
							{{ csrf_field() }}
								<input type="text" name="user_id" value="{{ Auth::user()->id ?? '' }}" hidden>
								<input type="text" name="berita_id" value="{{ $berita->id }}" hidden>
								<button class="btn btn-sm btn-outline-primary" id="like" value="create">
									<i class="ion-android-favorite-outline"></i>{{ $total_like }}
	          						<!-- <i class="ion-android-favorite-outline"></i> <div>{{ $total_like }}</div> -->
								</button>
							</form>
						@else
							<button class="btn btn-sm btn-danger" id="dislike" value="create">
		      					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  									<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
								</svg>
								{{ $total_like }}
							</button>
						@endif
								</div>
							</footer>
						</article>
						<div class="sharing">
						<div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
							<ul class="social">
								<li>
									<a href="#" class="facebook">
										<i class="ion-social-facebook"></i> Facebook
									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<i class="ion-social-twitter"></i> Twitter
									</a>
								</li>
								<li>
									<a href="#" class="googleplus">
										<i class="ion-social-googleplus"></i> Google+
									</a>
								</li>
								<li>
									<a href="#" class="linkedin">
										<i class="ion-social-linkedin"></i> Linkedin
									</a>
								</li>
								<li>
									<a href="#" class="skype">
										<i class="ion-ios-email-outline"></i> Email
									</a>
								</li>
								<li class="count">
									20
									<div>Shares</div>
								</li>
							</ul>
						</div>
						<div class="line">
							<div>Author</div>
						</div>
						<div class="author">
							<figure>
								<img src="{{asset('assets/images/img01.jpg')}}">
							</figure>
							<div class="details">
								<div class="job">Web Developer</div>
								<h3 class="name">{{ $berita->profil_user->nama}}</h3>
								<p>{{ $berita->profil_user->deskripsi }}</p>

								<ul class="social trp sm">
									<li>
										<a href="#" class="facebook">
											<svg><rect/></svg>
											<i class="ion-social-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<svg><rect/></svg>
											<i class="ion-social-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#" class="youtube">
											<svg><rect/></svg>
											<i class="ion-social-youtube"></i>
										</a>
									</li>
									<li>
										<a href="#" class="googleplus">
											<svg><rect/></svg>
											<i class="ion-social-googleplus"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="line"><div>You May Also Like</div></div>
						<div class="row">

							@forelse($recommend as $row)

							<article class="article related col-md-6 col-sm-6 col-xs-12">
								<div class="inner">
									<figure>
										<a href="#">
											<img src="{{ asset('storage/berita/' . $row->foto) }}">
										</a>
									</figure>
									<div class="padding">
										<h2><a href="{{ route('single', $row->slug) }}">{{ $row->tittle }}</a></h2>
										<div class="detail">
											<div class="category"><a href="#">{{ $row->beritaCategory->category }}</a></div>
											<div class="time">{{ $row->created_at->format('M d, Y') }}</div>
										</div>
									</div>
								</div>
							</article>
							@empty
								<p>Belum ada berita terkait kategori ini</p>
							@endforelse
						</div>
						<!--komentar-->
						<div class="line thin"></div>
						<div class="comments">
							<h2 class="title">{{ $total_komentar }} Responses</h2>
							<div class="comment-list">						
								@foreach ($komentar as $row)
								<div class="item">
									<div class="user">
										<figure>
											<img src="{{asset('assets/images/images2.jpg')}}">
										</figure>
										<div class="details">
											<h4 class="name">{{ $row->name}}</h4>
											<span class="time">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
											<div class="description"><p>{{ $row->komentar}}</p></div>
									</div>
									</div>
								</div>
								@endforeach
							</div>
							<form action="{{ route('single.komentarBerita') }}" method="post" class="row">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="id" class="form-control">
								<input type="hidden" name="berita_id" value="{{ $berita->id }}" class="form-control">
								<div class="col-md-12">
									<h3 class="title">Leave Your Response</h3>
								</div>
								<div class="form-group col-md-12" hidden>
									<label for="name">Nama</label>
									<input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name ?? '' }}">
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
			</div>
		</section>
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

                $.ajax({
                    data: {
                    	user_id : {{ Auth::user() }},
                    	berita_id : {{ $berita->id }},
                    },
                    url: "{{ route('single.likeBerita') }}",
                    type: "POST",
                    dataType: 'json',
                });
            });
        });
	</script>
@endsection