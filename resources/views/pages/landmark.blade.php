
@extends('layouts.master')

@section('Container')
    <div class="vh-row-padding">
        <!-- Quảng cáo bên trái -->
        <div class="vh-col l3 m3 vh-hide-small">
            <div>
                <h4 class="vh-center"> Thông báo </h4>
                <div class="danger">Tòa nhà cháy rồi ahihi :v</div>
                <div class="warring">Lầu 3,4 cúp nước</div>
                <div class="info">Đề nghị bà con giữ gìn vệ sinh chung</div>
            </div>
            <div class="vh-margin-top">
                <img class="vh-image" src="{{ asset('upload/1.PNG') }}"/>
            </div>
            <div class="vh-margin-top">
                <img class="vh-image" src="{{ asset('upload/2.PNG') }}"/>
            </div>
        </div>
        <!-- Bài post -->
        <div class="vh-col l6 m6 s12">
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m3 s3"><img class="vh-circle" src="{{Session::get('account')->customer->image}}" width="40px"> </div>
                    <div class="vh-col l9 m7 s7 vh-text-black">
                        <textarea onfocus="this.attributes['rows'].value = 10" onblur="this.attributes['rows'].value = 3" class="vh-border-0" placeholder="Hôm nay bạn nghĩ gì?" style="width:100%" rows=3></textarea>
                    </div>
                    <div class="vh-col l2 m2 s2 vh-center vh-xxlarge"><span class="fas fa-image"></span></div>
                </div>
                <div class="vh-row">
                    <div class="vh-button vh-col l12 m12 s12 vh-safety-blue">Chia sẻ</div>
                </div>
            </div>
            <!-- Phần thông báo khi ở màn hình điện thoại -->
            <div class="vh-card-4 vh-round vh-padding vh-margin-top vh-hide-large vh-hide-medium">
                <h4 class="vh-center"> Thông báo </h4>
                <div class="danger">Tòa nhà cháy rồi ahihi :v</div>
                <div class="warring">Lầu 3,4 cúp nước</div>
                <div class="info">Đề nghị bà con giữ gìn vệ sinh chung</div>
            </div>
            <!-- Phần quảng cáo khi ở màn hình điện thoại -->
            <div class="vh-padding vh-margin-top vh-hide-large vh-hide-medium vh-row-padding">
                <img class="vh-image vh-col s3" src="{{ asset('upload/1.PNG') }}"/>
                <img class="vh-image vh-col s3" src="{{ asset('upload/2.PNG') }}"/>
                <img class="vh-image vh-col s3" src="{{ asset('upload/1.PNG') }}"/>
                <img class="vh-image vh-col s3" src="{{ asset('upload/2.PNG') }}"/>
            </div>
        @foreach($Topic as $topic)
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{ $topic->customer->image }}" width="40px"> </div>
                    <div class="vh-col l11 m10 s10">
                        <a href="#">{{ $topic->customer->name }}</a>
                        <div class="vh-small vh-text-gray">{{ $topic->created_at }}</div>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">
                    {{ $topic->caption }}
                </div>
                <!-- Image -->
                @if(isset($topic->image))
                <img src="{{ $topic->image }}" width="100%" />
                @endif
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{Session::get('account')->customer->image}}" width="40px"></div>
                        <div class="vh-col l11 m10 s10">
                            <textarea onfocus="this.attributes['rows'].value = 3" onblur="this.attributes['rows'].value = 1" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=1></textarea>
                        </div>
                    </div>
                    @foreach($topic->comment as $comment)
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{ $comment->customer->image }}" width="40px"></div>
                        <div class="vh-col l11 m10 s10">
                            <a href="#">{{ $comment->customer->name }}</a> 
                            {{ $comment->caption }}
                            <div class="vh-small vh-text-gray">{{ $comment->updated_at }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="#">Xem thêm</a>
            </div>
            @endforeach
        </div>
        <!-- Quảng cáo bên phải -->
        <div class="vh-col l3 m3 vh-hide-small">
            <div id="ad-right">
                <div class="vh-margin-top">
                    <img class="vh-image" src="{{ asset('upload/1.PNG') }}"/>
                </div>
                <div class="vh-margin-top">
                    <img class="vh-image" src="{{ asset('upload/2.PNG') }}"/>
                </div>
            <div>
        </div>
    </div>
@endsection