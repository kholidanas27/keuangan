@extends('layouts.app')

@section('breadcrumb')
<div class="breadcrumb">
	<h1 class="mr-2">Dashboard Inkubator</h1>
</div>
@endsection
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
                            <th width="20%">Keterangan</th>
                            <th width="15%">Pemasukan</th>
                            <th width="15%">Pengeluaran</th>
                            <th width="15%">Saldo</th>
                            <th width="15%">Action</th>
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
                            <td>{{"Rp " . number_format($k['jumlah'],2,',','.') }}</td>
                            <td></td>
                            
                        </tr>
                    @endforeach  
                        <tr>
                            <td colspan="2"><b><h4>Total</h4></b></td>
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
                            <td>{{"Rp " . number_format($total,2,',','.') }}</td>
                            <td></td>                  
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('theme/js/plugins/echarts.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/echart.options.min.js')}}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var keluar = <?php echo json_encode($keluar)?>;
        var masuk = <?php echo json_encode($masuk)?>;
        Highcharts.chart('chartKeuangan', {
            chart: {
                type: 'column'
			},
			legend: {
				borderRadius: 0,
				x: 'right',
				data: ['Arus Kas', 'Laba Rugi']
			},
            title: {
                text: 'Grafik Keuangan Seluruh Tenant'
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
				name: 'Arus Kas',
				data: masuk,
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
				name: 'Laba Rugi',
				data: keluar,
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
@endsection