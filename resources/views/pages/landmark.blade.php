@extends('layouts.master')

@section('Container')
    <div class="vh-row-padding">
        <div class="vh-col l2 m12 s12">
            <!-- Quảng cáo bên trái -->
            <div class="">
                <h4 class="vh-center"> Thông báo </h4>
            </div>
        </div>
        <div class="vh-col l8 m12 s12">
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
                            <input class="vh-input" type="text" />
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
                            <input class="vh-input" type="text" />
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
                        <div class="vh-col l1 m1 s1"><img class="vh-circle" src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px"></div>
                        <div class="vh-col l11 m11 s11">
                            <a href="#">Trí Nhân</a> Huhu mấy bạn không ai cmt hết
                            <div class="vh-small vh-text-gray">24 tháng 3 năm 2019, lúc 7:10</div>
                        </div>
                    </div>
                </div>
                <a href="#">Xem thêm</a>
            </div>
        </div>
        <div class="vh-col l2 m12 s12">
            <!-- Quảng cáo bên phải -->
        </div>
    </div>
@endsection