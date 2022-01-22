<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Error | PEMILU 2020</title>
    <!-- Favicon-->
    {{-- <link rel="icon" href="../../favicon.ico" type="image/x-icon"> --}}
    <link rel="icon" href="{{ asset('images/pemilu.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code" style="font-size: 100px">Halaman Dicekal</div><br>
        <div class="error-message">Maaf Hak Suara Anda Telah Digunakan Pada : {{auth::user()->pengguna->updated_at}}</div>
        <div class="button-place">
            <a href="{{ route('logout') }}" style="width: 50%" class="btn btn-block btn-danger btn-lg waves-effect" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>
</body>

</html>