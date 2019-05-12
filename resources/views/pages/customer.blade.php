@extends('layouts.master')

@section('Container')
<div class="vh-row-padding">
    <div class="vh-col l3 m3 vh-hide-small">
        <div id="ad-left" style="position: relative;">
            <div class="vh-margin-top">
                @if($Advertise->where('position',8)->first())
                    <a id="ad_8" target="_blank" href="{{$Advertise->where('position',8)->first()->linked}}"><img class="vh-image" src="{{ url($Advertise->where('position',8)->first()->image) }}"/></a>
                @else
                    <a id="ad_8" target="_blank" href="advertise"><img class="vh-image" src="{{ asset('upload/1.PNG') }}" /></a>
                @endif
            </div>
            <div class="vh-margin-top">
                @if($Advertise->where('position',10)->first())
                    <a id="ad_10" target="_blank" href="{{$Advertise->where('position',10)->first()->linked}}"><img class="vh-image" src="{{ url($Advertise->where('position',10)->first()->image) }}"/></a>
                @else
                    <a id="ad_10" target="_blank" href="advertise"><img class="vh-image" src="{{ asset('upload/1.PNG') }}" /></a>
                @endif
            </div>
        </div>
    </div>
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
    <div class="vh-col l6 m6 s12">
        <div class="vh-row">
            <div class="vh-col l3 m12">
                <!-- Avatar -->
                <div class="vh-image-container user-avatar"> 
                    <img class="vh-circle vh-border-4 vh-border-white" src="{{asset($Customer->image)}}">
                    <div class="vh-overlay-title">
                        <label>
                            <span class="fas fa-camera vh-text-white"></span>
                            <input type="file" accept="image/*, image/heic, image/heif" form="updateimage" id="file2" name="image" class="vh-hide" oninput="ChangeAvatar()"/>
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
                <form method="post" action="{{url('password/reset')}}" onsubmit="return Click_Submit();">
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
                    </table>
                    <div class="vh-bar"><input class="vh-button vh-right" type="submit" value="Thay đổi" /></div>
                </form>
                <script>
                    document.getElementsByName("password")[0].addEventListener("blur",function(){TestPassword(this);});
                    document.getElementsByName("repassword")[0].addEventListener("blur",function(){TestRePassword(document.getElementsByName("password")[0],this);});
                    function TestPassword(pass){
                        if(pass.value.length >= 8){
                            pass.classList.remove("vh-border-red");
                            RemoveNoti(pass);
                            return true;
                        } else {
                            pass.classList.add("vh-border-red");
                            if(pass.nextElementSibling == null)
                                pass.insertAdjacentElement("afterend",CreateNoti("Password phải 8 kí tự trở lên"));
                            return false;
                        }
                    }
                    function TestRePassword(pass, repass){
                        if(pass.value != repass.value){
                            repass.classList.add("vh-border-red");
                            if(repass.nextElementSibling == null)
                                repass.insertAdjacentElement("afterend",CreateNoti("Password không trùng khớp"));
                            return false;
                        } 
                        else {
                            repass.classList.remove("vh-border-red");
                            RemoveNoti(repass);
                            return true;
                        } 
                    }
                    function CreateNoti(str){
                        var div = document.createElement("DIV");
                        div.classList.add("vh-tiny","vh-text-red");
                        div.innerText = str;
                        return div;
                    }
                    function RemoveNoti(inp){
                        var parent = inp.parentElement;
                        if(inp.nextElementSibling != null)
                            parent.removeChild(inp.nextElementSibling);
                    }
                    function Click_Submit(){
                        var newpass = document.getElementsByName("password")[0];
                        var repass = document.getElementsByName("repassword")[0]; 
                        var notErr = true;
                        if(!TestRePassword(newpass,repass)){
                            notErr = false;
                            repass.focus();
                        }
                        if(!TestPassword(newpass)){
                            notErr = false;
                            newpass.focus();
                        }
                        return notErr;
                    }
                </script>
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
                                <input id="file" class="vh-hide" type="file" accept="image/*, image/heic, image/heif" name="image" oninput="createThumbnail()">
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
                    <div class="vh-col l10 m9 s9">
                        <a><strong>{{ $topic->customer->name }}</strong></a>
                        <a class="vh-small vh-text-gray" href="{{ url('Topic',[$topic->id]) }}"><div>{{ $topic->created_at }}</div></a>
                    </div>
                    <div class="vh-col l1 m1 s1 vh-right vh-popup" onclick="dropdown('{{$topic->id}}');event.stopImmediatePropagation();">
                        <span class="glyphicon glyphicon-triangle-bottom"></span>
                        <div class="vh-tooltiptext-bottom vh-white vh-border vh-border-dark-grey" id="{{$topic->id}}" onclick="event.stopImmediatePropagation();">
                            <a href="" >Ẩn</a>
                        </div>
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
                    @php
                        $key=0;
                    @endphp
                    @foreach($topic->comment->where('status', 2) as $comment)
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
                    @php
                        $key++;
                    @endphp
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
    <div class="vh-col l3 s3 vh-hide-small">
        <div id="ad-right" style="position: relative;">
            <div class="vh-margin-top">
                @if($Advertise->where('position',9)->first())
                    <a id="ad_9" target="_blank" href="{{$Advertise->where('position',9)->first()->linked}}"><img class="vh-image" src="{{ url($Advertise->where('position',9)->first()->image) }}"/></a>
                @else
                    <a id="ad_9" target="_blank" href="advertise"><img class="vh-image" src="{{ asset('upload/1.PNG') }}" /></a>
                @endif
            </div>
            <div class="vh-margin-top">
                @if($Advertise->where('position',11)->first())
                    <a id="ad_11" target="_blank" href="{{$Advertise->where('position',11)->first()->linked}}"><img class="vh-image" src="{{ url($Advertise->where('position',11)->first()->image) }}"/></a>
                @else
                    <a id="ad_11" target="_blank" href="advertise"><img class="vh-image" src="{{ asset('upload/1.PNG') }}" /></a>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("main").addEventListener("click",hideDropdown);
    @if(session('error_oldpassword'))
        alert('{{ session("error_oldpassword")}}');
    @endif
</script>
@endsection