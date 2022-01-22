<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    {{-- <link rel="icon" type="image/png" href="assets/img/favicon.png" /> --}}
    <link rel="icon" href="{{ asset('images/pemilu.ico') }}">
    <title>Vote Page | PEMILU 2020</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>

    <meta name="keywords" content="wizard, bootstrap wizard, creative tim, long forms, 3 step wizard, sign up wizard, beautiful wizard, long forms wizard, wizard with validation, paper design, paper wizard bootstrap, bootstrap paper wizard">
    <meta name="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Bootstrap Wizard by Creative Tim">
    <meta itemprop="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Bootstrap Wizard by Creative Tim">
    <meta name="twitter:description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="Paper Bootstrap Wizard by Creative Tim | Free Boostrap Wizard" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/paper-bootstrap-wizard/wizard-list-place.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/49/opt_pbw_thumbnail.jpg" />
    <meta property="og:description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors." />
    <meta property="og:site_name" content="Creative Tim" />

    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/paper-bootstrap-wizard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    </head>

    <body>
     
    <div class="image-container set-full-height" style="background-image: url('images/login.png');">
        <!--   Creative Tim Branding   -->
        <a href="https://creative-tim.com">
             <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('images/ico.jpg') }}">
                </div>
                <div class="brand">
                   PEMILU 2019
                </div>
            </div>
        </a>

        <div class="container" >

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                            <form action="{{ route('voting', auth::user()->pengguna->id) }}" method="post">
                                @csrf
                                
                                 @if ($messege = Session::get("pesan"))
                                <div class="alert alert-danger" role="alert" style="font-size: 15px; margin: 10px">
                                 {{ Session::get("pesan") }}
                                </div>
                                @endif
                                <div class="wizard-header text-center" style="border-radius: 10px">
                                    <h1 class="wizard-title">Surat Suara</h3>
                                    <p class="category">Tentukan Pilihanmu Demi Kemajuan Bangsa.</p>
                                </div>

                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                    </div>
                                    <ul style="font-size: 13px">
                                        <li>
                                            <a href="#personal" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-folder"></i>
                                                </div>
                                                Data Diri
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#pilih_camat" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-user"></i>
                                                </div>
                                                Pilih Camat
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#pilih_lurah" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-user"></i>
                                                </div>
                                                Pilih Lurah
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="personal">
                                        <div class="row" style="font-size: 17px">
                                            <h5 class="info-text" style="font-size: 20px; margin-left: 30px"> Informasi Data Diri Anda.</h5>
                                            
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group" >
                                                    <label>Nama</label>
                                                    <input name="nama" style="font-size: 15px" type="text" class="form-control" value="{{auth::user()->pengguna->nama}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Asal Desa</label>
                                                    <input name="desa" style="font-size: 15px" type="text" class="form-control" value="{{auth::user()->pengguna->desa->desa}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <input name="jkl" style="font-size: 15px" type="text" class="form-control" value="{{auth::user()->pengguna->jkl}}" readonly="">
                                                </div>
                                            </div>
                                            <p class="info-text" style="font-size: 20px; margin-left: 30px">Masukkan Data Anda</p>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>NIK <small>(penting)</small></label>
                                                    <input name="nik" style="font-size: 15px"  autocomplete="off" required="" type="number" class="form-control" placeholder="Nomor Induk Keluarga">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Kode Akses <small>(penting)</small></label>
                                                    <input name="kode" required="" style="font-size: 15px"  autocomplete="off" type="text" class="form-control" placeholder="Kode Akses">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="pilih_camat">
                                        <div class="row" style="font-size: 15px">     
                                        <div class="col-sm-12">
                                               <h5 class="info-text" style="font-size: 20px; margin-top: 10px"> Kadidat Camat </h5>
                                            </div>                                                  
                                               <div class="row row-cols-1 row-cols-md-2" style="margin: 10px">
                                                @foreach ($camat as $file)                                         
                                                  <div class="col mb-4">
                                                    <div class="card">
                                                      <img src="{{ asset('images/camat/'. $file->foto) }}" class="card-img-top" alt="..." height="250px">
                                                      <div class="card-body">
                                                        <h5 class="card-title">Nomor Urut : {{$file->norut}}</h5>
                                                        <p class="card-text">{{$file->nama}}</p>
                                                      </div>
                                                    </div>
                                                  </div>
                                             @endforeach
                                            </div>
                                             <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group mb-3">
                                                      <label>Tentukan Pilihan Anda</label>
                                                      <select required="" style="font-size: 100px; width: 800px; height: 100px" class="custom-select" id="camat" name="camat" aria-label="Example select with button addon">
                                                        <option disabled="" selected="">Silahkan Pilih</option>
                                                        @foreach ($camat as $item)
                                                        <option style="font-size: 100px" value="{{$item->id}}">Nomor Urut : {{$item->norut}} || {{$item->nama}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="pilih_lurah">
                                        <div class="row" style="font-size: 15px">     
                                        <div class="col-sm-12">
                                               <h5 class="info-text" style="font-size: 20px; margin-top: 10px"> Kadidat Lurah </h5>
                                            </div>                                                  
                                               <div class="row row-cols-1 row-cols-md-2" style="margin: 10px">
                                                @foreach ($lurah as $data)                                         
                                                  <div class="col mb-4">
                                                    <div class="card">
                                                      <img src="{{ asset('images/lurah/'. $data->foto) }}" class="card-img-top" alt="..." height="250px">
                                                      <div class="card-body">
                                                        <h5 class="card-title">Nomor Urut : {{$data->norut}}</h5>
                                                        <p class="card-text">{{$data->nama}}</p>
                                                      </div>
                                                    </div>
                                                  </div>
                                             @endforeach
                                            </div>
                                             <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group mb-3">
                                                      <label>Tentukan Pilihan Anda</label>
                                                      <select required="" style="font-size: 100px; width: 800px; height: 100px" class="custom-select" id="lurah" name="lurah" aria-label="Example select with button addon">
                                                        <option disabled="" selected="">Silahkan Pilih</option>
                                                        @foreach ($lurah as $row)
                                                        <option style="font-size: 100px" value="{{$row->id}}">Nomor Urut : {{$row->norut}} || {{$row->nama}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' style="width: 100%; height: 30px; border-radius: 10px; font-size: 13px" class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Lanjut' />
                                        <input type='submit' style="width: 100%; height: 30px; border-radius: 10px; font-size: 13px" class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' style="width: 100%; height: 30px; border-radius: 10px; font-size: 13px" class='btn btn-previous btn-danger btn-wd  ' name='previous' value='Mundur' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center" style="font-size: 15px">
                PEMILU ONLINE &copy; 2019 <b>Version: </b> 1.0
            </div>
        </div>
        <div class="fixed-plugin">
            <div class="dropdown" style="margin-top: 20px">
                <a href="#" data-toggle="dropdown" style="font-size: 15px; border-radius: 10px" class="btn btn-warning">
                    {{auth::user()->pengguna->nama}}
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="font-size: 15px">
                           <i class="fas fa-sign-out-alt"> Logout</i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/paper-bootstrap-wizard.js') }}" type="text/javascript"></script>

    <!--  More information about jquery.validate here: https://jqueryvalidation.org/     -->
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $("#camat").select2({
         allowClear: true
       });
        $("#lurah").select2({
         allowClear: true
       });
    </script>

</html>
