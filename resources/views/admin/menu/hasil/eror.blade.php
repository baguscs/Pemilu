<!DOCTYPE html>
<html lang="en">
 <head> 
  <title>404 Page Not Faound</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> 
  <!-- font files --> 
  <link rel="icon" href="{{ asset('images/pemilu.ico') }}">
  <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" /> 
  <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" /> 
  <!-- /font files --> 
  <!-- css files --> 
  <link href="{{ asset('css/style2.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- /css files --> 
  <!-- js files --> 
  <!-- /js files --> 
 </head>
 <body> 
  <div class="container demo-2"> 
   <div class="content"> 
    <div id="large-header" class="large-header"> 
     <center><h1 class="header-w3ls">Halaman Eror !!!</h1></center> 
     <p class="w3-agileits1">Oops!</p> 
     <canvas id="demo-canvas"></canvas> 
     <img src="{{ asset('images/owl.gif') }}" alt="flashy" class="w3l" /> 
     <h2 class="main-title">404</h2> 
     <p class="w3-agileits2">Halaman Hasil Pemilu Belum Dibuka</p> 
     <p class="btn"><button onclick="history.back(-1)" style="width: 550px; height: 40px" type="button" class="btn bg-red waves-effect">Back</button></p>
    </div> 
   </div> 
  </div> 
  <!-- js files --> 
  <script src="{{ asset('js/rAF.js') }}"></script> 
  <script src="{{ asset('js/demo-2.js') }}"></script> 
  <!-- /js files -->  
 </body>
</html>