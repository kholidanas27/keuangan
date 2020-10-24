@extends('layouts.app')

@section('content')
   <div class="row">
   <div class="col-md-3">
	<div class="card">
		<div class="card-header">
		<h3>Produk</h3>
		</div>
<div class="card-body">
                <div class="form-group">
                    <label for="search">Pencarian</label>
                    <div class="input-group">
                        <input type="text" name="title" id="title" class="form-control" placeholder="search" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                                            <label class="checkbox checkbox-success">
                            <input type="checkbox" name="priority" value="2"><span>Pra Start Up</span><span class="checkmark"></span>
                        </label>
                                            <label class="checkbox checkbox-success">
                            <input type="checkbox" name="priority" value="1"><span>Proposal</span><span class="checkmark"></span>
                        </label>
                                            <label class="checkbox checkbox-success">
                            <input type="checkbox" name="priority" value="4"><span>Scale Up</span><span class="checkmark"></span>
                        </label>
                                            <label class="checkbox checkbox-success">
                            <input type="checkbox" name="priority" value="3"><span>Start Up</span><span class="checkmark"></span>
                        </label>
                                    </div>
                <div class="form-group">
                    <button id="filter" class="btn btn-primary">Filter</button>
                </div>
            </div>
	</div>
   </div>
	<div class="col-md-9">
	<section class="product-cart">
                    <div class="row list-grid">
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/qlapa1.jpg')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title">
                                                Qlapa - Marketplace Kerajian
                                            </div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">PT. Kelapa Daya Persada</p>
                                      
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-info">Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/pajak.jpg')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title">Pajakku</div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">PT. Taat Pajak Bersama</p>
                                        
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-primary">Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/agrito.png')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title"><b>Agrito - Marketplace Pertanian</b></div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">PT. Agrito Sejahtera Indonesia</p>
                                       
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-info">Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <a href="{{route('inkubator.produk-detail',['startup','1'])}}"><div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/igrow.jpg')}}" /></div></a>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center">
									<a class="w-40 w-sm-100" href="{{route('inkubator.produk-detail',['startup','1'])}}">
                                            <div class="item-title">
                                               <b>iGrow-Pembiayaan Pertanian</b>
                                            </div>
                                    </a>
                                    <a href="{{route('inkubator.tenant-detail',['startup','1'])}}">    <p class="m-0 text-muted text-small w-15 w-sm-100">PT. Daya Guna Mandiri</p></a>
                                        
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-info">Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/default.png')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title">Produk</div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">Nama Perusahaan</p>
                                        
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-info">Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/default.png')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title">Produk</div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">Nama Perusahaan</p>
                                        
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-success">Scaleup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/default.png')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title">Produk</div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">Nama Perusahaan</p>
                                        
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-primary">Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/default.png')}}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center"><a class="w-40 w-sm-100" href="">
                                            <div class="item-title">Produk</div>
                                        </a>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">Nama Perusahaan</p>
                                       
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges"><span class="badge badge-red">Pra Startup</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 ">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
	</div>
</div><!-- end of main-content -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New Produk</h5>
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