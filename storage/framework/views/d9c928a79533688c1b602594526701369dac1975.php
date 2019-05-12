<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landmark 98</title>
        <link href="<?php echo e(asset('css/VH.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('css/Hau.css')); ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo e(asset('js/VH.js')); ?>" type="text/javascript"></script>
        <link href="<?php echo e(asset('logo.ico')); ?>" rel="shortcut icon">
        <style>
            body{
                height: 80%;
            }
        </style>
    </head>
    <body style="background-color: #e9ebee" id="main"> 
    <!-- Header -->
        <div class="vh-container vh-bar vh-safety-blue vh-faster">
            <div class="vh-bar-item"><a href="<?php echo e(asset('')); ?>"><img src="<?php echo e(asset('logo.ico')); ?>" width="65px"></a></div>
            <!-- Đăng nhập -->
            <form method="post" action="<?php echo e(url('/login')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="vh-right">
                    <div class="vh-bar-item">
                        <div class="vh-small ">Tên đăng nhập</div>
                        <input id="username" style="height: 35px" type="text" class="form-control vh-round-medium" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                        <?php if($errors->has('fail')): ?>
                            <div style="color:red;" class="vh-small">
                                <strong><?php echo e($errors->first('fail')); ?></strong>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="vh-bar-item">
                        <div class="vh-small">Mật khẩu</div>
                        <input id="password" style="height: 35px" type="password" class="form-control vh-round-medium" name="password" required>
                        <div class="vh-small">
                            <a class="vh-small" href="<?php echo e(asset('password/reset')); ?>">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <div class="vh-bar-item vh-margin-top">
                        <input type="submit" class="vh-button vh-border vh-safety-blue vh-hover-blue vh-round-medium" value="Đăng nhập"/>
                    </div>
                </div>
            </form>
        </div>
        <?php echo $__env->yieldContent('Container'); ?>
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
            if(!TestRePassword(pwd,repwd)){
                notErr = false;
                previous.click();
                repwd.focus();
            }
            if(!TestPassword(pwd)){
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
</html><?php /**PATH C:\xampp\htdocs\landmark98\resources\views/layouts/app.blade.php ENDPATH**/ ?>