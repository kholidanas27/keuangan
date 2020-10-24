@extends('layouts.front')
@section('content')
<section class="home">
    <div class="container">
        <div class="row">
            <div class="line">
                <div>All News</div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="owl-carousel owl-theme slide" id="featured">
                    @foreach($mainNews as $mn)
                    <div class="item">
                        <article class="featured">
                            <div class="overlay"></div>
                            <figure>
                                <img src="{{ asset('storage/berita/' . $mn->foto) }}" alt="{{ $mn->tittle }}">
                            </figure>
                            <div class="details">
                                <div class="category"><a href="#">{{ $mn->beritaCategory->category }}</a></div>
                                <h1><a href="{{ route('single', $mn->slug) }}">{{ $mn->tittle }}</a></h1>
                                <div class="time">{{ $mn->created_at->format('M d, Y') }}</div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    @forelse($lastNews as $row)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="row">
                            <article class="article col-md-12">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('single', $mn->slug) }}">
                                            <img src="{{ asset('storage/berita/' . $row->foto) }}"
                                                alt="{{ $row->tittle }}">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <div class="detail">
                                            <div class="time">{{ $row->created_at->format('M d, Y') }}</div>
                                            <div class="category"><a href="#">{{ $row->beritaCategory->category }}</a>
                                            </div>
                                        </div>
                                        <h4><a
                                                href="{{ route('single', $row->slug) }}">{{ Str::Limit($row->tittle, 20) }}</a>
                                        </h4>
                                        <p>{!! Str::Limit($row->berita, 150) !!}</p>
                                        <footer>
                                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                                <div>1263</div>
                                            </a>
                                            <a class="btn btn-primary more" href="{{ route('single', $mn->slug) }}">
                                                <div>More</div>
                                                <div><i class="ion-ios-arrow-thin-right"></i></div>
                                            </a>
                                        </footer>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    @empty
                    <h5>Belum ada berita</h5>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
