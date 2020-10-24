@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/inkubator/event/{{ $event->slug }}/edit" method="post" autocomplete="off" enctype="multipart/form-data">
            @method('patch')
            @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{ old('title') ?? $event->title }}">
          </div>
          <div class="form-group">
            <label for="foto">File</label>
            <div class="input-group mb-3">
              <div class="custom-file">
                <label class="custom-file-label" for="foto">Choose file</label>
                  <input class="custom-file-input" id="foto" type="file"  name="foto" onchange="preview_image(event)" accept="image/*" />
              </div>
            </div>
          </div>
          <div class="wrapper">
            <img id="output_image" class="img-fluid" src="{{ asset("storage/" . $event->foto) }}" alt="{{ $event->slug }}">
          </div>
          <div class="form-group">
            <label for="event">Event</label>
            <textarea name="event" id="event" class="form-control">{{ old('event') ?? $event->event }}</textarea>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="tgl_mulai">Tanggal Mulai :</label>
              <div class="input-group">
                <input type="date" name="tgl_mulai" class="form-control" value="{{ $event->tgl_mulai->toDateString() }}">
                <input type="time" name="waktu_mulai" class="form-control" value="{{ $event->waktu_mulai->toTimeString() }}">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="tgl_selesai">Tanggal Selesai</label>
              <div class="input-group">
                <input type="date" name="tgl_selesai" class="form-control" value="{{ $event->tgl_selesai->toDateString() }}">
                <input type="time" name="waktu_selesai" class="form-control" value="{{ $event->waktu_selesai->toTimeString() }}">
              </div>
            </div>
          </div>
          <div class="row">
          <div class="form-group col-md-6">
            <label for="priority">Priority</label>
            <select class="form-control" name="priority_id" id="priority_id">
              <option value="0">--!!--</option>
              @foreach ($priority as $prio)
                  <option value="{{ $prio->id }}" {{ $event->priority_id == $prio->id ? ' selected' : '' }}>{{ $prio->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="publish">Publish</label>
            <select name="publish" class="form-control" id="publish">
              <option value="1" {{ $event->publish == 1 ? ' selected ' : '' }}>Publish</option>
              <option value="0" {{ $event->publish == 0 ? ' selected ' : '' }}>Draft</option>
            </select>
          </div>
        </div>
          <br>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
</div>
@endsection
 @section('css')
     <style>
    #wrapper
      {
      text-align:center;
      margin:0 auto;
      padding:0px;
      width:995px;
      }
    #output_image
      {
      max-width:300px;
      }
      </style>
 @endsection

@section('js')
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('event');

      $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

    function preview_image(event) 
    {
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    }
</script>
  </script>
@endsection