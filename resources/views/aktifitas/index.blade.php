@extends('layouts.app')
@section('content')
 <div class="content">
                        <!--  task manager table -->
                        <div class="card" id="card">
                            <div class="card-header bg-transparent ul-task-manager__header-inline">
                                <h6 class="card-title task-title">Aktifitas</h6>
                            </div>
                            <div class="card-body" id="card-body">
                                <div class="search ul-task-manager__search-inline">

                                    <label><span>Show:</span>
                                        <select>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered custom-sm-width" id="names">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Aktifitas</th>
                                                <th scope="col">Tenant</th>
                                                <th scope="col">Tanggal</th>
                                            </tr>
                                        </thead>
										                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="7">Hari Ini</th>
                                            </tr>
                                        </thead>
                                        <tbody id="names">
                                            <!-- --------------------------- tr1 -------------------------------------------->
                                            <tr id="names">
                                                <th class="head-width" scope="row">#1</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Berhasil Update User profile page</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                   PT. Daya Guna Mandiri
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>4 Oktober 2020</span></div>
                                                </td>
                                            </tr>
                                            <!-- ------------------------------ end of tr1 -------------------------------------->
                                            <!--  table row 2 -->
                                            <tr>
                                                <th scope="row">#2</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Gagal Update User profile page</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                   PT. Daya Guna Mandiri
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar"><i class="i-Calendar-4"></i><span>4 Oktober 2020</span>
                                                        <!--  <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime"> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--  end of table row 2 -->
                                        </tbody>
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="7">Kemarin</th>
                                            </tr>
                                        </thead>
                                        <tbody id="names">
                                            <!-- --------------------------- tr1 -------------------------------------------->
                                            <tr id="names">
                                                <th class="head-width" scope="row">#3</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Berhasil Upload Data Produk</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                  PT. Daya Guna Mandiri
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>3 Oktober 2020</span></div>
                                                </td>
                                            </tr>
                                            <!-- ------------------------------ end of tr1 -------------------------------------->
                                            <!--  table row 2 -->
                                            <tr>
                                                <th scope="row">#4</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Berhasil Mendaftar Sebagai Tenant</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                    PT. Daya Guna Mandiri
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar"><i class="i-Calendar-4"></i><span>3 Obtober 2020</span>
                                                        <!--  <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime"> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--  end of table row 2 -->
                                        </tbody>
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="7">2 Hari Yang Lalu</th>
                                            </tr>
                                        </thead>
                                        <!--  table row 3 -->
                                        <tbody>
                                            <tr>
                                                <th scope="row">#5</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Update User profile page</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                    PT. Agrito Sejahtera Indonesia
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar"><i class="i-Calendar-4"></i><span>2 Oktober 2020</span></div>
                                                </td>
                                            </tr>
                                            <!--  end of table row 3 -->
                                        </tbody>
										
										                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="7">3 Hari Yang Lalu</th>
                                            </tr>
                                        </thead>
                                        <!--  table row 3 -->
                                        <tbody>
                                            <tr>
                                                <th scope="row">#6</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Update User profile page</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                    PT. Agrito Sejahtera Indonesia
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar"><i class="i-Calendar-4"></i><span>1 Oktober 2020</span></div>
                                                </td>
                                            </tr>
                                            <!--  end of table row 3 -->
                                        </tbody>
										
										                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="7">4 Hari Yang Lalu</th>
                                            </tr>
                                        </thead>
                                        <!--  table row 3 -->
                                        <tbody>
                                            <tr>
                                                <th scope="row">#7</th>
                                                <td class="collection-item">
                                                    <div class="font-weight-bold"><a href="#">Update User profile page</a></div>
                                                   
                                                </td>
                                                <td class="custom-align">
                                                    PT. Agrito Sejahtera Indonesia
                                                </td>
                                                <td class="custom-align">
                                                    <div class="d-inline-flex align-items-center calendar"><i class="i-Calendar-4"></i><span>30 September 2020</span></div>
                                                </td>
                                            </tr>
                                            <!--  end of table row 3 -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row align-items-center">
                                    <div class="col"><span>Showing 1 to 25 of 25 entries</span></div>
                                    <div class="col">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  end of task manager table -->
                    </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('theme/css/plugins/datatables.min.css')}}" />
    <link href="{{ asset('theme/css/themes/lite-purple.css')}}" rel="stylesheet" />
    <link href="{{ asset('theme/css/plugins/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/fontawesome-5.css')}}" />
    <link href="{{ asset('theme/css/plugins/metisMenu.min.css')}}" rel="stylesheet" />
@endsection

@section('js')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset('theme/js/plugins/datatables.min.js')}}"></script>
<script src="{{ asset('theme/js/scripts/datatables.script.min.js')}}"></script>
    <script src="{{ asset('theme/js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('theme/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('theme/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/script.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/script_2.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/sidebar.large.script.min.js')}}"></script>
    <script src="{{ asset('theme/js/plugins/feather.min.js')}}"></script>
    <script src="{{ asset('theme/js/plugins/metisMenu.min.js')}}"></script>
    <script src="{{ asset('theme/js/scripts/layout-sidebar-vertical.min.js')}}"></script>
<script>

$(document).ready( function () {
    $('#names').DataTable(
        {
            "pagingType": "numbers",
            "searching": false
        }
    );
});
    
    $(function() {
        $('input[name="daterange"]').daterangepicker({
        opens: 'right',
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Clear'
        },
        }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
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
        let priorityIds = getIds("priority");
        let title = $('#title').val();
        let publishStats = getIds("publish");
        let start = $('input[name="daterange"]').val();

        let href = 'event?';

        if(priorityIds.length) {
            href += 'filter[priority]=' + priorityIds;
        }

        if(publishStats.length) {
            href += '&filter[publish]=' + publishStats;
        }

        if(title !== ""){
            href += '&filter[title]=' + title;
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

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
  
    $('.hapus').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
        title: 'Apa Anda Yakin Menghapus ?',
            text: "You won't be able to revert this!",
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
</script>
@endsection
