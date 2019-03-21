<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landmark 98</title>
        <link href="{{ asset('css/VH.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="{{ asset('js/VH.js') }}" type="text/javascript"></script>
        <link href="{{ asset('logo.ico') }}" rel="shortcut icon">
        <style>
          .night-mode{
            background-color:black;
            color:white;
          }
        </style>
    </head>
    <body id="main"> 
    <!-- Header -->
    <div class="vh-container vh-bar vh-top vh-safety-blue vh-faster" id="navbar" style="z-index:4">
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="40px"></a></div>
        <div class="vh-bar-item vh-right" style="margin:8px 16px;"><span class="glyphicon glyphicon-triangle-bottom"></span></div>
        <label class="vh-switch-round vh-right" style="margin:8px 16px;">
            <input type="checkbox">
            <span class="vh-switch-slider" onclick="checknightmode();"></span>
        </label>
    </div>
    <!-- Container -->
    <div class="vh-container" style="margin-top:70px;">
    @yield('Container')
    </div>
    <script>
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("navbar").style.top = "0";
        } else {
          document.getElementById("navbar").style.top = "-68px";
        }
        prevScrollpos = currentScrollPos;
      }
      function checknightmode(){
        var nig = document.getElementById('main');
        nig.classList.toggle('night-mode');
      }
    </script>
    </body>
</html>
