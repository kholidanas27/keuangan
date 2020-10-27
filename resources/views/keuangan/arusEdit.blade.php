@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Arus Kas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tenant.updateArus-id', $k->id )}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="control-lable">Keterangan</label>
                        <input class="form-control" type="text" value="{{ $k->keterangan }}" placeholder="Keterangan...." name="keterangan" id="keterangan">
                        {{ $errors->first('keterangan')}}
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Jenis</label>
                        <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                            <option selected="" disabled="">Pilih Jenis</option>
                            <option value="1" {{($k->jenis == 1) ? 'selected' : ''}}>Pemasukan</option>
                            <option value="0" {{($k->jenis == 0) ? 'selected' : ''}}>Pengeluaran</option>
                        </select>
                        {{ $errors->first('jenis')}}
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Jumlah</label>
                        <input class="form-control" type="text" value="{{ $k->jumlah }}" placeholder="Jumlah...." name="jumlah" id="jumlah">
                        {{ $errors->first('jumlah')}}
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Tanggal</label>
                        <input class="form-control datepicker " value="{{ $k->tanggal }}" type="text" rows="3" autocomplete="off" placeholder="Tanggal...." name="tanggal" id="datepicker">
                        {{ $errors->first('tanggal')}}
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="exampleInputFile">{{$k->foto}}</label>
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" multiple>
                        <object data="/img/keuangan/{{ $k->foto }}" width="400px"></object>
                        <input type="hidden" class="custom-file-input" id="hidden_image" name="hidden_image" value="{{ $k->foto }}">
                        {{ $errors->first('foto')}}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('tenant.keuangan') }}"><button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button></a>
                        <button class="btn btn-primary" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- end of main-content -->
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
<script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="{{asset('theme/js/plugins/sweetalert2.min.js')}}"></script>
<script src="{{asset('theme/js/scripts/sweetalert.script.js')}}"></script>
<script>
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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