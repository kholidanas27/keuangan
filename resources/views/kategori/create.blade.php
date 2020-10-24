@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Buat Kategori Baru</div>
                <div class="card-body">
                    <form action="{{ route('inkubator.kategori.create') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="category" placeholder="Enter Name Kategori">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a href="{{ route('inkubator.berita') }}" class="btn btn-danger">Kembali</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">

            <div class="card">
                <div class="card-header">Daftar Kategori</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berita_category as $kategori)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kategori->category }}</td>
                            <td>
                                <a href="{{ route('inkubator.kategori.edit', $kategori) }}"
                                    class="btn btn-success btn-sm mr-2 edit" style="float:left;">Edit</a>
                                <a href="{{ route('inkubator.kategori.destroy', $kategori) }}"
                                    class="btn btn-danger btn-sm delete" style="float:left;">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

    $('.delete').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Apa Anda Yakin Menghapus ?',
            type: 'warning',
            showCancelButton:true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Hapus',
            cancelButtontext: 'Batal',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function(value){
            if (value){
                window.location.href = url;
            }
        });
    });
</script>

@endsection