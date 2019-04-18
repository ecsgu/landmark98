@extends('layouts.master')

@section('Container')
    <div class="user-main">
        <div class="vh-row">
            <div class="vh-col l3 m4"><!-- anh -->
                <img class="vh-circle vh-border-4 vh-border-white user-avatar" src="{{asset($Customer->image)}}">
            </div>
            <div class="vh-col l9 m8"> <!--con lai -->
                <div class="vh-row vh-margin"><!--Ten edit icon-->
                    <div class="vh-col l4"> <!--ten-->
                        <a class="vh-xlarge" >{{ $Customer->name }}</a>
                    </div>
                    <strong><div class="vh-col l5 vh-tablink vh-button vh-border-1 vh-round-medium" onclick="openTabAndChangeColor(event,'info','vh-safety-blue')">Chỉnh sửa trang cá nhân</div></strong>
                    <div class="vh-col l1 vh-padding"></div> 
                    <strong><div class="vh-col l2 vh-tablink vh-button vh-border-1 vh-round-medium" onclick="openTabAndChangeColor(event,'post','vh-safety-blue')">Bài viết</div></strong>
                </div>
                <div class="vh-row vh-margin vh-large">
                    <div class="vh-col l4"><!--bai viet-->
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
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
            <div class="vh-xlarge">Tài khoản</div>
                <form method="post">
                    <table class="vh-table-all">
                        <tr>
                            <th>Tên đăng nhập:</th>
                            <td>{{ $Customer->id }}</td>
                        </tr>
                        <tr>
                            <th>Mật khẩu khẩu:</th>
                            <td><input type="password" name="oldpassword" /></td>
                        </tr>
                        <tr>
                            <th>Mật khẩu mới:</th>
                            <td><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <th>Nhập lại mật khẩu:</th>
                            <td><input type="password" /></td>
                        </tr>
                    </table>
                    <div class="vh-bar"><input class="vh-button vh-right" type="submit" value="Thay đổi" /></div>
                </form>
            </div>
        </div>
        <!-- Tab 2 -->
        <div id="post" class="vh-tab-content vh-show vh-round-medium">
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
            @foreach($Customer->topic as $topic)
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{ asset($topic->customer->image) }}" width="40px"> </div>
                    <div class="vh-col l11 m10 s10">
                        <a href="#">{{ $topic->customer->name }}</a>
                        <div class="vh-small vh-text-gray">{{ $topic->created_at }}</div>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">{{ $topic->caption }}</div>
                <!-- Image -->
                @if(isset($topic->image))
                <img src="{{ asset($topic->image) }}" width="100%" />
                @endif
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{asset(Session::get('account')->customer->image)}}" width="40px"></div>
                        <div class="vh-col l11 m10 s10">
                            <textarea onfocus="this.attributes['rows'].value = 3" onblur="this.attributes['rows'].value = 1" class="vh-border-0" placeholder="Bạn hãy nhập bình luận..." style="width:100%" rows=1></textarea>
                        </div>
                    </div>
                    @foreach($topic->comment as $comment)
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m2 s2"><img class="vh-circle" src="{{ asset($comment->customer->image) }}" width="40px"></div>
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
    </div>
@endsection