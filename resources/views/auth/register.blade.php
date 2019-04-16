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
        <div class="vh-bar-item"><a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="65px"></a></div>
        <!-- Đăng nhập -->
        <form method="post" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="vh-right">
                <div class="vh-bar-item">
                    <div class="vh-small ">Tên đăng nhập</div>
                    <input id="username" style="height: 35px" type="text" class="form-control vh-round-medium" name="username" value="{{ old('username') }}" required autofocus>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="vh-bar-item">
                    <div class="vh-small">Mật khẩu</div>
                    <input id="password" style="height: 35px" type="password" class="form-control vh-round-medium" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="vh-small">
                        <a class="vh-small" href="#">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="vh-bar-item vh-margin-top">
                    <input type="submit" class="vh-button vh-border vh-safety-blue vh-hover-blue vh-round-medium" value="Đăng nhập"/>
                </div>
            </div>
        </form>
    </div>
    <!-- Container -->
    <div class="vh-container vh-margin-bottom" style="margin-top:100px;">
        <div class="vh-row-padding">
            <!-- Image -->
            <div class="vh-col l6 vh-center"><img style="width: 750px; height: 500px;" class="vh-image" src="{{ asset('City10.png') }}"></div>
            <!-- Phần nhập thông tin -->
            <div class="vh-col l6 =">
                <!-- Tab 1 -->
                <form action="{{ url('register') }}" method="post" onsubmit="return onclick_TestReg();">
                <div class="vh-tab-content vh-show" id="tab1">
                    <div class="vh-row vh-margin-top vh-xxlarge">Đăng Kí</div>
                    <div class="vh-row vh-large"><i>Miễn phí cho mọi người</i></div>
                    <!-- Tên đăng nhập -->
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Tên đăng nhập:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" id="reg-username" type="text" name="username" placeholder="Nhập Tên Đăng Nhập">
                        </div>
                    </div>
                    <!-- Nhập mật khẩu -->
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Mật khẩu:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" id="reg-password" type="Password" name="password" placeholder="Nhập Mật khẩu">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Nhập lại mật khẩu:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" id="reg-repassword" type="Password" name="repassword" placeholder="Nhập Lại Mật khẩu">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Email:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" id="reg-email" type="text" name="email" placeholder="Nhập Email">
                        </div>
                    </div>
                    <div class="vh-row vh-display-container vh-margin-top">
                        <div id="next" class="vh-button vh-border vh-round-medium vh-red vh-hover-safety-blue vh-display-middle vh-margin-top vh-hover-blue" onclick="openTab('tab2')">Tiếp theo >> </div>
                    </div>
                </div>
                <!-- Tab 2 -->
                <div class="vh-tab-content vh-hide" id="tab2">
                    <div class="vh-row vh-margin-top vh-xxlarge">Thông tin cá nhân</div>
                    <div class="vh-row vh-large"><i>Thông tin của bạn sẽ được bảo mật</i></div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Họ và tên:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" id="reg-name" type="text" name="name" placeholder="Nhập Họ và Tên" />
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Giới tính:</div>
                        <div class="vh-col l6 vh-center">
                            <div class="vh-col l3">
                                <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" id="reg-gender" type="radio" name="gender" value="Nam" /> Nam
                            </div>
                            <div class="vh-col l3">
                                <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" id="reg-gender" type="radio" name="gender" value="Nữ" /> Nữ
                            </div>
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large">Số điện thoại:</div>
                        <div class="vh-col l6">
                            <input class="vh-input vh-border vh-round-medium vh-hover-border-blue" id="reg-phone" type="text" name="phone_number" placeholder="Nhập Số điện thoại" />
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l4 vh-padding vh-large"></div>
                        <div class="vh-col l6">
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l6">
                            <div class="vh-button vh-border vh-round-medium vh-red vh-margin-top vh-hover-safety-blue vh-right" id="previous" onclick="openTab('tab1')"> << Quay lại </div>
                        </div>
                        <div class="vh-col l6">
                            <input type="submit" class="vh-button vh-border vh-round-medium vh-safety-blue vh-margin-top vh-hover-blue" value="Đăng Kí" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Init Register
        document.getElementById("reg-username").addEventListener("keypress", keypress_username);
        document.getElementById("reg-password").addEventListener("keypress", keypress_password);
        document.getElementById("reg-repassword").addEventListener("keypress", keypress_repassword);
        document.getElementById("reg-email").addEventListener("keypress", keypress_email);
        document.getElementById("reg-name").addEventListener("keypress", keypress_name);
        document.getElementById("reg-gender").addEventListener("keypress", keypress_gender);
        document.getElementById("reg-phone").addEventListener("keypress", keypress_phone);
        document.getElementById("reg-username").addEventListener("blur", onblur_username);
        document.getElementById("reg-password").addEventListener("blur", onblur_password);
        document.getElementById("reg-repassword").addEventListener("blur", onblur_repassword);
        document.getElementById("reg-email").addEventListener("blur", onblur_email);
        document.getElementById("reg-name").addEventListener("blur", onblur_name);
        document.getElementById("reg-gender").addEventListener("blur", onblur_gender);
        document.getElementById("reg-phone").addEventListener("blur", onblur_phone);
        function TestInput(input){
            if(input.value == "" || input.value == null){
                input.classList.add("vh-border-red");
                return false;
            } 
            else {
                input.classList.remove("vh-border-red");
                return true;
            } 
        }
        function TestPhone(phone){
            var patphone = /^0[35789]\d{8}$/g;
            if(patphone.test(phone.value)) {
                phone.classList.remove("vh-border-red");
                return true;
            } 
            else {
                phone.classList.add("vh-border-red");
                return false;
            } 
        }
        function TestEmail(email){
            var patemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
            if(patemail.test(email.value)){
                email.classList.remove("vh-border-red");
                return true;
            } 
            else {
                email.classList.add("vh-border-red");
                return false;
            } 
        }
        function TestPassword(pass, repass){
            if(pass.value != repass.value){
                repass.classList.add("vh-border-red");
                return false;
            } 
            else {
                repass.classList.remove("vh-border-red");
                return true;
            } 
        }
        function keypress_username(){
            if(event.keyCode == 13){
                event.preventDefault();
                document.getElementById("reg-password").focus();
            }
        }
        function keypress_password(){
            if(event.keyCode == 13){
                event.preventDefault();
                document.getElementById("reg-repassword").focus();
            }
        }
        function keypress_repassword(){
            if(event.keyCode == 13){
                event.preventDefault();
                document.getElementById("reg-email").focus();
            }
        }
        function keypress_email(){
            if(event.keyCode == 13){
                event.preventDefault();
                document.getElementById("next").click();
                document.getElementById("reg-name").focus();
            }
        }
        function keypress_name(){
            if(event.keyCode == 13){
                event.preventDefault();
                document.getElementById("reg-gender").focus();
            }
        }
        function keypress_gender(){
            if(event.keyCode == 13){
                event.preventDefault();
                document.getElementById("reg-phone").focus();
            }
        }
        function keypress_phone(){
            if((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 13){
                event.preventDefault();
                TestPhone(document.getElementById("reg-name"));
            }
        }
        function onblur_username(){
            TestInput(document.getElementById("reg-username"));
        }
        function onblur_password(){
            TestInput(document.getElementById("reg-password"));
        }
        function onblur_repassword(){
            TestPassword(document.getElementById("reg-password"),document.getElementById("reg-repassword"));
        }
        function onblur_email(){
            TestEmail(document.getElementById("reg-email"));
        }
        function onblur_name(){
            TestInput(document.getElementById("reg-name"));
        }
        function onblur_gender(){
            TestInput(document.getElementById("reg-gender"));
        }
        function onblur_phone(){
            TestPhone(document.getElementById("reg-phone"));
        }
        function onclick_TestReg(){
            var username = document.getElementById("reg-username");
            var pwd = document.getElementById("reg-password");
            var repwd = document.getElementById("reg-repassword");
            var email = document.getElementById("reg-email");
            var name = document.getElementById("reg-name");
            var gender = document.getElementById("reg-gender");
            var phone = document.getElementById("reg-phone");
            var previous = document.getElementById("previous");
            var notErr = true;
            if(!TestPhone(phone)){
                notErr = false;
                phone.focus();
            }
            if(!TestInput(gender)){
                notErr = false;
                gender.focus();
            }
            if(!TestInput(name)){
                notErr = false;
                name.focus();
            }
            if(!TestEmail(email)){
                notErr = false;
                previous.click();
                email.focus();
            }
            if(!TestPassword(pwd,repwd)){
                notErr = false;
                previous.click();
                repwd.focus();
            }
            if(!TestInput(pwd)){
                notErr = false;
                previous.click();
                pwd.focus();
            }
            if(!TestInput(username)){
                notErr = false;
                previous.click();
                username.focus();
            }
            return notErr;
        }
    </script>
    </body>
</html>