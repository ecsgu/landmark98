@extends('layouts.master')

@section('Container')
    <div class="vh-row-padding">
        <div class="vh-col l2 m12 s12">
            <!-- Quảng cáo bên trái -->
            <div class="">
                <h4 class="vh-center"> Thông báo </h4>
            </div>
        </div>
        @foreach($Topic as $topic)
        <div class="vh-col l8 m12 s12">
            <!-- Phần đăng tin -->
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"> </div>
                    <div class="vh-col l10 m10 s10"> 
                    <textarea style="resize:none"></textarea></div>
                </div>
            </div>
            <!-- Bài post -->
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{$topic->image}}" width="40px"> </div>
                    <div class="vh-col l11 m11 s11">
                        <a href="#">{{ $topic->customer->name }}</a>
                        <div class="vh-small vh-text-gray">{{ $topic->created_at }}</div>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">
                    {{ $topic->caption }}
                </div>
                <!-- Image -->
                <img class="vh-image" src="{{ $topic->image }}" />
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <input class="vh-input" type="text" placeholder="Viết bình luận" />
                        </div>
                    </div>
                    @foreach($topic->comment as $comment)
                    <div class="vh-row vh-margin-top">
<<<<<<< HEAD
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <a href="#">Trí Nhân</a> Các bạn comment tương tác coi, Các bạn comment tương tác coi, Các bạn comment tương tác coi,Các bạn comment tương tác coi
                            <div class="vh-small vh-text-gray">24 tháng 3 năm 2019, lúc 7:10</div>
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <a href="#">Trí Nhân</a> Huhu mấy bạn không ai cmt hết
                            <div class="vh-small vh-text-gray">24 tháng 3 năm 2019, lúc 7:10</div>
                        </div>
                    </div>
                </div>
                <a href="#">Xem thêm</a>
            </div>
            <!-- Bài post -->
            <div class="vh-card-4 vh-round vh-padding vh-margin-top">
                <!-- User post -->
                <div class="vh-row">
                    <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"> </div>
                    <div class="vh-col l11 m11 s11">
                        <a href="#">Trí Nhân</a>
                        <div class="vh-small vh-text-gray">23 tháng 3 năm 2019, lúc 15:10</div>
                    </div>
                </div>
                <!-- Caption -->
                <div class="vh-margin-top">
                    <p>Ngày cuối tuần nhẹ nhàng sương sương</p>
                    <p>Chạy chương trình từ hôm thứ bảy đến giờ</p>
                </div>
                <!-- Image -->
                <img class="vh-image" src="{{ asset('upload\DSC01144.jpg') }}" />
                <!-- Comments -->
                <div class="vh-padding">
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <input class="vh-input" type="text" placeholder="Viết bình luận" />
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <a href="#">Trí Nhân</a> Các bạn comment tương tác coi, Các bạn comment tương tác coi, Các bạn comment tương tác coi,Các bạn comment tương tác coi
                            <div class="vh-small vh-text-gray">24 tháng 3 năm 2019, lúc 7:10</div>
                        </div>
                    </div>
                    <div class="vh-row vh-margin-top">
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ $comment->customer->image }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <a href="#">{{ $comment->customer->name }}</a> 
                            {{ $comment->caption }}
                            <div class="vh-small vh-text-gray">{{ $comment->updated_at }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="#">Xem thêm</a>
            </div>
            <!-- Quảng cáo bên phải -->
        </div>
        @endforeach
    </div>
@endsection