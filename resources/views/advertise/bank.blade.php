@extends('layouts.advertise')

@section('Container')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thanh toán quảng cáo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Thanh toán quảng cáo</h1>
                        </div>
                    </div>
            </div>
        </div>
        <div style="border: #272c33 1px dashed; background: #fff;" class="rounded col-sm-11 form-login ml-4 mt-4">
            <form class="pt-3" action="admin/login">
                <div class="col-sm-12">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Thông tin chung</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <div class="form-group col-sm-12">
                            <label>Người dùng: {{session('advertiser')->customer->name}}</label>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Link quảng cáo:<br>{{$Advertise->linkad}} </label>
                        </div>  
                        <div class="form-group col-sm-12">
                            <label>Ngày bắt đầu: {{$Advertise->start}}</label>
                        </div>     
                        <div class="form-group col-sm-12">
                            <label>Ngày kết thúc: {{$Advertise->end}}</label>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Vị trí: {{$Advertise->position}} </label>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Số tiền: {{$Advertise->money}}$ </label>
                        </div>      
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-12">
                            <label>Ảnh: <img src="{{url($Advertise->image)}}"></label>
                        </div> 
                    </div>
                </div>
            </form>
        </div>
        <div style="border: #272c33 1px dashed; background: #fff;" class="rounded col-sm-11 form-login ml-4 mt-4">
            <form class="pt-3" action="admin/login">
                <div class="col-sm-12">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Chuyển khoản</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12">1. Bạn vui lòng chọn ngân hàng chuyển khoản cho Landmark 98.</div>
                    <div class="form-group col-sm-11">
                        <select class="form-control col-sm-12" id="mySelect" onchange="getOption(this.value)">
                            <option value="0">Vui lòng chọn ngân hàng để thanh toán</option>
                            <option value="bank1" >Techcombank</option>
                            <option value="bank2" >Vietcombank</option>
                            <option value="bank3" >VPBank</option>
                            <span class="fa fa-university"></span>
                        </select>
                    </div>
                    <div style="border: #272c33 1px dashed; background: #fff;" class="rounded col-sm-6 form-login">
                        <div id="bank1" style="display: none;" >
                            <div class="col-sm-12">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <h1 style="color: red">TECHCOMBANK</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class=" col-sm-12">
                                        <label>Chủ tài khoản: Landmark 98</label>
                                    </div>
                                    <div class=" col-sm-12">
                                        <label>Chi nhánh: Techcombank chi nhánh An Dương Vương </label>
                                    </div>  
                                    <div class=" col-sm-12">
                                        <label>Số tài khoản: 0190016819000 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bank2" style="display: none;">
                            <div class="col-sm-12">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <h1 style="color: green">VIETCOMBANK</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class=" col-sm-12">
                                        <label>Chủ tài khoản: Landmark 98</label>
                                    </div>
                                    <div class=" col-sm-12">
                                        <label>Chi nhánh: Vietcombank chi nhánh An Dương Vương </label>
                                    </div>  
                                    <div class=" col-sm-12">
                                        <label>Số tài khoản: 1703199810009 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bank3"  style="display: none;">
                            <div class="col-sm-12">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <h1 style="color: blue">VPBank</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class=" col-sm-12">
                                        <label>Chủ tài khoản: Landmark 98</label>
                                    </div>
                                    <div class=" col-sm-12">
                                        <label>Chi nhánh: VPBank chi nhánh Nam Sài Gòn </label>
                                    </div>  
                                    <div class=" col-sm-12">
                                        <label>Số tài khoản: 1720689102 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">2. Bạn vui lòng chuyển tiền vào tài khoản Landmark 98  trước ngày quảng cáo 1 ngày, sau thời gian này quảng cáo không được thanh toán sẽ bị hủy.</div>
                    <div class="col-sm-12">3. Sau khi nhận được thông báo chuyển khoản thành công từ ngân hàng. Landmark 98 sẽ gửi thông báo điện tử về quảng cáo của bạn qua mail của bạn.</div>
                </div>
            </form>
        </div>
        <div class="links pb-3 col-sm-12">
        <div class="col-sm-7">&nbsp
        </div>
            <button type="button" onclick="location.href='advertise';" class="col-sm-2 btn btn-success" style="border-radius: 23px; height: 45px">Hoàn thành</button>
            <button onclick="history.back()" type="button" style="border-radius: 23px; height: 45px" class="btn btn-secondary col-sm-2">Quay lại</button>
        </div>
        <script>
            function getOption(bank) {
                document.getElementById('bank1').style.display="none";
                document.getElementById('bank2').style.display="none";
                document.getElementById('bank3').style.display="none";
                document.getElementById(bank).style.display="block";
            }
        </script>
    </body>
</html>
@endsection