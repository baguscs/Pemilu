<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" /> --}}
    {{-- <link rel="icon" type="image/png" href="assets/img/favicon.png" /> --}}
    <link rel="icon" href="{{ asset('images/pemilu.ico') }}">
    <title>Vote Page | PEMILU 2020</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>

    <meta name="keywords" content="wizard, bootstrap wizard, creative tim, long forms, 3 step wizard, sign up wizard, beautiful wizard, long forms wizard, wizard with validation, paper design, paper wizard bootstrap, bootstrap paper wizard">
    <meta name="description" content="Paper Bootstrap Wizard is a fully responsive wizard that is inspired by our famous Paper Kit  and comes with 3 useful examples and 5 colors.">

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
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css"> --}}


    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
  
    <!-- End Google Tag Manager (noscript) -->
    <div class="image-container set-full-height" style="background-image: linear-gradient(to bottom right, red, yellow);">
        <!--   Creative Tim Branding   -->
        <a href="https://creative-tim.com">
             <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('images/ico.jpg') }}">
                </div>
                <div class="brand">
                   PEMILU 2020
                </div>
            </div>
        </a>

        <!--  Made With Paper Kit  -->
       {{--  <a href="https://demos.creative-tim.com/paper-kit" class="made-with-pk">
            <div class="brand">PK</div>
            <div class="made-with">Made with <strong>Paper Kit</strong></div>
        </a>
 --}}
        <!--   Big container   -->

        <div class="container" >

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                            {{-- <form action="{{ route('voting', auth::user()->pengguna->id) }}" method="post">
                                @csrf --}}
                                
                        <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
                                
                            <div class="alert alert-success" role="alert" style="margin: 10px; margin-top: 110px">
							  <h4 class="alert-heading">Terima Kasih, {{auth::user()->pengguna->nama}}!</h4>
							  <p>Hak Suara Sudah Terkirim Ke KPUD, Terima kasih Telah Menggunakan Hak Suara Anda Dan Tidak Golput Dalam Pemilu ini. Silahkan Logout Untuk Menyelesaikan Prosedural.</p>
							  <hr>	
							  <p><a style="font-size: 13px; margin-left: 600px" href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                     	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                                 </p>
							</div>
                            {{-- </form> --}}
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center" style="font-size: 15px">
                PEMILU ONLINE &copy; 2020 <b>Version: </b> 1.0
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
