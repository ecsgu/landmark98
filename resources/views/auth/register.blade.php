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
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="55px"></a></div>
        <!-- Đăng nhập -->
        <form method="post">
            <div class="vh-right">
                <div class="vh-bar-item">
                    <div class="vh-small">Tên đăng nhập</div>
                    <input type="text"/>
                </div>
                <div class="vh-bar-item">
                    <div class="vh-small">Mật khẩu</div>
                    <input type="password"/><br/>
                    <a class="vh-small" href="#">Quên mật khẩu?</a>
                </div>
                <div class="vh-bar-item vh-margin-top">
                    <input type="submit" class="vh-button vh-hover-white" value="Đăng nhập"/>
                </div>
            </div>
        </form>
    </div>
    <!-- Container -->
    <div class="vh-container vh-margin-bottom" style="margin-top:100px;">
        <div class="vh-row-padding">
            <!-- Image -->
            <div class="vh-col l6 vh-center"><img class="vh-image" src="{{ asset('logo.ico') }}"></div>
            <!-- Phần nhập thông tin -->
            <div class="vh-col l6">
                <!-- Tab 1 -->
                <form action="{{ url('register') }}" method="post">
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
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="Password" name="repassword" placeholder="Nhập Lại Mật khẩu">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Email:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="email" placeholder="Nhập Email">
                        </div>
                    </div>
                    <div class="vh-row vh-display-container vh-margin-top">
                        <div class="vh-button vh-border vh-round-medium vh-red vh-hover-safety-blue vh-display-middle vh-margin-top vh-hover-blue" onclick="openTab('tab2')">Tiếp theo >> </div>
                    </div>
                </div>
                <!-- Tab 2 -->
                <div class="tablink" id="tab2" style="display:none">
                    <div class="vh-row vh-margin-top vh-xxlarge">Thông tin cá nhân</div>
                    <div class="vh-row vh-large"><i>Thông tin của bạn sẽ được bảo mật</i></div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Họ và tên:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="name" placeholder="Nhập Họ và Tên">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Giới tính:</div>
                        <div class="vh-col l6">
                            <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" type="radio" name="gender" value="Nam"> Nam
                            <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" type="radio" name="gender" value="Nữ"> Nữ
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Số điện thoại:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" type="text" name="phone_number" placeholder="Nhập Số điện thoại">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l6">
                            <div class="vh-button vh-border vh-round-medium vh-red vh-margin-top vh-hover-safety-blue vh-right" onclick="openTab('tab1')"> << Quay lại </div>
                        </div>
                        <div class="vh-col l6">
                            <input type="submit" class="vh-button vh-border vh-round-medium vh-safety-blue vh-margin-top vh-hover-blue" value="Đăng Kí"/>
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