<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landmark 98</title>
        <link href="{{ asset('css/VH.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/Animation.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="{{ asset('js/VH.js') }}" type="text/javascript"></script>
        <link href="{{ asset('logo.ico') }}" rel="shortcut icon">
        <style>
          body{
            background-color:black;
            color:white;
          }
        </style>
    </head>
    <body> 
    <!-- Header -->
    <div class="vh-container vh-safety-blue">
        <div class="vh-margin" href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="50px"></div>
          
    </div>
		<!-- Container -->
    @yield('Container')
		<!-- Footter -->
    </body>
</html>