@extends('layouts.front')
@section('content')
<section class="home">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    @foreach($pengumuman as $p)
                    <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="/pengumuman/{{ $p->slug }}">
                                    <img src="\img\pengumuman\{{ $p->foto }}" alt="Sample Article">
                                </a>
                            </figure>
                            <div class="details">
                                <div class="detail">
                                    <div class="category">
                                        <a href="#">Pengumuman</a>
                                    </div>
                                    <div class="time">{{ date('d F Y', strtotime($p->created_at)) }}</div>
                                </div>
                                <h1><a href="/pengumuman/{{ $p->slug}} ">{{ $p->title }}</a></h1>
                                <p>
                                    {!! str_limit($p->pengumuman) !!}
                                </p>
                                <footer>
                                    <a class="btn btn-primary more" href="/pengumuman/{{ $p->slug}} ">
                                        <div>More</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                <div class="sidebar-title for-tablet">Sidebar</div>
                <aside>
                    <h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
                    <div class="aside-body">
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{route('single')}}">
                                        <img src="{{asset('assets/images/news/img07.jpg')}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{route('single')}}">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
                                </div>
                            </div>
                        </article>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{route('single')}}">
                                        <img src="{{asset('assets/images/news/img14.jpg')}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{route('single')}}">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
                                </div>
                            </div>
                        </article>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{route('single')}}">
                                        <img src="{{asset('assets/images/news/img09.jpg')}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{route('single')}}">Aliquam et metus convallis tincidunt velit ut rhoncus dolor</a></h1>
                                </div>
                            </div>
                        </article>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{route('single')}}">
                                        <img src="{{asset('assets/images/news/img11.jpg')}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{route('single')}}">dui augue facilisis lacus fringilla pulvinar massa felis quis velit</a></h1>
                                </div>
                            </div>
                        </article>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{route('single')}}">
                                        <img src="{{asset('assets/images/news/img06.jpg')}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{route('single')}}">neque est semper nulla, ac elementum risus quam a enim</a></h1>
                                </div>
                            </div>
                        </article>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{route('single')}}">
                                        <img src="{{asset('assets/images/news/img03.jpg')}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{route('single')}}">Morbi vitae nisl ac mi luctus aliquet a vitae libero</a></h1>
                                </div>
                            </div>
                        </article>
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
        </div>
    </div>
</section>
@endsection