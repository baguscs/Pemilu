<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Control Page | PEMILU 2020</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('images/pemilu.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

     <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

     <link href="{{ asset('plugins/waitme/waitMe.css') }}" rel="stylesheet" />

     <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="{{ asset('plugins/light-gallery/css/lightgallery.css') }}" rel="stylesheet">

    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
    @stack("css");


</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon Tunggu Sebentar...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar --> 
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar" style="color: blue">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('home') }}">
                    @if (auth::user()->pengguna->role_id == 1)
                        HALAMAN ADMIN - PEMILU 2020
                    @elseif(auth::user()->pengguna->role_id == 2)
                        HALAMAN PETUGAS - PEMILU 2020
                    @elseif(auth::user()->pengguna->role_id == 3)
                        HALAMAN PENGAWAS - PEMILU 2020
                    @endif
                        
                </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('images/pegawai/'. Auth::user()->pengguna->foto) }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->pengguna->nama}}</div>
                    <div class="email">{{Auth::user()->pengguna->no_ket}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            
                            <li><a href="{{ route('profil')}}"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="{{ route('pass') }}"><i class="material-icons">settings</i>Ganti Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <i class="material-icons">input</i>Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU NAVIGASI</li>
                    <li class="">
                        <a href="{{ route('home') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('vote') }}">
                            <i class="material-icons">book</i>
                            <span>Voters</span>
                        </a>
                    </li>
                    @if (auth::user()->pengguna->role_id == 3)
                        <li>
                        <a href="{{ route('pegawai') }}">
                            <i class="material-icons">assignment_ind</i>
                            <span>Pegawai</span>
                        </a>
                    </li>
                    @endif
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Kadidat</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{ route('camat') }}"> Camat</a>
                            </li>
                            <li>
                                <a href="{{ route('lurah') }}"> Lurah</a>
                            </li>
                        </ul>
                    </li>
                    @if (auth::user()->pengguna->role_id == 3)
                        <li>
                        <a href="{{ route('cek_vote') }}">
                            <i class="material-icons">book</i>
                            <span>Statistik dan Hasil</span>
                        </a>
                    </li>
                    @endif
                    @if (auth::user()->pengguna->role_id == 3)
                        <li>
                        <a href="{{ route('jadwal') }}">
                            <i class="material-icons">event</i>
                            <span>Jadwal</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('tps') }}">
                            <i class="material-icons">map</i>
                            <span>Tempat Pemungutan Suara</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                   PEMILU ONLINE &copy; 2020
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       
        <!-- #END# Right Sidebar -->
    </section>
    @yield('konten')

    @yield('chart')

    @yield('line')

    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>

     <script src="{{ asset('plugins/momentjs/moment.js') }}"></script>

     <script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

     <script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

      <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
     <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('js/pages/ui/dialogs.js') }}"></script>
    <script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
    <script src="{{ asset('js/pages/medias/image-gallery.js') }}"></script>
    <script src="{{ asset('js/pages/ui/tooltips-popovers.js') }}"></script>

    <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="{{ asset('plugins/light-gallery/js/lightgallery-all.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


    @stack('js')

   
</body>

</html>
