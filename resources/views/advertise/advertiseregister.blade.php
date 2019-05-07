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
            <div class="form-group  col-sm-6">
                <label>Link quảng cáo</label>
                <input type="text" name="username" class="form-control" placeholder="Link website quảng cáo">
            </div>
            <div class="form-group col-sm-6">
                <label>Tên đăng nhập</label>
                <input type="text" name="password" class="form-control" placeholder="Nhập tên đăng nhập">
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
                <label>Vị trí</label>
                <select class="form-control">
					<option value="vitri1">title</option>
					<option value="vitri2">border</option>
					<option value="vitri3">right</option>
					<option value="vitri4">left</option>
				</select>
            </div>
            <div class="form-group col-sm-6">
            	<label>Ảnh</label>
	            <div class="form-group col-sm-12">
	            	<input type="file"  name="image">
	            </div>
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
@endsection