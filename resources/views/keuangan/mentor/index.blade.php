@extends('layouts.app')
@section('content')
<div class="row">
	<!-- ICON BG-->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center"><i class="i-Add-User"></i>
				<div class="content">
					<p class="text-muted">Kas Masuk</p>
					<p class="text-primary">{{"Rp " . number_format($total_masuk,2,',','.') }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center"><i class="i-Financial"></i>
				<div class="content">
					<p class="text-muted">Kas Keluar</p>
					<p class="text-primary">{{"Rp ". number_format($total_keluar,2,',','.') }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
			<div class="card-body text-center"><i class="i-Money-2"></i>
				<div class="content">
					<p class="text-muted">Saldo Kas</p>
					<p class="text-primary">{{"Rp " . number_format($total,2,',','.') }}</p>
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
                <div id="chartKeuanganM" style="height: 300px;"></div>
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
            <div class="card-header">
                <h3>Laba Rugi</h3>
            </div>
            <div class="card-body">
                <table class="display table" id="ul-labarugi-list" style="width:100%;">
                    <thead>
                        <tr>
                            <th width="65%">Pengumuman</th>
                            <th width="15%">Kategori</th>
                            <th width="15%">Tanggal</th>
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
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
</script>
<script>
    var grafik = <?php echo json_encode($grafik) ?>;
    Highcharts.chart('chartKeuanganM', {
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
</script>
@endsection