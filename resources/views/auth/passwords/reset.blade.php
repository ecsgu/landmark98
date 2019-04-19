@extends('layouts.app')

@section('content')

@if(session('success'))
    <div>
    {{session('success')}}
    </div>
    <form method="post" action="{{url('resetpassword')}}">
    @csrf
    <input type="hidden" value="{{session('account')->username}}" id="username" name="username" >
    @if(session('error'))
        <div>
        {{session('error')}}
        </div>
    @endif
    Mã bảo mật:<input type="text" id="code" name="code"><br>
    Mật khẩu mới:<input type="password" id="password" name="password"><br>
    Nhập lại mật khẩu:<input type="password" id="password1" name="password1"><br>
    <input type="submit">
    </form>

    <form method="post" action="email">
    <input type="hidden" value="{{session('account')->email}}" id="email" name="email" >
    <input type="submit" value="Không nhận được email?">
    </form>
@else
<form method="post" action="email">
    @csrf
    @if(session('error'))
        <div>
        {{session('error')}}
        </div>
    @endif
    <input type="email" id="email" name="email">
    <input type="submit">
</form>
@endif
@endsection
