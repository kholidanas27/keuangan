@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
        text-transform: UPPERCASE;
        font-weight: bold; }

    .checked, .price span {
        color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
        margin-bottom: 15px; }

    .product-title {
        margin-top: 0; }

    .size {
        margin-right: 10px; }
  
    .size:first-of-type {
        margin-left: 40px; }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px; }

    .color:first-of-type {
        margin-left: 20px; }

    .add-to-cart, .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease; }

    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }

    .not-available {
        text-align: center;
        line-height: 2em; }
    
    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff; }

    .orange {
        background: #ff9f1a; }

    .green {
        background: #85ad00; }

    .blue {
        background: #0076ad; }

    .tooltip-inner {
        padding: 1.3em; }

    #carousel-thumb .carousel-indicators {
        margin: 10px 0 0;
        /*overflow: auto;*/
        position: static;
        text-align: left;
        white-space: nowrap;
        width: 100%;
    }

    #carousel-thumb .carousel-inner img{
        height:500px;
    }
    
    #carousel-thumb .carousel-indicators li {
        background-color: transparent;
        -webkit-border-radius: 0;
        border-radius: 0;
        display: inline-block;
        height: auto;
        margin: 0 !important;
        width: auto;
    }

    #carousel-thumb .carousel-indicators li img {
        display: block;
        opacity: 0.5;
    }

    #carousel-thumb .carousel-indicators li.active img {
        opacity: 1;
    }

    #carousel-thumb .carousel-indicators li:hover img {
        opacity: 0.75;
    }
    #carousel-thumb .carousel-outer {
        position: relative;
    }
</style>
@endsection
@section('content')
	<div class="breadcrumb">
		<h1 class="mr-2">Data Produk</h1>
	</div>
	<div class="separator-breadcrumb border-top"></div>
	<section class="ul-product-detail">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
								<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
      							<!--Slides-->
      								<div class="carousel-inner" role="listbox">
        								<div class="carousel-item active">
          									<img class="d-block w-100" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" alt="First slide">
        								</div>
        								<div class="carousel-item">
          									<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(121).jpg" alt="Second slide">
        								</div>
        								<div class="carousel-item">
								          	<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg" alt="Third slide">
								        </div>
										<div class="carousel-item">
								          	<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg" alt="Four slide">
								        </div>
      								</div>
      							<!--/.Slides-->
      							<!--Controls-->
      								<a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
        								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
        								<span class="sr-only">Previous</span>
      								</a>
      								<a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
        								<span class="carousel-control-next-icon" aria-hidden="true"></span>
        								<span class="sr-only">Next</span>
      								</a>
      							<!--/.Controls-->
      								<ol class="carousel-indicators">
        								<li data-target="#carousel-thumb" data-slide-to="0" class="active"> 
        									<img class="d-block w-100 " style="height: 40px; width: 150px" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" class="img-fluid">
        								</li>
        								<li data-target="#carousel-thumb" data-slide-to="1">
        									<img class="d-block w-100" style="height: 40px; width: 150px" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" class="img-fluid">
        								</li>
        								<li data-target="#carousel-thumb" data-slide-to="2">
        									<img class="d-block w-100" style="height: 40px; width: 150px" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" class="img-fluid">
        								</li>
										<li data-target="#carousel-thumb" data-slide-to="3">
											<img class="d-block w-100" style="height: 40px; width: 150px" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" class="img-fluid">
										</li>
										<li data-target="#carousel-thumb" data-slide-to="2">
											<img class="d-block w-100" style="height: 40px; width: 150px" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" class="img-fluid">
										</li>
      								</ol>
    							</div>
							</div>
							<div class="col-lg-2">
								<img src="{{ asset('img/produk/' . $produk->produk_image->image) }}" style="max-width:100%;height:auto" />
								<hr>
								<p class="product-description">{{ $produk->subtitle }}</p>
							</div>
							<div class="col-lg-4">
								<h3 class="product-title">{{ $produk->title }}</h3>
								<div class="rating">
									<div class="stars">
										<span class="fas fa-star checked"></span>
										<span class="fas fa-star checked"></span>
										<span class="fas fa-star checked"></span>
										<span class="fas fa-star"></span>
										<span class="fas fa-star"></span>
									</div>
									<span class="review-no">41 reviews</span>
								</div>
								<p class="product-description">{{ $produk->tentang }}</p>
								<h4 class="price">current price: <span>Rp  {{ number_format($produk->harga_jual,0,',','.') }}</span></h4>
								<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ul-product-detail__box">
		<div class="row">
			<div class="col-lg-3 col-md-3 mt-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="ul-product-detail__border-box">
							<div class="ul-product-detail--icon mb-2"><i class="i-Car text-success text-25 font-weight-500"></i></div>
							<h5 class="heading">Quick Delivery</h5>
							<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 mt-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="ul-product-detail__border-box">
							<div class="ul-product-detail--icon mb-2"><i class="i-Reload text-danger text-25 font-weight-500"></i></div>
							<h5 class="heading">Back In 30 Days</h5>
							<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 mt-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="ul-product-detail__border-box">
							<div class="ul-product-detail--icon mb-2"><i class="i-Headset text-info text-25 font-weight-500"></i></div>
							<h5 class="heading">Support 24/7</h5>
							<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 mt-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="ul-product-detail__border-box">
							<div class="ul-product-detail--icon mb-2"><i class="i-Money-Bag text-warning text-25 font-weight-500"></i></div>
							<h5 class="heading">High Secure Payment</h5>
							<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<section class="ul-product-detail__tab">
		<div class="row">
			<div class="col-lg-12 col-md-12 mt-4">
				<div class="card mt-2 mb-4">
					<div class="card-body">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active show" id="nav-produk-tab" data-toggle="tab" href="#nav-produk" role="tab" aria-controls="nav-produk" aria-selected="true">Detail Produk</a>

								<a class="nav-item nav-link" id="nav-bisnis-tab" data-toggle="tab" href="#nav-bisnis" role="tab" aria-controls="nav-bisnis" aria-selected="false">Bisnis</a>
								
								<a class="nav-item nav-link" id="nav-canvas-tab" data-toggle="tab" href="#nav-canvas" role="tab" aria-controls="nav-canvas" aria-selected="false">Canvas</a>
								
								<a class="nav-item nav-link" id="nav-ijin-tab" data-toggle="tab" href="#nav-ijin" role="tab" aria-controls="nav-ijin" aria-selected="false">Ijin</a>
								
								<a class="nav-item nav-link" id="nav-image-tab" data-toggle="tab" href="#nav-image" role="tab" aria-controls="nav-image" aria-selected="false">Image</a>
								
								<a class="nav-item nav-link" id="nav-ki-tab" data-toggle="tab" href="#nav-ki" role="tab" aria-controls="nav-ki" aria-selected="false">Kekayaan Intelektual</a>
								
								<a class="nav-item nav-link" id="nav-riset-tab" data-toggle="tab" href="#nav-riset" role="tab" aria-controls="nav-riset" aria-selected="false">Riset</a>
								
								<a class="nav-item nav-link" id="nav-sertifikasi-tab" data-toggle="tab" href="#nav-sertifikasi" role="tab" aria-controls="nav-sertifikasi" aria-selected="false">Sertifikat</a>
								
								<a class="nav-item nav-link" id="nav-team-tab" data-toggle="tab" href="#nav-team" role="tab" aria-controls="nav-team" aria-selected="false">Team</a>

							</div>
						</nav>

						<div class="tab-content ul-tab__content p-5" id="nav-tabContent">
							<div class="tab-pane fade active show" id="nav-produk" role="tabpanel" aria-labelledby="nav-produk-tab">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<img class="rounded" src="{{ asset('img/produk/' . $produk->produk_image->image) }}" alt="{{ $produk->produk_image->judul}}" />
									</div>
									<div class="col-lg-8 col-md-8 col-sm-12">
										<h5 class="text-uppercase font-weight-700 text-muted mt-4 mb-2">{{ $produk->subtitle }}</h5>
										<p>{{ $produk->tentang }}</p>
										<div class="ul-product-detail__nested-card">
											<div class="row text-center">
												<div class="col-lg-4 col-sm-12 mb-2">
													<div class="card">
														<div class="card-body">
															<div class="ul-product-detail__border-box">
																<div class="ul-product-detail--icon mb-2"><i class="i-Car text-success text-25 font-weight-500"></i></div>
																<h5 class="heading">Quick Delivery</h5>
																<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-sm-12 mb-2">
													<div class="card">
														<div class="card-body">
															<div class="ul-product-detail__border-box">
																<div class="ul-product-detail--icon mb-2"><i class="i-Car text-primary text-25 font-weight-500"></i></div>
																<h5 class="heading">Quick Delivery</h5>
																<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-sm-12 mb-2">
													<div class="card">
														<div class="card-body">
															<div class="ul-product-detail__border-box">
																<div class="ul-product-detail--icon mb-2"><i class="i-Car text-danger text-25 font-weight-500"></i></div>
																<h5 class="heading">Quick Delivery</h5>
																<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="nav-bisnis" role="tabpanel" aria-labelledby="nav-bisnis-tab">
								<div class="row">
									<div class="col-12">
										<div class="ul-product-detail__avg-rate text-center">
											<h3 class="heading text-success">4.9</h3><span class="text-muted font-weight-600">Overall Rating</span>
										</div>
										<div class="ul-product-detail__comment-list mt-3">
											<ul class="list-group list-group-flush">
												<li class="list-group-item"><a class="ul-product-detail__reply float-right" href="href"><i class="i-Left"></i><span>Reply</span></a>
													<h5 class="font-weight-800">Timothy Clarkson</h5>
													<p>Very comfortable key,and nice product.</p><span class="text-warning">**** </span>
												</li>
												<li class="list-group-item"><a class="ul-product-detail__reply float-right" href="href"><i class="i-Left"></i><span>Reply</span></a>
													<h5 class="font-weight-800">Jaret Leto</h5>
													<p>Very comfortable key,and nice product.</p><span class="text-warning">**** </span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="nav-canvas" role="tabpanel" aria-labelledby="nav-canvas-tab">
								<b>Isi dari table produk_canvas</b>
							</div>

							<div class="tab-pane fade" id="nav-ijin" role="tabpanel" aria-labelledby="nav-ijin-tab">
								<div class="row">
									<div class="col-lg-2"><img class="rounded" src="{{ asset('img/tenant/' . $produk->tenant->foto) }}" alt="{{ $produk->tenant->title}}" /></div>
									<div class="col-lg-6"><span class="badge badge-pill badge-danger p-2 m-1">{{ $produk->tenant->title }}</span>
										<h6 class="heading mt-2">{{ $produk->tenant->subtitle }}</h6>
										<p class="text-muted">{{ $produk->tenant->description }}</p>
									</div>
									<div class="col-lg-4">
										<div class="ul-product-detail__features mt-3">
											<ul class="m-0 p-0">
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">This Refurbished product is tested to work and look like new with minimal to no signs of wear & tear</span></li>
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">2.6GHz Intel Core i5 4th Gen processor</span></li>
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">8GB DDR3 RAM</span></li>
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">13.3-inch screen, Intel Iris 5100 1.5GB Graphics</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
								<div class="row">
									@forelse($image as $row)
										<div class="col-md-3">
											<img class="d-block rounded w-100" src="{{ asset('img/produk/' . $row->image) }}" alt="{{ $row->judul }}">
										</div>
									@empty
									<h5>Tidak ada gambar untuk produk ini</h5>
									@endforelse
								</div>
							</div>

							<div class="tab-pane fade" id="nav-ki" role="tabpanel" aria-labelledby="nav-ki-tab">
								<b>Isi dari table produk_sertifikasi</b>
							</div>

							<div class="tab-pane fade" id="nav-riset" role="tabpanel" aria-labelledby="nav-riset-tab">
								<b>Isi dari table produk_riset</b>
							</div>

							<div class="tab-pane fade" id="nav-sertifikasi" role="tabpanel" aria-labelledby="nav-sertifikasi-tab">
								<b>Isi dari table produk_sertifikasi</b>
							</div>

							<div class="tab-pane fade" id="nav-team" role="tabpanel" aria-labelledby="nav-team">
								<div class="ul-product-detail__nested-card mt-2">
									<div class="row text-center">
										@foreach( $produk_team as $row )
										<div class="col-lg-3 col-sm-12 mb-2">
											<div class="card">
												<img src="{{ asset('img/produk/bussinesMan.svg') }}" class="card-img-top mt-2" alt="bussinesMan">
												<div class="card-body">
													<div class="ul-product-detail__border-box">
														<h5 class="heading">{{ $row->profil_user->nama }}</h5>
														<p class="text-muted text-12">{{ $row->profil_user->deskripsi }}</p>
													</div>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ul-product-detail__tab">
		<div class="row">
			<div class="col-lg-12 col-md-12 mt-4">
				<div class="card mt-2 mb-4">
					<div class="card-body">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
								<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bisnis</a>
								<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Team</a>
								<a class="nav-item nav-link" id="nav-brand-tab" data-toggle="tab" href="#nav-brand" role="tab" aria-controls="nav-contact" aria-selected="false">About Brand</a>
							</div>
						</nav>
						<div class="tab-content ul-tab__content p-5" id="nav-tabContent">
							<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<img src="{{ asset('img/produk/' . $produk->produk_image->image) }}" alt="{{ $produk->produk_image->judul}}" />
									</div>
									<div class="col-lg-8 col-md-8 col-sm-12">
										<h5 class="text-uppercase font-weight-700 text-muted mt-4 mb-2">{{ $produk->subtitle }}</h5>
										<p>{{ $produk->tentang }}</p>
										<div class="ul-product-detail__nested-card">
											<div class="row text-center">
												<div class="col-lg-4 col-sm-12 mb-2">
													<div class="card">
														<div class="card-body">
															<div class="ul-product-detail__border-box">
																<div class="ul-product-detail--icon mb-2"><i class="i-Car text-success text-25 font-weight-500"></i></div>
																<h5 class="heading">Quick Delivery</h5>
																<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-sm-12 mb-2">
													<div class="card">
														<div class="card-body">
															<div class="ul-product-detail__border-box">
																<div class="ul-product-detail--icon mb-2"><i class="i-Car text-primary text-25 font-weight-500"></i></div>
																<h5 class="heading">Quick Delivery</h5>
																<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-sm-12 mb-2">
													<div class="card">
														<div class="card-body">
															<div class="ul-product-detail__border-box">
																<div class="ul-product-detail--icon mb-2"><i class="i-Car text-danger text-25 font-weight-500"></i></div>
																<h5 class="heading">Quick Delivery</h5>
																<p class="text-muted text-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<div class="row">
									<div class="col-12">
										<div class="ul-product-detail__avg-rate text-center">
											<h3 class="heading text-success">4.9</h3><span class="text-muted font-weight-600">Overall Rating</span>
										</div>
										<div class="ul-product-detail__comment-list mt-3">
											<ul class="list-group list-group-flush">
												<li class="list-group-item"><a class="ul-product-detail__reply float-right" href="href"><i class="i-Left"></i><span>Reply</span></a>
													<h5 class="font-weight-800">Timothy Clarkson</h5>
													<p>Very comfortable key,and nice product.</p><span class="text-warning">**** </span>
												</li>
												<li class="list-group-item"><a class="ul-product-detail__reply float-right" href="href"><i class="i-Left"></i><span>Reply</span></a>
													<h5 class="font-weight-800">Jaret Leto</h5>
													<p>Very comfortable key,and nice product.</p><span class="text-warning">**** </span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								<div class="ul-product-detail__nested-card mt-2">
									<div class="row text-center">
										@foreach( $produk_team as $row )
										<div class="col-lg-3 col-sm-12 mb-2">
											<div class="card">
												<img src="{{ asset('img/produk/bussinesMan.svg') }}" class="card-img-top mt-2" alt="bussinesMan">
												<div class="card-body">
													<div class="ul-product-detail__border-box">
														<h5 class="heading">{{ $row->profil_user->nama }}</h5>
														<p class="text-muted text-12">{{ $row->profil_user->deskripsi }}</p>
													</div>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-brand" role="tabpanel" aria-labelledby="nav-contact-tab">
								<div class="row">
									<div class="col-lg-2"><img class="rounded" src="{{ asset('img/tenant/' . $produk->tenant->foto) }}" alt="{{ $produk->tenant->title}}" /></div>
									<div class="col-lg-6"><span class="badge badge-pill badge-danger p-2 m-1">{{ $produk->tenant->title }}</span>
										<h6 class="heading mt-2">{{ $produk->tenant->subtitle }}</h6>
										<p class="text-muted">{{ $produk->tenant->description }}</p>
									</div>
									<div class="col-lg-4">
										<div class="ul-product-detail__features mt-3">
											<ul class="m-0 p-0">
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">This Refurbished product is tested to work and look like new with minimal to no signs of wear & tear</span></li>
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">2.6GHz Intel Core i5 4th Gen processor</span></li>
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">8GB DDR3 RAM</span></li>
												<li><i class="i-Right1 text-primary text-15 align-middle font-weight-700"></i><span class="align-middle">13.3-inch screen, Intel Iris 5100 1.5GB Graphics</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection