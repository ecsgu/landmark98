@extends('layouts.master')

@section('Container')
    <!-- Modal -->
    <form id="updateimage" action="{{url('file')}}" method="post" enctype="multipart/form-data"></form>
    @csrf
    <div id="change-avatar" class="vh-modal">
        <div class="vh-modal-content vh-animate-zoom">
            <h3 class="vh-padding vh-2018-harbor-mist">Thay đổi ảnh đại diện</h3>
            <img src="{{asset('City10.png')}}" width="100%" />
            <div class="vh-bar vh-padding vh-2018-harbor-mist">
                <div class="vh-button vh-right vh-round vh-border vh-border-blue vh-margin-small" onclick="closeModal('change-avatar')">Hủy</div>
                <input type="submit" form="updateimage" class="vh-button vh-right vh-round vh-safety-blue vh-margin-small" value="Lưu">
            </div>
        </div>
    </div>
    <div class="user-main">
        <div class="vh-row">
            <div class="vh-col l3 m12">
                <!-- Avatar -->
                <div class="vh-image-container user-avatar"> 
                    <img class="vh-circle vh-border-4 vh-border-white" src="{{asset($Customer->image)}}">
                    <div class="vh-overlay-title">
                        <label>
                            <span class="fas fa-camera vh-text-white"></span>
                            <input type="file" form="updateimage" id="file2" name="image" class="vh-hide" oninput="ChangeAvatar()"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="vh-col l9 m12">
                <div class="vh-row vh-margin">
                    <!-- Tên Người dùng -->
                    <div class="vh-col l9 m12">
                        <a class="vh-xlarge" >{{ $Customer->name }}</a>
                    </div>
                    <strong><div class="vh-col l4 vh-tablink vh-button vh-border-1 vh-round-medium" onclick="openTabAndChangeColor(event,'info','vh-safety-blue')">Thông tin</div></strong>
                    <div class="vh-col l1 vh-padding"></div> 
                    <strong><div class="vh-col l4 vh-tablink vh-button vh-border-1 vh-round-medium vh-safety-blue" onclick="openTabAndChangeColor(event,'post','vh-safety-blue')">Bài viết</div></strong>
                </div>
                <div class="vh-row vh-margin vh-large">
                    <div class="vh-col l4">
                        <span>
                            <strong><span>{{ $Customer->topic->count() }}</span></strong>
                            Bài viết
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab 1 -->
        <div id="info" class="vh-tab-content vh-hide">
            <!-- Thông tin người dùng -->
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <div class="vh-xlarge">Thông tin người dùng</div>
                <table class="vh-table-all">
                    <tr>
                        <th>Giới tính: </th>
                        <td>{{ $Customer->gender }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại: </th>
                        <td>{{ $Customer->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{ $Customer->email }}</td>
                    </tr>
                    <tr>
                        <th>Phòng: </th>
                        <td>{{ $Customer->room }}</td>
                    </tr>
                </table>
            </div>
            <!-- Thay đổi mật khẩu -->
            @if(session('account')->username == $Customer->id)
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
            <div class="vh-xlarge">Tài khoản</div>
                <form method="post" action="{{url('password/reset')}}">
                    @csrf
                    <table class="vh-table-all">
                        <tr>
                            <th>Tên đăng nhập:</th>
                            <td>{{ $Customer->id }}</td>
                        </tr>
                        <input type="hidden" id ="username" name="username" value="{{$Customer->id}}">
                        <tr>
                            <th>Mật khẩu cũ:</th>
                            <td><input type="password" name="oldpassword" /></td>
                        </tr>
                        <tr>
                            <th>Mật khẩu mới:</th>
                            <td><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <th>Nhập lại mật khẩu:</th>
                            <td><input type="password" name="repassword"/></td>
                        </tr>
                        @if(session('error_repassword'))
                            <div>
                                {{ session('error_repassword')}}
                            </div>
                        @endif
                        @if(session('error_oldpassword'))
                            <div>
                                {{ session('error_oldpassword')}}
                            </div>
                        @endif
                    </table>
                    <div class="vh-bar"><input class="vh-button vh-right" type="submit" value="Thay đổi" /></div>
                </form>
            </div>
            @endif
        </div>
        <!-- Tab 2 -->
        <div id="post" class="vh-tab-content vh-show vh-round-medium">
            @if(session('account')->username == $Customer->id)
            <form method="POST" enctype="multipart/form-data" id="topic" action="{{url('file')}}" onsubmit="return TestPost('caption')">
                <div class="vh-card-4 vh-round vh-padding vh-margin-top" onmousemove="document.getElementById('caption').attributes['rows'].value = 10" onmouseout="document.getElementById('caption').attributes['rows'].value = 3">
                <!-- User post -->
                {{csrf_field()}}
                    <div class="vh-row">
                        <div class="vh-col l1 m3 s3">
                            <a href="{{ url('Customer',[session('account')->username]) }}">
                                <img class="vh-circle" src="{{asset(Session::get('account')->customer->image)}}" width="40px">
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
            @endif
            @foreach($Customer->topic as $topic)
            @if($topic->status == 2 )
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m2 s2">
                        <img class="vh-circle" src="{{ asset($topic->customer->image) }}" width="40px">
                    </div>
                    <div class="vh-col l11 m10 s10">
                        <a><strong>{{ $topic->customer->name }}</strong></a>
                        <a class="vh-small vh-text-gray" href="{{ url('Topic',[$topic->id]) }}"><div>{{ $topic->created_at }}</div></a>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">
                    @php
                        $caption=$topic->caption; 
                        echo str_replace("\n","<br/>",$caption);
                    @endphp
                </div>
                <!-- Image -->
                @if(isset($topic->image))
                <br>
                <a href="{{ url('Topic',[$topic->id])}}"><img src="{{ asset($topic->image) }}" width="100%"/></a>
                @endif
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2">
                            <img class="vh-circle" src="{{ asset(Session::get('account')->customer->image)}}" width="40px">
                        </div>
                        <div class="vh-col l11 m10 s10">
                            <textarea id="txt_{{$topic->id}}" onfocus="this.attributes['rows'].value = 3" onblur="this.attributes['rows'].value = 1" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=1 onkeydown="keydown_Comment('{{$topic->id}}',false,event)"></textarea>
                        </div>
                    </div>
                    @if($topic->comment->where('status', 2)->count() > 1)
                    <div class="vh-hide" id="{{$topic->id}}"> 
                    @endif
                    @foreach($topic->comment as $key=>$comment)
                    <!-- 1 Comment -->
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2">
                            <a href="{{ url('Customer',[$comment->customer->id]) }}">
                                <img class="vh-circle" src="{{asset($comment->customer->image)}}" width="40px">
                            </a>
                        </div>
                        <div class="vh-col l11 m10 s10">
                            <a href="{{ url('Customer',[$comment->customer->id]) }}"><strong>{{ $comment->customer->name }}</strong></a> 
                            @php
                                $caption=$comment->caption; 
                                echo str_replace("\n","<br/>",$caption);
                            @endphp
                            <div class="vh-small vh-text-gray">{{ $comment->updated_at }}</div>
                        </div>
                    </div>
                    @if($topic->comment->where('status', 2)->count() - 2 == $key) 
                    </div> 
                    @endif
                    @endforeach
                    @if($topic->comment->where('status', 2)->count() > 1)
                    <a id="btn_{{$topic->id}}" href="javascript:void()" onclick="ShowMore('{{$topic->id}}','btn_{{ $topic->id}}')">Xem thêm</a>
                    @endif
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection