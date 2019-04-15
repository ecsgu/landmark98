@extends('layouts.master')

@section('Container')
    <div class="user-main">
        <div class="vh-row-padding">
            <div class="vh-col l3 m2 s4"><img class="vh-circle user-avatar" src="{{asset('upload\defaultCus.jpg')}}"></div>
            <div class="vh-col l9 m10 s8">
                <a class="vh-xlarge" >Trương Vĩ Huy</a>
                <div></div>
            </div>
        </div>
        <div class="vh-card-4 vh-round vh-padding vh-margin-top">
            <!-- User post -->
            <div class="vh-row">
                <div class="vh-col l1 m1 s2"><img class="vh-circle" src="{{Session::get('account')->customer->image}}" width="40px"> </div>
                <div class="vh-col l9 m9 s8 vh-text-black">
                    <textarea onfocus="this.attributes['rows'].value = 10" onblur="this.attributes['rows'].value = 3" class="vh-border-0" placeholder="Hôm nay bạn nghĩ gì?" style="width:100%" rows=3></textarea>
                </div>
                <div class="vh-col l2 m2 s2 vh-center vh-xxlarge"><span class="fas fa-image"></span></div>
            </div>
            <div class="vh-row">
                <div class="vh-button vh-col l12 m12 s12 vh-hover-safety-blue">Chia sẻ</div>
            </div>
        </div>
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
            <div class="vh-margin-top">
                Caption
            </div>
                <!-- Image -->
                <img class="vh-image" src="{{ asset('upload\defaultCus.jpg') }}" />
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
                <a href="#">Xem thêm</a>
            </div>
    </div>
@endsection