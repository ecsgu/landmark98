<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landmark 98</title>
        <link href="{{ asset('css/VH.css') }}" rel="stylesheet" type="text/css"/>
        <script src="{{ asset('js/VH.js') }}" type="text/javascript"></script>
        <link href="{{ asset('logo.ico') }}" rel="shortcut icon">
        <style>
            body{
                height: 80%;
            }
        </style>
    </head>
    <body id="main"> 
    <!-- Header -->
    <div class="vh-container vh-bar vh-top vh-safety-blue vh-faster">
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="40px"></a></div>
    </div>
    <!-- Container -->
    <div class="vh-container vh-margin-bottom" style="margin-top:70px;">
        <div class="vh-row-padding">
            <!-- Image -->
            <div class="vh-col l6 vh-center"><img class="vh-image" src="{{ asset('logo.ico') }}"></div>
            <!-- Phần nhập thông tin -->
            <div class="vh-col l6">
                <!-- Tab 1 -->
                <form action="" method="post">
                <div class="tablink" id="tab1">
                    <div class="vh-row vh-margin-top vh-xxlarge">Đăng Kí</div>
                    <div class="vh-row vh-large"><i>Miễn phí cho mọi người</i></div>
                    <!-- Tên đăng nhập -->
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Tên đăng nhập:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="username" placeholder="Nhập Tên Đăng Nhập">
                        </div>
                    </div>
                    <!-- Nhập mật khẩu -->
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Mật khẩu:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="Password" name="password" placeholder="Nhập Mật khẩu">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Nhập lại mật khẩu:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="Password" name="repasswork" placeholder="Nhập Lại Mật khẩu">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Email:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="Email" placeholder="Nhập Email">
                        </div>
                    </div>
                    <div class="vh-row vh-display-container vh-margin-top">
                        <button class="vh-button vh-border vh-round-medium vh-safety-blue vh-display-middle vh-margin-top vh-hover-blue"onclick="openTab('tab2')">Tiếp theo >></button>
                    </div>
                </div>
                <!-- Tab 2 -->
                <div class="tablink" id="tab2" style="display:none">
                    <div class="vh-row vh-margin-top vh-xxlarge">Thông tin cá nhân</div>
                    <div class="vh-row vh-large"><i>Thông tin của bạn sẽ được bảo mật</i></div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Họ và tên:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="username" placeholder="Nhập Họ và Tên">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Giới tính:</div>
                        <div class="vh-col l6">
                            <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" type="radio" name="Gender" value="Nam"> Nam
                            <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" type="radio" name="Gender" value="Nữ"> Nữ
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Số điện thoại:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="Phone_number" placeholder="Nhập Số điện thoại">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l6">
                            <button class="vh-button vh-border vh-round-medium vh-red vh-margin-top vh-hover-blue vh-right" onclick="openTab('tab1')"><< Quay Lại</button>
                        </div>
                        <div class="vh-col l6">
                            <button class="vh-button vh-border vh-round-medium vh-safety-blue vh-margin-top vh-hover-blue">Đăng kí</button>
                        </div>
                    </div>
                </div>
                </form>
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