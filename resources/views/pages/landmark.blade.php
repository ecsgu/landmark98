
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
            <form method="POST" enctype="multipart/form-data" id="topic" action="{{url('file')}}" onsubmit="return TestPost('caption')">
                <div class="vh-card-4 vh-round vh-padding vh-margin-top" onmousemove="document.getElementById('caption').attributes['rows'].value = 10" onmouseout="document.getElementById('caption').attributes['rows'].value = 3">
                <!-- User post -->
                {{csrf_field()}}
                    <div class="vh-row">
                        <div class="vh-col l1 m3 s3">
                            <a href="{{ url('Customer',[session('account')->username]) }}">
                                <img class="vh-circle" src="{{Session::get('account')->customer->image}}" width="40px">
                            </a>
                         </div>
                        <div class="vh-col l9 m7 s7 vh-text-black">
                            <textarea id="caption" class="vh-border-0" placeholder="Hôm nay bạn nghĩ gì?" style="width:100%" rows=3 name="caption"></textarea>
                        </div>
                        <div class="vh-col l2 m2 s2 vh-center vh-xxlarge">
                            <label>
                                <span class="fas fa-image" aria-hidden="true"></span>
                                <input id="file" class="vh-hide" type="file" name="image" oninput="createThumbnail()">
                            </label>
                        </div>
                    </div>
                    <div id="thumnail" class="vh-margin-bottom vh-margin-top vh-quarter vh-display-container vh-hover-opacity"></div>
                    <div class="vh-row">
                        <label class="vh-button vh-col l12 m12 s12 vh-safety-blue">
                              <span class="" aria-hidden="true">Chia sẻ</span>
                              <input class="vh-hide" type="submit" value="upload">
                        </label>
                    </div>
                </div>
            </form>
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
                    <div class="vh-col l1 m3 s3">
                        <a href="{{ url('Customer',[$topic->customer->id]) }}">
                            <img class="vh-circle" src="{{ asset($topic->customer->image) }}" width="40px">
                        </a>
                    </div>
                    <div class="vh-col l11 m10 s10">
                        <a href="{{ url('Customer',[$topic->customer->id]) }}"><strong>{{ $topic->customer->name }}</strong></a>
                        <a class="vh-small vh-text-gray" href="{{ url('Topic',[$topic->id]) }}"><div>{{ $topic->customer->created_at }}</div></a>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">
                    {{ $topic->caption }}
                </div>
                <!-- Image -->
                @if(isset($topic->image))
                <img src="{{ asset($topic->image) }}" width="100%" onclick="addInfoModal('{{$topic->id}}')"/>
                @endif
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2">
                            <img class="vh-circle" src="{{ asset(Session::get('account')->customer->image)}}" width="40px">
                        </div>
                        <div class="vh-col l11 m10 s10">
                            <textarea onfocus="this.attributes['rows'].value = 3" onblur="this.attributes['rows'].value = 1" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=1></textarea>
                        </div>
                    </div>
                    @if($topic->comment->where('status', 2)->count() > 1)
                    <div class="vh-hide" id="{{$topic->id}}"> 
                    @endif
                    @foreach($topic->comment->where('status', 2) as $key=>$comment)
                    <!-- 1 Comment -->
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2">
                            <a href="{{ url('Customer',[$comment->customer->id]) }}">
                                <img class="vh-circle" src="{{asset($comment->customer->image)}}" width="40px">
                            </a>
                        </div>
                        <div class="vh-col l11 m10 s10">
                            <a href="{{ url('Customer',[$comment->customer->id]) }}"><strong>{{ $comment->customer->name }}</strong></a> 
                            {{ $comment->caption }}
                            <div class="vh-small vh-text-gray">{{ $comment->updated_at }}</div>
                        </div>
                    </div>
                    @if($topic->comment->where('status', 2)->count() - 2 == $key) 
                    </div> 
                    @endif
                    @endforeach
                    @if($topic->comment->where('status', 2)->count() > 1)
                    <a id="btn_{{$topic->id}}" href="javascript:void()" onclick="ShowMore('{{$topic->id}}')">Xem thêm</a>
                    @endif
                </div>
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