@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
    <strong>Berhasil!</strong> {{session('success')}}
</div>
@elseif(session('update'))
<div class="alert alert-warning" role="alert">
    <strong>Berhasil!</strong> {{session('update')}}
</div>
@elseif(session('delete'))
<div class="alert alert-danger" role="alert">
    <strong>Berhasil!</strong> {{session('delete')}}
</div>
@elseif(session('successLaba'))
<div class="alert alert-success" role="alert">
    <strong>Berhasil!</strong> {{session('successLaba')}}
</div>
@elseif(session('updateLaba'))
<div class="alert alert-warning" role="alert">
    <strong>Berhasil!</strong> {{session('updateLaba')}}
</div>
@elseif(session('deleteLaba'))
<div class="alert alert-danger" role="alert">
    <strong>Berhasil!</strong> {{session('deleteLaba')}}
</div>
@endif
<div class="row">
    <!-- ICON BG-->
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center"><i class="i-Money-2"></i>
                <div class="col-md-12">
                    <h5><b><p class="text-important">Saldo Kas Akhir</p></b></h5>
                    <p class="text-important">{{"Rp ". number_format($saldo_kas,2,',','.') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center"><i class="i-Financial"></i>
                <div class="col-md-12">
                <h5><b><p class="text-important">Laba Bersih Akhir</p></b></h5>
                    <p class="text-important" >{{"Rp " . number_format($laba_bersih,2,',','.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
            @foreach($tenant as $i)
                <h5><div class="card-title text-important">Grafik Keuangan {{ $i->title }}</div></h5>
            @endforeach
                <div id="chartKeuangan" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
        <div id="task-manager-list">
            <!--  content area -->
            <div class="content"> 
                <!--  task manager table -->
                <div class="card" id="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10 text-important">
                                <h4>Arus Kas</h4>
                            </div>
                            <div class="col-md-0">
                                <a href="#"><button class="btn btn-primary custom-btn btn-sm ml-5" type="button" data-toggle="modal" data-target="#arusModal" name="create_record" id="create_record">Tambah Data</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table" id="ul-contact-list" style="width:100%">
                                <thead>
                                <tr>
                                    <th width="20%">Tanggal</th>
                                    <th width="15%">Keterangan</th>
                                    <th width="15%">Pemasukan</th>
                                    <th width="15%">Pengeluaran</th>
                                    <th width="15%">Saldo</th>
                                    <th width="10%">Foto</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($keuangan as $k)
                                    <tr>
                                        <td>{{ date('d F Y', strtotime($k->tanggal)) }}</td>
                                        <td>{{$k->keterangan}}</td> 
                                        <td>
                                        @if($k->jenis == 1)
                                        {{ "Rp " . number_format($k->jumlah,2,',','.') }}
                                        @endif
                                        </td> 
                                        <td>
                                        @if($k->jenis == 0)
                                        {{ "Rp " . number_format($k->jumlah,2,',','.') }}
                                        @endif
                                        </td>  
                                        @if($k->jenis == 1)
                                        <td>{{"Rp " . number_format($k->jumlah,2,',','.') }}</td>
                                        @else
                                        <td>{{"Rp " . "- " . number_format($k->jumlah,2,',','.') }}</td>
                                        @endif
                                        <td>
                                            <img src="{{ asset('img/keuangan/'. $k->foto ) }}" width="150" height="100" alt="" data-toggle="modal" data-target="#myModal" id="myImg">
                                        </td>
                                        <td>
                                            <a class="ul-link-action text-success" type="button" data-toggle="tooltip" href="{{ route('tenant.editArus-id', $k->id )}}" data-placement="top" title="Edit"><i class="i-Edit"></i>
                                            <a class="ul-link-action text-danger mr-1 delete" href="{{ route('tenant.hapusArus-id', $k->id) }}" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                            <i class="i-Eraser-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach       
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2"><b><h5>Total</h5></b></td>
                                    <td><b>{{"Rp " . number_format($total_masuk,2,',','.') }}</b></td>
                                    <td><b>{{"Rp " . number_format($total_keluar,2,',','.') }}</b></td>
                                    <td colspan="2"><b>{{"Rp " . number_format($total,2,',','.') }}</b></td>
                                    <td></td>
                                </tr> 

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  end of task manager table -->
            </div>
            <!--  end of content area -->
        </div>
    </div>
    &nbsp
    <div class="col-md-12">
        <div id="task-manager-list">
            <!--  content area -->
            <div class="content"> 
                <!--  task manager table -->
                <div class="card" id="card">
                    <div class="card-header container-fluid">
                        <div class="row">
                            <div class="col-md-10 text-important">
                                <h4>Laba Rugi</h4>
                            </div>
                            <div class="col-md-0">
                                <a href="#"><button class="btn btn-primary custom-btn btn-sm ml-5" type="button" data-toggle="modal" data-target="#labaModal" name="create_record" id="create_record">Tambah Data</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table" id="ul-laba-list" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="20%">Tanggal</th>
                                        <th width="20%">Keterangan</th>
                                        <th width="20%">Pemasukan</th>
                                        <th width="20%">Pengeluaran</th>
                                        <th width="10%">Foto</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($labaRugi as $b)
                                    <tr>
                                        <td>
                                            {{ date('d F Y', strtotime($b->tanggal)) }}
                                        </td>
                                        <td>
                                            <p>{{ $b->keterangan }}</p>
                                        </td>
                                        <td>
                                            @if($b->jenis == 1)
                                            {{ "Rp " . number_format($b->jumlah,2,',','.') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($b->jenis == 0)
                                            {{ "Rp " . number_format($b->jumlah,2,',','.') }}
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('img/keuangan/'. $b->foto ) }}" width="150" height="100" alt="">
                                        </td>
                                        <td>
                                            <a class="ul-link-action text-success" type="button" data-toggle="tooltip" href="{{ route('tenant.editLaba-id', $b->id) }}" data-placement="top" title="Edit"><i class="i-Edit"></i>
                                                <a class="ul-link-action text-danger mr-1 delete" href="{{ route('tenant.hapusLaba-id', $b->id) }}" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                    <i class="i-Eraser-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach       
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2"><b>
                                            <h5>Jumlah</h5>
                                        </b></td>
                                    <td><b>{{"Rp " . number_format($masuk_labaRugi,2,',','.') }}</b></td>
                                    <td><b>{{"Rp " . number_format($keluar_labaRugi,2,',','.') }}</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <h5>Laba Bersih</h5>
                                    </td>
                                    <td><b>{{"Rp " . number_format($totalLaba,2,',','.') }}</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  end of task manager table -->
            </div>
            <!--  end of content area -->
        </div>
    </div>
</div>
<!-- MODAL -->
<!-- FORM INPUT ARUS KAS -->
<div class="modal fade" id="arusModal" tabindex="-1" role="dialog" aria-labelledby="arusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="arusModalLabel">Tambah Data Arus Kas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" id="sample_form" action="{{ route('tenant.storeArus')}} " enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-lable">Keterangan</label>
                        <input class="form-control @error('keterangan') is-invalid @enderror" type="text" placeholder="Keterangan..." name="keterangan" id="keterangan" value="{{ old('keterangan') }}" required />
                        @if($errors->has('keterangan'))
                        <div class="text-danger">
                            {{ $errors->first('keterangan')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Jenis</label>
                        <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                            <option selected="" disabled="">Pilih Jenis</option>
                            <option value="1" name="pemasukan" id="pemasukan">Pemasukan</option>
                            <option value="0" name="pengeluaran" id="pengeluaran">Pengeluaran</option>
                        </select>
                        @if($errors->has('jenis'))
                        <div class="text-danger">
                            {{ $errors->first('jenis')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Jumlah</label>
                        <input class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah...." name=" jumlah" id="jumlah" value="{{ old('jumlah') }}" required />
                        @if($errors->has('jumlah'))
                        <div class="text-danger">
                            {{ $errors->first('jumlah')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Tanggal</label>
                        <input class="form-control datepicker " type="text" rows="3" autocomplete="off" placeholder="Tanggal...." name="tanggal" id="datepicker" value="{{ old('tanggal') }}" required></input>
                        @if($errors->has('tanggal'))
                        <div class="text-danger">
                            {{ $errors->first('tanggal')}}
                        </div>
                        @endif
                    </div>
                    <div class="input-group " id="image-preview-arus">
                        <input type="text" class="form-control" id="image-preview-filename-arus" disabled="disabled" placeholder="Bukti Transaksi....">
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span id="image-preview-input-title-arus">Browse</span>
                                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" id="file" value="{{ old('foto') }}" /> <!-- rename it -->
                            </div>
                        </span>
                    </div>
                    @if($errors->has('file'))
                    <div class="text-danger">
                        {{ $errors->first('file')}}
                    </div>
                    @endif
                    @foreach($user as $u)
                    <input type="hidden" name="tenant_id" id="tenant_id" value="{{ $u->tenant_id }}" />
                    @endforeach
                    <div class="modal-footer">
                        <a href="{{ route('tenant.keuangan') }}"><button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button></a>
                        <input type="submit" value="Simpan" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END FORM INPUT ARUS KAS -->
<!-- MODAL LABA RUGI -->
<div class="modal fade" id="labaModal" tabindex="-1" role="dialog" aria-labelledby="labaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labaModalLabel">Tambah Data Laba Rugi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" id="laba_form" action="{{ route('tenant.storeLaba')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-lable">Keterangan</label>
                        <input class="form-control @error('keterangan') is-invalid @enderror" type="text" placeholder="Keterangan..." name="keterangan" id="keterangan" value="{{ old('keterangan') }}" required />
                        @if($errors->has('keterangan'))
                        <div class="text-danger">
                            {{ $errors->first('keterangan')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Jenis</label>
                        <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                            <option selected="" disabled="">Pilih Jenis</option>
                            <option value="1" name="pemasukan" id="pemasukan">Pemasukan</option>
                            <option value="0" name="pengeluaran" id="pengeluaran">Pengeluaran</option>
                        </select>
                        @if($errors->has('jenis'))
                        <div class="text-danger">
                            {{ $errors->first('jenis')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Jumlah</label>
                        <input class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah...." name=" jumlah" id="jumlah" value="{{ old('jumlah') }}" required />
                        @if($errors->has('jumlah'))
                        <div class="text-danger">
                            {{ $errors->first('jumlah')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Tanggal</label>
                        <input class="form-control datepicker " type="text" rows="3" autocomplete="off" placeholder="Tanggal...." name="tanggal" id="datepicker" value="{{ old('tanggal') }}" required></input>
                        @if($errors->has('tanggal'))
                        <div class="text-danger">
                            {{ $errors->first('tanggal')}}
                        </div>
                        @endif
                    </div>
                    <div class="input-group" id="image-preview-laba">
                        <input type="text" class="form-control" id="image-preview-filename-laba" disabled="disabled" placeholder="Bukti Transaksi....">
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span id="image-preview-input-title-laba">Browse</span>
                                <input type="file" class=" custom-file-input @error('file') is-invalid @enderror" name="file" id="file" value="{{ old('foto') }}" /> <!-- rename it -->
                            </div>
                        </span>
                    </div>
                    @if($errors->has('file'))
                    <div class="text-danger">
                        {{ $errors->first('file')}}
                    </div>
                    @endif
                    @foreach($userId as $i)
                    <input type="hidden" name="tenant_id" id="tenant_id" value="{{ $i->tenant_id }}" />
                    @endforeach
                    <div class="modal-footer">
                        <a href="{{ route('tenant.keuangan') }}"><button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button></a>
                        <input type="submit" value="Simpan" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Bukti Transaksi -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
<link href="{{asset('theme/css/main.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('theme/css/plugins/datatables.min.css')}}" />
<link rel="stylesheet" href="{{asset('theme/css/plugins/sweetalert2.min.css')}}" />
<style>
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}

.image-preview-input-title {
    margin-left:2px;
}
</style>
@endsection
@section('js')
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/contact-list-table.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/datatables.script.min.js')}}"></script>
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
<script src="{{asset('theme/js/extention/choices.js')}}"></script>
<script src="{{ asset('theme/js/plugins/sweetalert2.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/sweetalert2.script.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>

<script>
    window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 1500);

    $('#ul-contact-list').DataTable({
		responsive: true,
	});
    $('#ul-laba-list').DataTable({
		responsive: true,
	});
    $('.delete').on("click", function(event) {
		event.preventDefault();
		const url = $(this).attr('href');
		swal({
			title: 'Apa Anda Yakin Menghapus ?',
			text: "Anda tidak akan dapat mengembalikan data ini",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#0CC27E',
			cancelButtonColor: '#FF586B',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal',
			confirmButtonClass: 'btn btn-success mr-5',
			cancelButtonClass: 'btn btn-danger',
			buttonsStyling: false
		}).then(function(value) {
			if (value) {
				window.location.href = url;
			}
		});
	});
	// <!-- MODAL ARUS KAS-->
    $(document).ready(function() {
        @if(Session::has('errors'))
        $('#arusModal').modal('show');
        @endif
    });
    // <!-- MODAL LABA RUGI-->
    $(document).ready(function() {
        @if(Session::has('errors'))
        $('#labaModal').modal('show');
    @endif
    });
    // MODAL BUKTI TRANSAKSI
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

    //GRAFIK
    var arusMasuk = <?php echo json_encode($arusMasuk) ?>;
    var arusKeluar = <?php echo json_encode($arusKeluar) ?>;
    var labaMasuk = <?php echo json_encode($labaMasuk) ?>;
    var labaKeluar = <?php echo json_encode($labaKeluar) ?>;
    var totalLabaBersih = <?php echo json_encode($totalLabaBersih) ?>;
    var categories = <?php echo json_encode($categories) ?>;
    Highcharts.chart('chartKeuangan', {
        chart: {
            type: 'column'
        },
        legend: {
            verticalAlign: 'bottom',
            layout: 'horizontal',
            x: 'middle',
            data: ['Arus Kas Masuk', 'Arus Kas Keluar', ,'Penghasilan', 'Beban Usaha', 'Laba Bersih']
        },
        title: {
            text: 'Arus Kas & Laba Rugi'
        },
        grid: {
            left: '8px',
            right: '8px',
            bottom: '0',
            containLabel: true
        },
        xAxis: {
            categories: categories,
        },
        yAxis: {
            min: 0,
            interval: 10000,
            axisLine: {
                show: true
            },
            title: {
                text: 'Jumlah Keuangan'
            }
        },
        series: [{
            name: 'Arus Kas Masuk',
            data: arusMasuk,
            label: {
                show: false,
                color: '#0168c1'
            },
            barGap: 0,
            color: '#7569b3',
            smooth: true,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowOffsetY: -2,
                    shadowColor: 'rgba(0, 0, 0, 0.3)'
                }
            }
        },{
            name: 'Arus Kas Keluar',
            data: arusKeluar,
            label: {
                show: false,
                color: '#0168c1'
            },
            barGap: 0,
            color: '#1E90FF',
            smooth: true,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowOffsetY: -2,
                    shadowColor: 'rgba(0, 0, 0, 0.3)'
                }
            }
        },{
            name: 'Penghasilan',
            data: labaMasuk,
            label: {
                show: false,
                color: '#FF8C00'
            },
            barGap: 0,
            color: '#FFA500',
            smooth: true,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowOffsetY: -2,
                    shadowColor: 'rgba(0, 0, 0, 0.3)'
                }
            }
        },{
            name: 'Beban Usaha',
            data: labaKeluar,
            label: {
                show: false,
                color: '#FF8C00'
            },
            barGap: 0,
            color: '#FF0000',
            smooth: true,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowOffsetY: -2,
                    shadowColor: 'rgba(0, 0, 0, 0.3)'
                }
            }
        },{
            name: 'Laba Bersih',
            data: totalLabaBersih,
            label: {
                show: false,
                color: '#FF00FF'
            },
            barGap: 0,
            color: '#FF00FF',
            smooth: true,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowOffsetY: -2,
                    shadowColor: 'rgba(0, 0, 0, 0.3)'
                }
            }
        }]
    });

	//JS FORM INPUT ARUS KAS
	
	$(document).on('click', '#close-preview', function(){ 
    $('#image-preview-arus').popover('hide');
    // Hover befor close the preview
    $('#image-preview-arus').hover(
        function () {
           $('#image-preview-arus').popover('show');
        }, 
         function () {
           $('#image-preview-arus').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('#image-preview-arus').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('#image-preview-arus').attr("data-content","").popover('hide');
        $('#image-preview-filename-arus').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $("#image-preview-input-title-arus").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var object = $('<object/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#image-preview-input-title-arus").text("Change");
            $(".image-preview-clear").show();
            $("#image-preview-filename-arus").val(file.name);            
            object.attr('data', e.target.result);
            $("#image-preview-arus").attr("data-content",$(object)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});

     //JS FORM INPUT LABA RUGI
    $(document).on('click', '#close-preview', function(){ 
    $('#image-preview-laba').popover('hide');
    // Hover befor close the preview
    $('#image-preview-laba').hover(
        function () {
           $('#image-preview-laba').popover('show');
        }, 
         function () {
           $('#image-preview-laba').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('#image-preview-laba').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('#image-preview-laba').attr("data-content","").popover('hide');
        $('#image-preview-filename-laba').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $("#image-preview-input-title-laba").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var object = $('<object/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#image-preview-input-title-laba").text("Change");
            $(".image-preview-clear").show();
            $("#image-preview-filename-laba").val(file.name);            
            object.attr('data', e.target.result);
            $("#image-preview-laba").attr("data-content",$(object)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
<script>
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
@endsection