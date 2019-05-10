@extends('layouts.app')

@section('Container')

@if(session('success'))
    <div>
    {{session('success')}}
    </div>
    <div class="vh-container vh-margin-bottom vh-padding-xlarge">
        <form method="post" action="{{url('resetpassword')}}" id="gui" class="vh-padding-xlarge"></form>
        <form method="post" action="email" id="email"></form>
        <div class=" vh-border vh-round-medium vh-white">
            <div class="vh-padding-small vh-padding vh-row vh-border-bottom">
                <h3><b>Xin mời bạn đặt lại mật khẩu</b></h3>
            </div>
            @csrf
            <input type="hidden" value="{{session('account')->username}}" id="username" name="username" form="gui">
            <div class="vh-row vh-margin-top">
                <div class="vh-col l3 vh-padding vh-large">Mã bảo mật:</div>
                <div class="vh-col l6">
                    <input class="vh-input-small vh-border vh-round-medium vh-hover-border-blue" type="text" name="code" id="code" placeholder="Nhập mã" form="gui">
                </div>
                @if(session('error_code'))
                <div class="vh-col l3">
                    {{session('error_code')}}
                </div>
                @endif
            </div>   
            <div class="vh-row vh-margin-top"> 
                <div class="vh-col l3 vh-padding vh-large">Mật khẩu mới:</div>
                <div class="vh-col l6">
                    <input class="vh-input-small vh-border vh-round-medium vh-hover-border-blue" type="password" id="password" name="password" placeholder="Nhập Mật khẩu" form="gui">
                </div>
                <div class="vh-col-l3">
                </div>
            </div>
            <div class="vh-row vh-margin-top">
                <div class="vh-col l3 vh-padding vh-large">Nhập lại mật khẩu:</div>
                <div class="vh-col l6">
                    <input class="vh-input-small vh-border vh-round-medium vh-hover-border-blue" type="password" id="repassword" name="repassword" placeholder="Nhập lại Mật khẩu" form="gui">
                </div>
                @if(session('error_repassword'))
                <div class="vh-col l3"> 
                {{session('error_repassword')}}
                </div>
            @endif
            </div>
            <div class="vh-row vh-margin-top">
                &nbsp
            </div>
            <div  style="background-color: #e9ebee" class="vh-padding-2xlarge vh-row vh-border-top vh-bar">
                <div class="vh-col l7"> 
                &nbsp
                </div>
                <div class="vh-col l5 vh-center">
                    <input type="submit" class="vh-button vh-blue vh-border" value="Gửi" form="gui">
                    <input type="hidden" value="{{session('account')->email}}" id="email" name="email" form="email">
                    <input class="vh-button vh-border vh-white" type="submit" form="email" value="Không nhận được email?">
                </div>
            </div>
        </div>
    </div>
@else
<div class="vh-padding-xlarge">
    <form method="post" action="email" class="vh-padding-xlarge">
    @csrf
        <div class=" vh-border vh-round-medium vh-white">
            <div class="vh-padding-small vh-padding vh-row vh-border-bottom">
                <h3><b>Tìm tài khoản của bạn</b></h3>
            </div>
            <div class="vh-padding-2xlarge vh-row">
                <div>
                    <h6><b>Vui lòng nhập email để tìm kiếm tài khoản.</b></h6>
                </div>
                <div>
                    <input class="vh-input-small vh-round vh-border" type="email" id="email" name="email" placeholder="email">
                </div>
            </div>
            <div class="vh-padding-2xlarge vh-row">
                @if(session('error'))
                <div>
                {{session('error')}}
                </div>
                @else
                <div>
                    &nbsp
                </div>
                @endif
            </div>
            <div style="background-color: #e9ebee" class="vh-padding-2xlarge vh-row vh-border-top vh-bar">
                <div class="vh-col l9"> 
                &nbsp
                </div>
                <div class="vh-col l3 vh-center">
                    <button type="submit" class="vh-button vh-blue vh-border"><b>Tìm kiếm</b></button>
                    <input type="button" onclick="location.href='..'" value="Hủy" class="vh-button vh-border vh-white">
                </div>
            </div>
        </div>
    </form>
</div>
@endif
@endsection
