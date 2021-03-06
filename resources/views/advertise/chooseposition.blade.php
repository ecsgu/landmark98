@extends('layouts.advertise')

@section('Container')
<style>
    img{cursor:auto!important;}
    .area{display:block;cursor:pointer }
    </style>
    <div class="vh-row">
        <div class="vh-col l12 m12 s12 vh-jumbo vh-center">
            Đăng kí quảng cáo
        </div>
        <div class="vh-col l12 m12 s12 vh-pale-red vh-leftbar vh-border-red vh-padding-large">
            Hãy nhấp vào vị trí khung muốn chọn để quảng cáo
        </div>
    </div>
    <div>
        <img src="{{ asset('upload/topic.png') }}" usemap="#adtopic" />
        <map name="adtopic">
            <area class="area" shape="rect" href="{{ url('advertiseregister','1') }}" coords="15,0,260,285" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','2') }}" coords="780,0,1030,285" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','3') }}" coords="15,285,260,600" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','4') }}" coords="780,285,1030,600" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','5') }}" coords="270,285,780,520" >
        </map>
        <div class="vh-pale-yellow vh-padding-large vh-center vh-leftbar vh-border-yellow">
            <div>Vị trí 1: {{$Position->find(1)->price}}</div>
            <div>Vị trí 2: {{$Position->find(2)->price}}</div>
            <div>Vị trí 3: {{$Position->find(3)->price}}</div>
            <div>Vị trí 4: {{$Position->find(4)->price}}</div>
            <div>Vị trí 5: {{$Position->find(5)->price}}</div>
        </div>
    </div>
    <div>
        <img src="{{ asset('upload/post.png') }}" usemap="#adpost" />
        <map name="adpost">
            <area class="area" shape="rect" href="{{ url('advertiseregister','6') }}" coords="15,60,260,365" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','7') }}" coords="790,60,1045,365" >
        </map>
        <div class="vh-pale-yellow vh-padding-large vh-center vh-leftbar vh-border-yellow">
            <div>Vị trí 6: {{$Position->find(6)->price}}</div>
            <div>Vị trí 7: {{$Position->find(7)->price}}</div>
        </div>
    </div>
    <div>
        <img src="{{ asset('upload/wall.png') }}" usemap="#adwall" />
        <map name="adwall">
            <area class="area" shape="rect" href="{{ url('advertiseregister','8') }}" coords="15,50,260,355" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','9') }}" coords="790,50,1045,355" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','10') }}" coords="15,360,260,600" >
            <area class="area" shape="rect" href="{{ url('advertiseregister','11') }}" coords="790,360,1045,600" >
        </map>
        <div class="vh-pale-yellow vh-padding-large vh-center vh-leftbar vh-border-yellow">
            <div>Vị trí 8: {{$Position->find(8)->price}}</div>
            <div>Vị trí 9: {{$Position->find(9)->price}}</div>
            <div>Vị trí 10: {{$Position->find(10)->price}}</div>
            <div>Vị trí 11: {{$Position->find(11)->price}}</div>
        </div>
    </div>
@endsection