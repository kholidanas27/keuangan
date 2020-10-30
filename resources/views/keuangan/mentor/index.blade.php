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
                <div id="chartKeuangan" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-3">
        {{-- Menu Filter --}}
        @role(['inkubator', 'mentor'])
        <div class="card mb-4">
			<div class="card-header container-fluid">
			  <div class="row">
				<div class="col">
				  <h3>Filter</h3>
				</div>
			  </div>
            </div>
			<div class="card-body">
                <div class="form-group">
                    <label for="daterange">Rentang tanggal</label>
                    <input type="text" name="daterange" class="form-control" placeholder="set tanggal" >
                </div>
                <div class="form-group">
                @role(['inkubator'])
                <form action="{{ route('inkubator.filter') }}" method="GET" class="form-group">
                @endrole
                @role(['mentor'])
                <form action="{{ route('mentor.filter') }}" method="GET" class="form-group">
                @endrole
                    {{ csrf_field() }}
                    <select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="month">
                        <option value="0" selected disabled> Pilih Bulan</option>
                        <option value="01"> Januari</option>
                        <option value="02"> Februari</option>
                        <option value="03"> Maret</option>
                        <option value="04"> April</option>
                        <option value="05"> Mei</option>
                        <option value="06"> Juni</option>
                        <option value="07"> Juli</option>
                        <option value="08"> Agustus</option>
                        <option value="09"> September</option>
                        <option value="10"> Oktober</option>
                        <option value="11"> November</option>
                        <option value="12"> Desember</option>
                    </select>
                    <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
                        <option value="0" selected disabled> Pilih Tahun</option>
                        <?php 
                        $year = date('Y');
                        $min = $year - 60;
                        $max = $year;
                        for( $i=$max; $i>=$min; $i-- ) {
                        echo '<option value='.$i.'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                </form>
                </div>
                <div class="form-group">
                    <label for="tenant">Tenant</label>
                    @foreach ($tenant as $item)
                        <label class="checkbox checkbox-success">
                            <input type="checkbox" name="tenant" value="{{ $item->id }}"/><span>{{ $item->title }}</span><span class="checkmark"></span>
                        </label>
                    @endforeach
                </div>
                <div class="form-group">
                    <button id="filter" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
        @endrole

        <div class="card mb-4">
			<div class="card-header container-fluid">
			  <div class="row">
				<div class="col">
				  <h3>Filter</h3>
				</div>
			  </div>
            </div>
			<div class="card-body">
            @role(['inkubator'])
            <form action="{{ route('inkubator.filter') }}" method="GET" class="form-group">
            @endrole
            @role(['mentor'])
            <form action="{{ route('mentor.filter') }}" method="GET" class="form-group">
            @endrole

                {{ csrf_field() }}
                <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
                    <option value="0" selected disabled> Pilih Tahun</option>
                    <?php 
                    $year = date('Y');
                    $min = $year - 60;
                    $max = $year;
                    for( $i=$max; $i>=$min; $i-- ) {
                    echo '<option value='.$i.'>'.$i.'</option>';
                    }
                    ?>
                </select>
                <select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="month">
                    <option value="0" selected disabled> Pilih Bulan</option>
                    <option value="01"> Januari</option>
                    <option value="02"> Februari</option>
                    <option value="03"> Maret</option>
                    <option value="04"> April</option>
                    <option value="05"> Mei</option>
                    <option value="06"> Juni</option>
                    <option value="07"> Juli</option>
                    <option value="08"> Agustus</option>
                    <option value="09"> September</option>
                    <option value="10"> Oktober</option>
                    <option value="11"> November</option>
                    <option value="12"> Desember</option>
                </select>
                <input class="btn btn-primary" name="submit" type="submit" value="Filter"/>
            </form>
            </div>
        </div>


	</div>
	<div class="col-md-9">
        <div id="task-manager-list">
            <!--  content area -->
            <div class="content"> 
                <!--  task manager table -->
                <div class="card" id="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table" id="names" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th width="15%">Tanggal</th>
                                        <th width="15%">Keterangan</th>
                                        <th width="20%">Pemasukan</th>
                                        <th width="20%">Pengeluaran</th>
                                        <th width="20%">Saldo</th>
                                        <th width="10%">Tanda Bukti</th>
                                        @role('tenant')
                                        <th scope="col">Action</th>
                                        @endrole
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
                                        <td></td>
                                        
                                    </tr>
                                @endforeach       
                                </tbody>
                                <tfoot>
                                <tr>
                                        <td colspan="2"><b><h4>Total</h4></b></td>
                                        <td><b>{{"Rp " . number_format($total_masuk,2,',','.') }}</b></td>
                                        <td><b>{{"Rp " . number_format($total_keluar,2,',','.') }}</b></td>
                                        <td><b>{{"Rp " . number_format($total,2,',','.') }}</b></td>
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
    @role('inkubator')
    <!-- Modal -->
    @endrole
</div>
<div class="row">
    <div class="card">
        {{-- <div class="card-body">{{ $between }}</div> --}}
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('theme/css/plugins/datatables.min.css')}}" />
<link href="{{ asset('theme/css/plugins/toastr.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('theme/css/plugins/sweetalert2.min.css')}}" /> 
<style>
  .container{
    margin-top:20px;
  }
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/datatables.script.min.js')}}"></script>
<script src="{{ asset('theme/js/plugins/toastr.min.js')}}"></script>
<script src="{{ asset('theme/js/script/toastr.script.min.js')}}"></script>
<script src="{{ asset('theme/js/plugins/sweetalert2.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/sweetalert2.script.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>

    $(function () {
        @if(Session::has('errors'))
            $('#inputModal').modal('show');
        @endif
        $('#names').DataTable(
            {
                "pagingType": "numbers",
                @role('tenant')
                "searching": true,
                @endrole
                @role(['mentor', 'inkubator'])
                "searching": false,
                @endrole
                "scrollX": true
            }
        );

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        CKEDITOR.replace('event');
    });
    
    // $('#btnModal').on('click', function(){
    //     $('#inputModal').modal('show');
    // });
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            autoUpdateInput: false,
            @role(['inkubator', 'mentor'])
            @endrole
            locale: {
            cancelLabel: 'Clear'
            },
        }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD MMM YYYY') + ' - ' + picker.endDate.format('DD MMM YYYY'));
        });

        $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    function getIds(checkboxName) {
        let checkBoxes = document.getElementsByName(checkboxName);
        let ids = Array.prototype.slice.call(checkBoxes)
                        .filter(ch => ch.checked==true)
                        .map(ch => ch.value);
        return ids;
    }

    function filterResults () {
        let priorityIds = getIds("tenant");
        let title = $('input[name="titles"]').val();
        let href = 'keuangan?';

        if(priorityIds.length) {
            href += 'filter[tenant]=' + priorityIds;
        }
        if(start !== ""){
            let startDate = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
            let endDate = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');

            href += '&filter[between]=' + startDate + ',' + endDate;
        }

        console.log(href);

        document.location.href=href;
    }

    document.getElementById("filter").addEventListener("click", filterResults);

    toastr.options = {
        "debug": false,
        //   "positionClass": "toast-bottom-full-width",
        "onclick": null,
        "showMethod": "slideDown",
        "hideMethod": "slideUp",
        "timeOut": 2000,
        "extendedTimeOut": 1000
    }
</script>
<script>
        var arusMasuk = <?php echo json_encode($arusMasuk)?>;
        var arusKeluar = <?php echo json_encode($arusKeluar)?>;
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
                @role('mentor')
                text: 'Grafik Keuangan Tenant yang dibimbing'
                @endrole
                @role('inkubator')
                text: 'Grafik Keuangan Seluruh Tenant'
                @endrole
            },
			grid: {
				left: '8px',
				right: '8px',
				bottom: '0',
				containLabel: true
			},
            xAxis: {
                categories: {!! json_encode($categories) !!},
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
				color: '#bcbbdd',
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
