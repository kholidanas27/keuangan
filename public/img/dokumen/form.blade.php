@extends('layouts.app')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Surat</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Surat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="exaple2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6"></div>
                  <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                  <form action="#" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="nama">Judul</label>
                          <input type="text" name="judul" class="form-control" placeholder="Judul" required="required">
                        </div>

                        <!-- <div class="form-group">
                          <label for="alamat">Dari</label>
                          <input type="text" name="dari" class="form-control" placeholder="Dari" required="required">
                        </div> -->
                      </div>
                      <div class="col-sm-12">
                       
                        <div class="form-group">
                          <label for="alamat">Kepada</label>
                          <input type="text" name="kepada" class="form-control" placeholder="Kepada" required="required">
                        </div>
            
                            <div class="input-title">Buat Surat</div>
                            <div class="input-group">
                              <div class="input-group-prepend"></div>
                              <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                          
                        <div class="form-group">
                          <label for="file">File</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success" type="submit" value="upload"> Comfirm</button>
                      <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
    </section>
@endsection
