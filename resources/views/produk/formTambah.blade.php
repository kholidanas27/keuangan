@extends('layouts.app')
@section('css')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<style type="text/css">
* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 10%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #produk:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #bisnis:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #canvas:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #image:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar #kintel:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar #team:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar #riset:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar #sertifikasi:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar #ijin:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar #finish:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 0px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #673AB7
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #673AB7
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    .input-container {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      width: 100%;
      margin-bottom: 15px;
    }

    .icon {
      padding: 10px;
      background: #402060;
      color: white;
      min-width: 50px;
      text-align: center;
    }

    .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
    }

    .input-field:focus {
      border: 2px solid #402060;
    }

    /* Set a style for the submit button */
    .btn {
      background-color: #402060;
      color: white;
      padding: 15px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 1;
    }
</style>

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <div class="container">
                <h2 id="heading">Form Tambah Produk</h2>
                <p>mohon isi data produk dengan sebenar-benarnya</p>
                <form id="msform" action="{{ route('tenant.storeProduk') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="produk"><strong>Detail Produk</strong></li>
                        <li id="bisnis"><strong>Bisnis</strong></li>
                        <li id="canvas"><strong>Canvas</strong></li>
                        <li id="image"><strong>Image</strong></li>
                        <li id="kintel"><strong>Kekayaan Intelektual</strong></li>
                        <li id="team"><strong>Team</strong></li>
                        <li id="riset"><strong>Riset</strong></li>
                        <li id="sertifikasi"><strong>Sertifikasi</strong></li>
                        <li id="ijin"><strong>Ijin</strong></li>
                        <li id="finish"><strong>Finish</strong></li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Detail Produk</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 10</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <div class="input-container">
                                                    <i class="fas fa-user-tie icon"></i>
                                                    <input class="form-control" type="text" placeholder="Username" name="title">
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-money-bill-wave-alt icon"></i>
                                                    <input class="form-control" name="harga_pokok" type="text" placeholder="Harga Pokok" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-money-bill-wave-alt icon"></i>
                                                    <input class="form-control" name="harga_jual" type="text" row="3" placeholder="Harga Jual" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-phone-alt icon"></i>
                                                    <input class="form-control" name="contact" type="text" placeholder="No Telphone" />
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select name="tag" class="form-control custom-select" required>
                                                            <option value="0">Tag</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select name="kategori" class="form-control custom-select" required>
                                                            <option value="0">Kategori</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-container">
                                                    <textarea class="form-control" name="subtitle" rows="2" placeholder="Subtitle"></textarea>
                                                </div>
                                                <div class="input-container">
                                                    <textarea class="form-control" name="location" rows="3" placeholder="Location"></textarea>
                                                </div>
                                                <div class="input-container">
                                                    <textarea class="form-control" name="address" rows="5" placeholder="Address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Uploda Proposal</label><br>
                                                    <input type="file" name="proposal" value="{{ old('proposal') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="ul-widget__body">
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="spesifikasi" type="text" placeholder="Spesifikasi" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keterbaharuan" type="text" placeholder="Keterbaharuan" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="manfaat" type="text" placeholder="Manfaat" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Keunggulan" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="teknologi" type="text" placeholder="Teknologi" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="pengembangan" type="text" placeholder="Pengembangan" />
                                                    </div>
                                                    <div class="input-container">
                                                        <textarea class="form-control" name="latar_produk" rows="4" placeholder="Latar Produk"></textarea>
                                                    </div>
                                                    <div class="input-container">
                                                        <textarea class="form-control" name="tentang_produk" rows="7" placeholder="Tentang Produk"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Pandangan Produk</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Bisnis</h5>
                            <div class="row">
                                <div class="col-xl-12 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <div class="input-container">
                                                    <i class="fas fa-user-tie icon"></i>
                                                    <input class="form-control" type="text" placeholder="Kompetitor" name="kompetitor">
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-money-bill-wave-alt icon"></i>
                                                    <input class="form-control" name="target_pasar" type="text" placeholder="Target Pasar" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-money-bill-wave-alt icon"></i>
                                                    <input class="form-control" name="produksi_harga" type="text" row="3" placeholder="Harga Produksi" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="dampak_sosek" type="text" placeholder="Dampak Sosek" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="pemasaran" type="text" placeholder="Pemasaran" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Produk Canva</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Canvas</h5>
                            <div class="row">
                                <div class="col-xl-12 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <textarea name="editor1"></textarea>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Kategori" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Tanggal" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Foto Produk</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Image</h5>
                            <div class="form-group">
                                <label for="foto">Upload Foto</label><br>
                                <input type="file" name="foto" value="{{ old('foto') }}" required>
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Kekayaan Intelektual</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 5 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Tabel KI</h5>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Jenis Kekayaan Intelektual" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="keterbaharuan" type="text" placeholder="Status Kekayaan Intelektual" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="manfaat" type="text" placeholder="Permohonan" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="keunggulan" type="text" placeholder="Sertifikat" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="ul-widget__body">
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Berlaku Mulai" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Berlaku Sampai" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Pemilikan Kekayaan Intelektual" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Produk Team</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 6 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Team</h5>
                            <div class="col-xl-12 col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="ul-widget__body">
                                            <div class="form-group" hidden>
                                                <label>Tenant Id :</label>
                                                   <div class="input-group">
                                                    <input type="text" class="form-control" name="tenant_id" value="0" required>
                                                   </div>
                                            </div>
                                            <div class="form-group" hidden>
                                                <label>Inventor Id :</label>
                                                   <div class="input-group">
                                                    <input type="text" class="form-control" name="inventor_id" value="0" required>
                                                   </div>
                                            </div>
                                            <div class="form-group" hidden>
                                                <label>Priority Id :</label>
                                                   <div class="input-group">
                                                    <input type="text" class="form-control" name="priority_id" value="0" required>
                                                   </div>
                                            </div>
                                            <div class="form-group">
                                                <label>User Id :</label>
                                                <div class="input-group">
                                                    <select name="user_id" class="form-control custom-select" required>
                                                         <option value="">Pilih</option>
                                                        @foreach ($user_id as $row)
                                                            <option value="{{ $row->user_id }}">{{ $row->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" hidden>
                                                <label>Produk Id :</label>
                                                   <div class="input-group">
                                                    <input type="text" class="form-control" name="produk_id" value="0" required>
                                                   </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="jabatan" class="form-control custom-select" required>
                                                        <option value="0">Jabatan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select name="divisi" class="form-control custom-select" required>
                                                        <option value="0">Divisi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-container">
                                                <i class="fas fa-align-justify icon"></i>
                                                <input class="form-control" name="tugas" type="text" placeholder="Tugas" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Kelengkapan Riset Produk</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 7 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Riset</h5>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Nama Riset" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="keterbaharuan" type="text" placeholder="Pelaksana" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="manfaat" type="text" placeholder="Tahun" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="keunggulan" type="text" placeholder="Pendanaan" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="keunggulan" type="text" placeholder="Skema" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="ul-widget__body">
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Nilai" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Aktifitas" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Tujuan" />
                                                    </div>
                                                    <div class="input-container">
                                                        <i class="fas fa-align-justify icon"></i>
                                                        <input class="form-control" name="keunggulan" type="text" placeholder="Hasil" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Sertifikasi Produk</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 8 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Sertifakasi</h5>
                            <div class="row">
                                <div class="col-xl-12 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Jenis Sertifikat" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Pemberi Sertifikat" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Status" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Tahun" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Tanggal" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Uploda Dokumen</label><br>
                                                    <input type="file" name="proposal" value="{{ old('proposal') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Ijin Produk</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 9 - 10</h2>
                                </div>
                            </div>
                            <h5>Input Table Ijin</h5>
                            <div class="row">
                                <div class="col-xl-12 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__body">
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Jenis Ijin" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Pemberi Ijin" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Status" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Tahun" />
                                                </div>
                                                <div class="input-container">
                                                    <i class="fas fa-align-justify icon"></i>
                                                    <input class="form-control" name="spesifikasi" type="text" placeholder="Tanggal" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Uploda Dokumen</label><br>
                                                    <input type="file" name="proposal" value="{{ old('proposal') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div class="card mb-4">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 10 - 10</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>Pastikan data produk telah terisi dengan benar !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div><br>
                        </div>
                    </fieldset>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script type="text/javascript">
//tooltip
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

//multi step form
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});

CKEDITOR.replace( 'editor1' );
</script>
@endsection
