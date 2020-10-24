@extends('layouts.app')
@section('content')
<form action="{{ route('inkubator.storeBerita') }}" method="post" enctype="multipart/form-data" >
@csrf
	<div class="row"> 
		<div class="col-xl-8 col-lg-8">
			<div class="card">
				<div class="card-header container-fluid">
	  				<div class="row">
						<div class="col-md-10">
		  					<h3>Berita</h3>
						</div>
	  				</div>
				</div>
				<div class="card-body">
					<div class="ul-widget__body">
						<div class="form-group">
	            			<label>Judul :</label>
	            			<div class="input-group">
	                			<input type="text" class="form-control" name="tittle" value="{{ old('tittle') }}" required>
	            			</div>
						</div>
						<div class="form-group">
							<label for="desc">Isi Berita :</label>
							<textarea name="berita" id="berita" class="form-control" required>{{ old('berita') }}</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4">
			<div class="card mb-4">
				<div class="card-header container-fluid">
					<h3>Lainnya</h3>
				</div>	
				<div class="card-body">
					<div class="ul-widget__body">
						<div class="form-group">
                            <label>Kategori :</label>
                            <div class="input-group">
                                <select name="berita_category_id" class="form-control custom-select" required>
                                 	<option value="">Pilih</option>
                                    @foreach ($kategori_berita as $row)
                                        <option value="{{ $row->id }}">{{ $row->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <div class="input-group">
                                <select name="publish" class="form-control custom-select" required>
                                 	<option value="">Pilih</option>
                                 	<option value="1">Publish</option>
                                 	<option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label>Penulis :</label>
	           				<div class="input-group">
								<select name="author_id" class="form-control custom-select" required>
                                 	<option value="">Pilih</option>
                                    @foreach ($penulis as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
	           				</div>
						</div>
						<div class="form-group" hidden>
							<label>View :</label>
	           				<div class="input-group">
								<input type="text" class="form-control" name="views" value="0" required>
	           				</div>
						</div>
                        <div class="form-group">
                            <label>Dapat dibaca oleh :</label>
                            <div class="input-group">
                                <select name="inkubator_id" class="form-control" required>
                                 	<option value="">Pilih</option>
                                 	<option value="0">Umum / Semua orang</option>
                                    @foreach ($inkubator as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label for="foto">Foto</label><br>
							<input type="file" name="foto" value="{{ old('foto') }}" required>
		        		</div>
						<div class="form-group">
							<button class="btn btn-primary">Tambah</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'berita' );
</script>
@endsection