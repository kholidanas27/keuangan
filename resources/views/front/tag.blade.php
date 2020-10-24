@extends('layouts.front')
@section('content')
		<section class="home">
			<div class="container">
				<div class="row">
                    <div class="block">
                        <h1 class="block-title">Tag</h1>
                        <div class="block-body"></div>
                        @php
                            use App\Berita;
                            $lastNews = Berita::with('kategori')
                                        ->orderBy('created_at','desc')
                                        ->where('publish','=','1')
                                        ->where('inkubator_id','=','0')
                                        ->paginate(4);
                        @endphp
                        @forelse($lastNews as $row)
                            <article class="article-mini">
                                <div class="inner">
                                    <div class="padding">
                                        <h1><a href="{{ route('tag', $row->slug) }}">{{ Str::Limit($row->kategori,30) }}</a></h1>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <h5>Belum ada berita</h5>
                        @endforelse
                    </div>
				</div>
			</div>
		</section>


@endsection
