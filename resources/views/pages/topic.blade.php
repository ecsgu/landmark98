@extends('layouts.master')

@section('Container')
    <div class="user-main">
        <div class="vh-card-4 vh-round vh-padding vh-margin-top">
            <!-- User post -->
            <div class="vh-row">
                <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{ asset('upload\defaultCus.jpg') }}" width="40px"> </div>
                <div class="vh-col l11 m10 s10">
                    <a href="#">Trương Vĩ Huy</a>
                    <div class="vh-small vh-text-gray">1/4/2019</div>
                </div>
            </div>
            <!-- Caption -->
            <div class="vh-margin-top">Caption</div>
            <!-- Image -->
            <img src="{{ asset('upload\defaultCus.jpg') }}" width="100%" />
            <!-- Comments -->
            <div class="vh-padding">
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{Session::get('account')->customer->image}}" width="40px"></div>
                    <div class="vh-col l11 m10 s10">
                        <textarea onfocus="this.attributes['rows'].value = 3" onblur="this.attributes['rows'].value = 1" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=1></textarea>
                    </div>
                </div>
                <div class="vh-row vh-margin-top">
                    <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{ asset('upload\defaultCus.jpg') }}" width="40px"></div>
                    <div class="vh-col l11 m10 s10">
                        <a href="#">Trí Nhân</a> 
                        Ahihi
                        <div class="vh-small vh-text-gray">1/4/2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection