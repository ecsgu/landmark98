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
				<a href="{{ asset('') }}"><img src="{{ asset('logo.png') }}" width="80%"></a>
			</div>
			<div class="vh-col l11 vh-right-bar">
				<h3 class="vh-text-blue vh-xlarge"><b>LandMark 98 Xin chào</b></h3>
			</div>
		</div>
		<div class="vh-row">
			<p>Xin chào {{$customer->name}},</p>
			<p>Rất hân hạnh được chào đón bạn đến với Landmark98.</p>
			<p>Hãy nhấp vào đường dẫn phía dưới để xác nhận rằng bạn đã đăng ký </p>
			<div class="vh-col l1 vh-border vh-yellow">
				<b>{{url('advertise/verify',[$customer->id,$code])}}</b>
			</div>
			<p>Xin cảm ơn.</p>
			<p>Trân trọng.</p>
		</div>
	</body>
</html>
