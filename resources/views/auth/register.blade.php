@extends('layouts.app')

@section('Container')
    <!-- Container -->
    <div class="vh-container vh-margin-bottom" style="margin-top:10px;">
        <div class="vh-row-padding">
            <!-- Image -->
            <div class="vh-col l6 m6 vh-center vh-hide-small"><img style="width: 750px; height: 500px;" class="vh-image" src="{{ asset('City10.png') }}"></div>
            <!-- Phần nhập thông tin -->
            <div class="vh-col l6 m6">
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
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
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
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
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
                            <div class="vh-col l3 m3 s3">
                                <input class="vh-radio vh-border vh-round-medium vh-hover-border-blue" id="reg-gender" type="radio" name="gender" value="Nam" /> Nam
                            </div>
                            <div class="vh-col l3 m3 s3">
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
                        <div class="vh-col l6 m6 s6">
                            <div class="vh-button vh-border vh-round-medium vh-red vh-margin-top vh-hover-safety-blue vh-right" id="previous" onclick="openTab('tab1')"> << Quay lại </div>
                        </div>
                        <div class="vh-col l6 m6 s6">
                            <input type="submit" class="vh-button vh-border vh-round-medium vh-safety-blue vh-margin-top vh-hover-blue" value="Đăng Kí" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection