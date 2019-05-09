@extends('layouts.advertise')

@section('Container')
	<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Đăng kí quảng cáo</h1>
                </div>
            </div>
        </div>
    </div>
	<div>
        <form action="admin/login" method="post">
            <div>
                <div class="vh-row">
                    <h1 id="landmark-year" class="vh-col l12 vh-flat-belize-hole vh-center"></h1>
                </div>
                <div class="vh-row">
                    <h1 class="vh-col l3 vh-center" onclick="InitCalendar(today,--month);"> << </h1>
                    <h1 id="landmark-month" class="vh-col l6 vh-center"></h1>
                    <h1 class="vh-col l3 vh-center" onclick="InitCalendar(today,++month);"> >> </h1>
                </div>
                <div class="vh-row vh-flat-belize-hole vh-hover-flat-belize-hole">
                    <div class="landmark-day vh-button vh-hover-none">CN</div>
                    <div class="landmark-day vh-button vh-hover-none">T2</div>
                    <div class="landmark-day vh-button vh-hover-none">T3</div>
                    <div class="landmark-day vh-button vh-hover-none">T4</div>
                    <div class="landmark-day vh-button vh-hover-none">T5</div>
                    <div class="landmark-day vh-button vh-hover-none">T6</div>
                    <div class="landmark-day vh-button vh-hover-none">T7</div>
                </div>
                <div id="landmark-day" class="vh-row-padding">

                </div>
            </div>
            <div class="form-group col-sm-6">
                <label>Ngày bắt đầu</label>
                <input type="date" name="password" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label>Ngày kết thúc</label>
                <input type="date" name="password" class="form-control">
            </div>
            <div class="form-group col-sm-6">
            	<label>Ảnh</label>
	            <div class="form-group col-sm-12">
	            	<input type="file"  name="image">
	            </div>
            </div>
            <div class="form-group  col-sm-6">
                <label>Link quảng cáo</label>
                <input type="text" name="username" class="form-control" placeholder="Link website quảng cáo">
            </div>
            <div class="form-group col-sm-6">
                <label>Thành tiền</label>
                <input type="text" name="password" class="form-control" placeholder="Tổng tiền (VNĐ)" disabled="">
                <small>(Đã bao gồm VAT)</small>
            </div>
            <div class="checkbox form-group col-sm-6">
                <div  class="form-group col-sm-12">
                <label>
                    <input type="checkbox" disabled=""> Đồng ý
                    <a style="color: red" href="https://www.google.com/" target="_blank">Điều khoảng hợp đồng</a>
                </label>
                <div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" disabled="">Tiến hành thanh toán</button>
            </div>
        </form>
    </div>
    <script>
        var today = Date.parse('{{now()}}');
        today = new Date();
        month = today.getMonth();
        $.ajax({
        type: 'get',
        url: 'advertise',
        processData: false,
        contentType: false,
        success : function(data) {
            InitCalendar(today,month,data);
        }
    });
    </script>
@endsection