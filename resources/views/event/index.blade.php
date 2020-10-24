@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="card mb-4">
			<div class="card-header container-fluid">
			  <div class="row">
				<div class="col-md-8">
                    <h3>Event</h3>
				</div>
				<div class="col-md-4 btn-group">
                    @role('inkubator')
                    <a href="{{route('inkubator.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
                    <a href="{{route('inkubator.event-calendar')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Calendar-4"></i></button></a>
                    @endrole
                    @role('tenant')
                    <a href="{{route('tenant.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
                    <a href="{{route('tenant.event-calendar')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Calendar-4"></i></button></a>
                    @endrole
                    @role('mentor')
                    <a href="{{route('mentor.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
                    <a href="{{route('mentor.event-calendar')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Calendar-4"></i></button></a>
                    @endrole
				</div>
			  </div>
            </div>
            @role('inkubator')
			<div class="card-body">
				<div class="create_event_wrap">
                    <button class="btn btn-outline-primary btn-block"data-toggle="modal" data-target="#inputModal">Tambah Event</button>
				</div>
            </div>
            @endrole
        </div>

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
                    <label for="search">Pencarian</label>
                    <div class="input-group">
                        <input type="text" name="titles" class="form-control" placeholder="search" value="{{ $title != null ? $title : null }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="daterange">Rentang tanggal</label>
                    <input type="text" name="daterange" class="form-control" placeholder="set tanggal" 
                    @if($exp != '')
                        value="{!! \Carbon\Carbon::parse($exp['0'])->format('d M Y') !!} - {!! \Carbon\Carbon::parse($exp['1'])->format('d M Y') !!}"
                    @endif
                    >
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    @foreach ($priority as $item)
                        <label class="checkbox checkbox-success">
                            <input type="checkbox" name="priority" value="{{ $item->id }}"
                                @if (in_array($item->id, explode(',', request()->input('filter.priority'))))
                                    checked
                                @endif
                            /><span>{{ $item->name }}</span><span class="checkmark"></span>
                        </label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="publish">Status</label>
                    <label class="checkbox checkbox-primary">
                        <input type="checkbox" value="1" name="publish"
                        @if (in_array('1', explode(',', request()->input('filter.publish'))))
                            checked
                        @endif
                        /><span>Published</span><span class="checkmark"></span>
                    </label>
                    <label class="checkbox checkbox-warning">
                        <input type="checkbox" value="0" name="publish"
                        @if (in_array('0', explode(',', request()->input('filter.publish'))))
                            checked
                        @endif
                        /><span>Draft</span><span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group">
                    <button id="filter" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>
        @endrole
	</div>
	<div class="col-md-9">
        <div id="task-manager-list">
            <!--  content area -->
            <div class="content"> 
                <!--  task manager table -->
                <div class="card" id="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered custom-sm-width table-striped" id="names" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Event Description</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Latest Update</th>
                                        
                                        @role('inkubator')
                                        <th scope="col">Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- --------------------------- table row -------------------------------------------->
                                    @foreach ($event as $key => $item)
                                    <tr>
                                        <th class="head-width" scope="row">{{ $event->firstItem() + $key }}</th>
                                        <td class="collection-item">
                                            @role('inkubator')
                                            <div class="font-weight-bold"><a href="/inkubator/event/{{ $item->slug }}">{{ $item->title }}</a></div>
                                            @endrole
                                            @role('mentor')
                                            <div class="font-weight-bold"><a href="/inkubator/event/{{ $item->slug }}">{{ $item->title }}</a></div>
                                            @endrole
                                            @role('tenant')
                                            <div class="font-weight-bold"><a href="/tenant/event/{{ $item->slug }}">{{ $item->title }}</a></div>
                                            @endrole
                                            <div class="text-muted">{!! Str::limit($item->event, 50) !!}</div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="btn-group">
                                                @if ( $item->priority->id == 1 )
                                                <button class="btn btn-primary custom-btn btn-sm" type="button" aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @elseif( $item->priority->id == 2 )
                                                <button class="btn btn-danger custom-btn btn-sm" type="button" aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @elseif( $item->priority->id == 3 )
                                                <button class="btn btn-warning custom-btn btn-sm" type="button" aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @else
                                                <button class="btn btn-info custom-btn btn-sm" type="button" aria-haspopup="true" aria-expanded="false">
                                                    {{ $item->priority->name }}
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>{{ $item->tgl_mulai->format("d M Y") }}</span></div><br>
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Clock"></i><span>{{ $item->waktu_mulai->format("H:i") }}</span></div>
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>{{ $item->tgl_selesai->format("d M Y") }}</span></div><br>
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Clock"></i><span>{{ $item->waktu_selesai->format("H:i") }}</span></div>
                                        </td>
                                        <td class="custom-align">
                                            {!! $item->publish == 1 ? '<button class="btn btn-sm btn-primary">Published</button>' : '<button class="btn btn-sm btn-warning">Draft</button>' !!}
                                        </td>
                                        <td class="custom-align">
                                            <div class="d-inline-flex align-items-center calendar align-middle"><i class="i-Calendar-4"></i><span>{{ $item->updated_at->format("d M Y") }}</span></div>
                                        </td>
                                        
                                        @role('inkubator')
                                        <td><a class="ul-link-action text-success" href="/inkubator/event/{{ $item->slug }}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a><a class="ul-link-action text-danger mr-1 hapus"  href="/inkubator/event/{{ $item->slug }}/delete" data-toggle="tooltip" data-placement="top" title="Want To Delete !!!"><i class="i-Eraser-2"></i></a>
                                        @endrole
                                    </tr>
                                    @endforeach
                                </tbody>
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
    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form input modal -->
                    <form action="{{ route('inkubator.event.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="title" required>
                            @error('title')
                                <div class="mt-2 text-danger">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="input-group mb-3 image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn">
                                    <!-- image-preview-clear button -->
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Clear
                                    </button>
                                    <!-- image-preview-input -->
                                    <div class="btn btn-default image-preview-input">
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                        <span class="image-preview-input-title">Browse</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="foto"/> <!-- rename it -->
                                    </div>
                                </span>
                            </div>
                            @error('foto')
                            <div class="mt-2 text-danger">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="event">Event</label>
                            <textarea name="event" id="event" required class="form-control"></textarea>
                            @error('event')
                            <div class="mt-2 text-danger">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tgl_mulai">Tanggal Mulai :</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" required>
                                    <input type="time" name="waktu_mulai" class="form-control" id="waktu_mulai" required>
                                </div>
                                @error('tgl_mulai')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('waktu_mulai')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tgl_selesai">Tanggal Selesai</label>
                                <div class="input-group">
                                    <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" required>
                                    <input type="time" name="waktu_selesai" class="form-control" id="waktu_selesai" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="priority">Priority</label>
                                <select class="form-control" name="priority_id" id="priority_id">
                                    @foreach ($priority as $prio)
                                        <option value="{{ $prio->id }}">{{ $prio->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="publish">Publish</label>
                                <select name="publish" class="form-control" id="publish">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
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
            @if($exp != null)
                startDate: '{!! \Carbon\Carbon::parse($exp['0'])->format('m d Y') !!}',
                endDate: '{!! \Carbon\Carbon::parse($exp['1'])->format('m d Y') !!}',
            @endif
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
        let priorityIds = getIds("priority");
        let title = $('input[name="titles"]').val();
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
<script>
$(document).on('click', '#close-preview', function(){ 
  $('.image-preview').popover('hide');
  // Hover befor close the preview
  $('.image-preview').hover(
      function () {
          $('.image-preview').popover('show');
      }, 
        function () {
          $('.image-preview').popover('hide');
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
  $('.image-preview').popover({
      trigger:'manual',
      html:true,
      title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
      content: "There's no image",
      placement:'bottom'
  });
  // Clear event
  $('.image-preview-clear').click(function(){
      $('.image-preview').attr("data-content","").popover('hide');
      $('.image-preview-filename').val("");
      $('.image-preview-clear').hide();
      $('.image-preview-input input:file').val("");
      $(".image-preview-input-title").text("Browse"); 
  }); 
  // Create the preview image
  $(".image-preview-input input:file").change(function (){     
      var img = $('<img/>', {
          id: 'dynamic',
          width:250,
          height:200
      });      
      var file = this.files[0];
      var reader = new FileReader();
      // Set preview image into the popover data-content
      reader.onload = function (e) {
          $(".image-preview-input-title").text("Change");
          $(".image-preview-clear").show();
          $(".image-preview-filename").val(file.name);            
          img.attr('src', e.target.result);
          $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
      }        
      reader.readAsDataURL(file);
  });  
});
</script>
@endsection
