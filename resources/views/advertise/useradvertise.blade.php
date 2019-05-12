<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng kí - Người quảng cáo</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">


    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href='{{ asset("css/VH.css") }}' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/LogoAdvertiser.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="useradvertise" method="post" onsubmit="return onclick_TestReg();">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input id="reg-username" type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập">
                        </div>
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input id="reg-password" type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input id="reg-repassword" type="password" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="reg-email" type="email" name="email" class="form-control" placeholder="Nhập Email">
                        </div>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input id="reg-name" type="text" name="name"class="form-control" placeholder="Nguyễn Văn A">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <input id="reg-gender" type="radio" name="gender" value="Nam">Nam
                            <input id="reg-gender" type="radio" name="gender" value="Nữ">Nữ
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input id="reg-phone" type="text" name="phone_number" class="form-control" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Đồng ý
                                <a href="{{url('dieukhoan')}}" target="_blank">Điều khoản hợp đồng</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" >Đăng kí</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Bạn đã có tài khoản ? <a href="{{url('/advertiselogin')}}"> Đăng nhập</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(session('verify'))
    <script>
        window.onload=function(){alert('Chúng tôi đã gửi liên kết để xác nhận tài khoản vào email của bạn. Bấm vào để xác nhận. Kiểm tra hộp thư rác nếu bạn không thấy mail trong hộp thư chính.');}
    </script>
    @endif


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
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
            if(input.value != ""){
                input.classList.remove("vh-border-red");
                RemoveNoti(input);
                return true;
            } 
            else {
                input.classList.add("vh-border-red");
                if(input.nextElementSibling == null)
                    input.insertAdjacentElement("afterend",CreateNoti("Không được để trống"));
                return false;
            } 
        }
        function TestPassword(pass){
            if(pass.value.length >= 8){
                pass.classList.remove("vh-border-red");
                RemoveNoti(pass);
                return true;
            } else {
                pass.classList.add("vh-border-red");
                if(pass.nextElementSibling == null)
                    pass.insertAdjacentElement("afterend",CreateNoti("Password phải 8 kí tự trở lên"));
                return false;
            }
        }
        function TestPhone(phone){
            var patphone = /^0[35789]\d{8}$/g;
            if(patphone.test(phone.value)) {
                phone.classList.remove("vh-border-red");
                RemoveNoti(phone);
                return true;
            } 
            else {
                phone.classList.add("vh-border-red");
                if(phone.nextElementSibling == null)
                    phone.insertAdjacentElement("afterend",CreateNoti("Điện thoại không đúng đinh dạng"));
                return false;
            } 
        }
        function TestEmail(email){
            var patemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
            if(patemail.test(email.value)){
                email.classList.remove("vh-border-red");
                RemoveNoti(email);
                return true;
            } 
            else {
                email.classList.add("vh-border-red");
                if(email.nextElementSibling == null)
                    email.insertAdjacentElement("afterend",CreateNoti("Email không đúng đinh dạng"));
                return false;
            } 
        }
        function CreateNoti(str){
            var div = document.createElement("DIV");
            div.classList.add("vh-tiny","vh-text-red");
            div.innerText = str;
            return div;
        }
        function RemoveNoti(inp){
                var parent = inp.parentElement;
                if(inp.nextElementSibling != null)
                    parent.removeChild(inp.nextElementSibling);
        }
        function TestRePassword(pass, repass){
            if(pass.value != repass.value){
                repass.classList.add("vh-border-red");
                if(repass.nextElementSibling == null)
                    repass.insertAdjacentElement("afterend",CreateNoti("Password không trùng khớp"));
                return false;
            } 
            else {
                repass.classList.remove("vh-border-red");
                RemoveNoti(repass);
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
            TestPassword(document.getElementById("reg-password"));
        }
        function onblur_repassword(){
            TestRePassword(document.getElementById("reg-password"),document.getElementById("reg-repassword"));
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
                email.focus();
            }
            if(!TestRePassword(pwd,repwd)){
                notErr = false;
                repwd.focus();
            }
            if(!TestPassword(pwd)){
                notErr = false;
                pwd.focus();
            }
            if(!TestInput(username)){
                notErr = false;
                username.focus();
            }
            return notErr;
        }
    </script>

</body>

</html>
