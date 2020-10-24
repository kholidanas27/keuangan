@extends('layouts.app')
@section('content')
<div class="row">
	<!-- ICON BG-->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center"><i class="i-Add-User"></i>
				<div class="content">
					<p class="text-muted">Kas Masuk</p>
					<p class="text-primary">{{"Rp " . number_format($kas_masuk,2,',','.') }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center"><i class="i-Financial"></i>
				<div class="content">
					<p class="text-muted">Kas Keluar</p>
					<p class="text-primary">{{"Rp ". number_format($kas_keluar,2,',','.') }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center"><i class="i-Money-2"></i>
				<div class="content">
					<p class="text-muted">Saldo Kas</p>
					<p class="text-primary">{{"Rp " . number_format($saldo_kas,2,',','.') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Grafik Keuangan Seluruh Tenant</div>
                <div id="chartKeuangan" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <h3>Arus Kas</h3>
                    </div>
                    <div class="col-md-0">
                        <a href="#"><button class="btn btn-primary custom-btn btn-sm ml-5" type="button" data-toggle="modal" data-target="#exampleModal" name="create_record" id="create_record">Tambah Data</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="display table" id="ul-contact-list" style="width:100%;">
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
                            <td>
                                {{ date('d F Y', strtotime($k->tanggal)) }}
                            </td>
                            <td>
                                <p>{{ $k->keterangan }}</p>
                            </td>
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
                            <td>
                                @if($k->jenis == 1)
                                {{ "Rp " . number_format($k->jumlah,2,',','.') }}
                                @else($k->jenis == 0)
                                {{ "Rp " . number_format($k->jumlah,2,',','.') }}
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('img/keuangan/'. $k->foto ) }}" width="150" height="100" alt="">
                            </td>
                            <td>
                                <a class="ul-link-action text-success" data-toggle="tooltip" href="#" data-placement="top" title="Edit"><i class="i-Edit"></i>
                                    <a class="ul-link-action text-danger mr-1 delete" href="#" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                        <i class="i-Eraser-2"></i></a>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="2"><b>
                                    <h4>Total</h4>
                                </b></td>
                            <td><b>{{"Rp " . number_format($total_masuk,2,',','.') }}</b></td>
                            <td><b>{{"Rp " . number_format($total_keluar,2,',','.') }}</b></td>
                            <td colspan="2"><b>{{"Rp " . number_format($total,2,',','.') }}</b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    &nbsp
    <div class="col-md-12">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <h3>Laba Rugi</h3>
                    </div>
                    <div class="col-md-0">
                        <a href="#"><button class="btn btn-primary custom-btn btn-sm ml-5">Tambah Data</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="display table" id="ul-labarugi-list" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="20%">Tanggal</th>
                            <th width="20%">Keterangan</th>
                            <th width="15%">Pemasukan</th>
                            <th width="15%">Pengeluaran</th>
                            <th width="15%">Saldo</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <a href="/mentor/pengumuman/">
                                    <strong></strong>
                                    <p></p>
                                </a>
                            </td>
                            <td>
                                <a class="badge badge-success m-2 p-2" href="#"></a>
                                <a class="badge badge-danger m-2 p-2" href="#"></a>
                                <a class="badge badge-primary m-2 p-2" href="#"></a>
                                <a class="badge badge-warning m-2 p-2" href="#"></a>
                            </td>
                            <td></td>
                        </tr>
                        </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Arus Kas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" id="sample_form" action="{{route('tenant.store')}}" enctype="multipart/form-data">
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
                            <option value="0" name="pemasukan" id="pemasukan">Pemasukan</option>
                            <option value="1" name="pengeluaran" id="pengeluaran">Pengeluaran</option>
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
                    <div class="input-group image-preview">
                        <input type="text" class="form-control image-preview-filename" disabled="disabled" placeholder="Bukti Transaksi....">
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span class="image-preview-input-title">Browse</span>
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
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
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
        margin-left: 2px;
    }
</style>
@endsection
@section('js')
<script src="{{ asset('theme/js/plugins/echarts.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/echart.options.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/dashboard.v1.script.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/customizer.script.min.js')}}"></script>
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/contact-list-table.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/datatables.script.min.js')}}"></script>
<script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var grafik = <?php echo json_encode($grafik) ?>;
    Highcharts.chart('chartKeuangan', {
        chart: {
            type: 'column'
        },
        legend: {
            borderRadius: 0,
            x: 'right',
            data: ['Bulan', 'Tahun']
        },
        title: {
            text: 'Alur Kas'
        },
        grid: {
            left: '8px',
            right: '8px',
            bottom: '0',
            containLabel: true
        },
        xAxis: {
            categories: [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ],
        },
        yAxis: {
            min: 0,
            interval: 10000,
            axisLine: {
                show: false
            },
            title: {
                text: 'Jumlah Keuangan'
            }
        },
        series: [{
            name: 'Bulan',
            data: grafik,
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
        }]
    });
    $('#ul-contact-list').DataTable({
        responsive: true,
        order: [
            [2, 'DESC']
        ]
    });
    $('#ul-labarugi-list').DataTable({
        responsive: true,
        order: [
            [2, 'DESC']
        ]
    });
    $(document).ready(function() {
        @if(Session::has('errors'))
        $('#exampleModal').modal('show');
        @endif
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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
<script>
    //JS FORM INPUT

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function() {
                $('.image-preview').popover('show');
            },
            function() {
                $('.image-preview').popover('hide');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function() {
            var object = $('<object/>', {
                id: 'dynamic',
                width: 250,
                height: 200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function(e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                object.attr('data', e.target.result);
                $(".image-preview").attr("data-content", $(object)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection