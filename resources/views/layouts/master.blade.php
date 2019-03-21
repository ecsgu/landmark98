<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landmark 98</title>
        <link href="{{ asset('css/VH.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
    <div class="vh-container vh-safety-blue vh-bar">
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="50px"></a></div>
        <label class="vh-switch-round vh-right vh-margin">
            <input type="checkbox">
            <span class="vh-switch-slider" onclick="checknightmode();"></span>
        </label>
    </div>
    
		<!-- Container -->
    @yield('Container')
		<!-- Footter -->
    </body>
    <script>
      function checknightmode(){
          var nig = document.getElementById('main');
          nig.classList.toggle('night-mode');
      }
    </script>
</html>