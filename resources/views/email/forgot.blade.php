<!DOCTYPE html>
<html>
<head>
	<link href="{{ asset('css/VH.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Hau.css') }}">
    <link href="{{ asset('logo.ico') }}" rel="shortcut icon">
</head>
<body>
	<div class="vh-row vh-border-bottom vh-padding">
		<div class="vh-col l1">
			<a href="{{ asset('') }}"><img src="{{ asset('logo.ico') }}" width="80%"></a>
		</div>
		<div class="vh-col l11 vh-right-bar">
			<h3 class="vh-text-blue vh-xlarge"><b>LandMark 98 Xin chào</b></h3>
		</div>
	</div>
	<div class="vh-row">
		<p>Xin chào {{$customer->name}}</p>
		<p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu LandMark của bạn.</p>
		<p>Bạn có thể nhập mã bảo mật sau đây để đặt lại mật khẩu</p>
		<div class="vh-col l1 vh-border vh-yellow">
			<b>{{$code}}</b>
		</div>
	</div>
</body>
</html>
