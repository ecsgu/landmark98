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
          .warring{

          }
          
        </style>
    </head>
    <body id="main"> 
    <!-- Header -->
    <div class="vh-container vh-bar vh-top vh-safety-blue vh-faster" id="navbar" style="z-index:4">
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="40px"></a></div>
    </div>
    <!-- Container -->
    <div class="vh-container vh-margin-bottom" style="margin-top:70px;">
            <div class="vh-row-padding">
                <div class="vh-col l6 vh-center">
                    <img class="vh-image" src="{{asset('upload/vh.jpg')}}">
                </div>
            <div class="vh-col l6 tablink" id="tab1">
                <div class="vh-row vh-margin-top">
                   <h2>Đăng Kí</h2> 
                </div>
                <div class="vh-row">
                   <h4>Miễn phí cho mọi người</h4> 
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Tên đăng nhập:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="username" placeholder="Nhập Tên Đăng Nhập">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Mật khẩu:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="Password" name="password" placeholder="Nhập Mật khẩu">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Nhập lại mật khẩu:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="Password" name="repasswork" placeholder="Nhập Lại Mật khẩu">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Email:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="Email" placeholder="Nhập Email">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-display-container vh-margin-top">
                    <button class="vh-button vh-border vh-round-medium vh-safety-blue vh-display-middle vh-margin-top vh-hover-blue"onclick="openTab('tab2')">Tiếp theo >></button>
                </div>
            </div>
            <div class="vh-col l6 tablink" id="tab2" style="display:none">
                    <div class="vh-row vh-margin-top">
                       <h2>Xin mời nhập thông tin cá nhân</h2> 
                    </div>
                    <div class="vh-row">
                        <h4>Thông tin của bạn sẽ được bảo mật</h4> 
                    </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Họ và tên:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="username" placeholder="Nhập Họ và Tên">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Giới tính:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="Password" name="repasswork" placeholder="Nhập Lại Mật khẩu">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l4 vh-padding">
                        Ngày sinh:
                    </div>
                    <div class="vh-col l6">
                        <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="Email" placeholder="Nhập Email">
                    </div>
                    <div class="vh-col l2">
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l6">
                        <button class="vh-button vh-border vh-round-medium vh-red vh-margin-top vh-hover-blue vh-right"onclick="openTab('tab1')"><< Quay Lại</button>
                    </div>
                    <div class="vh-col l6">
                        <button class="vh-button vh-border vh-round-medium vh-safety-blue vh-margin-top vh-hover-blue">Đăng kí</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            function openTab(cityName) {
              var i;
              var x = document.getElementsByClassName("tablink");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              document.getElementById(cityName).style.display = "block";  
            }
        </script>
    </body>
</html>

