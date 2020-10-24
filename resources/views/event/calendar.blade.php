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
				 @endrole
				 @role('tenant')
				 <a href="{{route('tenant.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
				 @endrole
				 @role('mentor')
				 <a href="{{route('mentor.event-list')}}"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Receipt"></i></button></a>
				 @endrole
				 <a href="#"><button class="btn btn-primary custom-btn btn-sm"><i class="i-Calendar-4"></i></button></a>
				</div>
			  </div>
			</div>
			@role('inkubator')
			<div class="card-body">
				<div class="create_event_wrap">
					<ul class="list-group" id="external-events">
						<li class="list-group-item bg-success fc-event">
							Proposal
						</li>
						<li class="list-group-item bg-primary fc-event">
							Pra Start Up
						</li>
						<li class="list-group-item bg-warning fc-event">
							Start Up
						</li>
						<li class="list-group-item bg-danger fc-event">
							Scale Up
						</li>
					</ul>
					<p>
						<input id="drop-remove" type="checkbox" />
						<label for="drop-remove">centang saat anda yakin</label>
					</p>
				</div>
			</div>
			@endrole
		</div>
	</div>
	<div class="col-md-9">
		<div class="response"></div>
		<div class="card mb-4 o-hidden">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>
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
					<input type="text" name="title" class="form-control" id="title" placeholder="title" required>
					@error('title')
						<div class="mt-2 text-danger">
						{{ $message }}
						</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="foto">Foto</label>
					<div class="input-group mb-3" image-preview>
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
					<textarea name="event" id="event" class="form-control"></textarea>
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
@endsection
@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('theme/css/plugins/calendar/fullcalendar.min.css')}}" />
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
<script src="{{ asset('theme/js/plugins/calendar/jquery-ui.min.js')}}"></script>
<script src="{{ asset('theme/js/plugins/calendar/moment.min.js')}}"></script>
<script src="{{ asset('theme/js/plugins/calendar/fullcalendar.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
$(document).ready(function () {
	@if(Session::has('errors'))
		$('#inputModal').modal('show');
	@endif

	$(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
	CKEDITOR.replace('event');
	
/* initialize the external events
			-----------------------------------------------------------------*/
function initEvent() {
  $('#external-events .fc-event').each(function () {
	// store data so the calendar knows to render an event upon drop
	$(this).data('event', {
	  title: $.trim($(this).text()),
	  // use the element's text as the event title
	  color: $(this).css('background-color'),
	  stick: true, // maintain when user navigates (see docs on the renderEvent method)
	  @role('inkubator')
	  url: null //"{{ route('inkubator.event.create') }}",
	  @endrole  
	}); // make the event draggable using jQuery UI
	$(this).draggable({
	  zIndex: 999,
	  revert: true,
	  // will cause the event to go back to its
	  revertDuration: 0 // original position after the drag

	});
  });
}



initEvent();
/* initialize the calendar
-----------------------------------------------------------------*/

var newDate = new Date(),
	date = newDate.getDate(),
	month = newDate.getMonth(),
	year = newDate.getFullYear();

$('#calendar').fullCalendar({
	
  header: {
	left: 'prev,next today',
	center: 'title',
	right: 'month,agendaWeek,agendaDay'
  },
  themeSystem: "bootstrap4",
  droppable: true,
  editable: true,
  eventLimit: true,
  // allow "more" link when too many events
  drop: function (date, jsEvent, ui) {
	// 
  },
  events: [
	  @foreach($event as $e){
		id: "{{ $e->id }}",
		title: "{{ $e->title }}",
		start: "{{ $e->tgl_mulai }}",
		end: "{{ $e->tgl_selesai }}",
		@if ($e->priority_id == 1)
			color: "#4caf50",
		@endif
		@if ($e->priority_id == 2)
			color: "#663399",
		@endif
		@if ($e->priority_id == 3)
			color: "#ffc107",
		@endif
		@if ($e->priority_id == 4)
			color: "#f44336",
		@endif
		url : "{{ $e->slug }}",
	  },
	  @endforeach
  ],
  eventClick: function(event){
	
	var priority_id = 1;

	if (event.title == "Proposal") {
		priority_id = 1;
	} 
	if(event.title == "Pra Start Up") {
		priority_id = 2;
	} 
	if(event.title == "Start Up") {
		priority_id = 3;
	} 
	if(event.title == "Scale Up"){
		priority_id = 4;
	}

	if(event.url == null){
		$('#tgl_mulai').val(event.start.format());
		
		if(event.end == null){
			$('#tgl_selesai').val(event.start.format());
		} else {
			$('#tgl_selesai').val(event.end.subtract(1, "days").format());
		}
		$('#priority_id').val(priority_id);
		$('#inputModal').modal('show');
	  }
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
