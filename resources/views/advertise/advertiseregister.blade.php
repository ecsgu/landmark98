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
    <div class="breadcrumbs vh-pale-blue">
        <div class="col-sm-4 ">
            <div class="page-header float-left vh-pale-blue">
                <a class="page-title" href="{{ url('advertiseregister') }}">
                    <h1>Chọn lại vị trí khác</h1>
                </a>
            </div>
        </div>
    </div>
	<div class="vh-white">
        <form action="{{url('advertiseregister')}}" enctype="multipart/form-data" method="post" onsubmit="return onclick_Submit();">
            @csrf
            <input type="hidden" name="position" value="{{$Position->id}}">
            <div class="vh-row">
                <h1 id="landmark-year" class="vh-col l12 m12 s12 vh-flat-belize-hole vh-center"></h1>
                <div class="vh-row">
                    <h1 class="vh-col l3 m3 s3 vh-center vh-button"> << </h1>
                    <h1 id="landmark-month" class="vh-col l6 m6 s6 vh-center"></h1>
                    <h1 class="vh-col l3 m3 s3 vh-center vh-button"> >> </h1>
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
                <div class="vh-row" id="landmark-day"></div>
            </div>
            <div class="vh-row">
                <div class="vh-button vh-col l5 m5 s5 vh-pale-green vh-hover-pale-green">Ngày bắt đầu <strong id="ad-begin"></strong></div>
                <input type="date" name="ad-begin" class="vh-hide">
                <div class="vh-button vh-col l5 m5 s5 vh-hover-pale-green" >Ngày kết thúc <strong id="ad-end"></strong></div>
                <input type="date" name="ad-end" class="vh-hide">
                <div id="reset" class="vh-button vh-col l2 m2 s2 vh-hover-pale-green">Chọn lại ngày</div>
            </div>
            <div class="form-group col-sm-6">
            	<label>Ảnh</label>
	            <div class="form-group col-sm-12">
	            	<input type="file"  name="image">
	            </div>
            </div>
            <div class="form-group col-sm-6">
                <label>Link quảng cáo</label>
                <input type="text" name="linkad" class="form-control" placeholder="Link website quảng cáo">
            </div>
            <div class="form-group col-sm-6">
                <label>Thành tiền</label>
                <input type="text" id="money" name="money" class="form-control" placeholder="Tổng tiền (VNĐ)" disabled="">
                <small>(Đã bao gồm VAT)</small>
                <br>
                <label>Vị trí đã chọn</label>
                <input type="text" class="form-control" placeholder="{{$Position->name}}" disabled="">
            </div>
            
            <div class="checkbox form-group col-sm-6">
                <div  class="form-group col-sm-12">
                <label>
                    <input type="checkbox" oninput="agree(this.checked)"> Đồng ý
                    <a style="color: red" href="{{url('dieukhoan')}}" target="_blank">Điều khoản hợp đồng</a>
                </label>
                <div>
                <button type="submit" name="thanhtoan" id="thanhtoan" value="paypal" onclick="" class="btn btn-success btn-flat m-b-30 m-t-30" disabled="">Thanh toán paypal</button>
                <button type="submit" name="thanhtoan" id="thanhtoan" value="bank" onclick="" class="btn btn-success btn-flat m-b-30 m-t-30" disabled="">Thanh toán qua ngân hàng</button>

            </div>
        </form>
        <script>
            function agree(check)
            {
                if(check){
                    document.getElementsByName('thanhtoan')[0].disabled=false;
                    document.getElementsByName('thanhtoan')[1].disabled=false;
                }
                else{
                    document.getElementsByName('thanhtoan')[0].disabled=true;
                    document.getElementsByName('thanhtoan')[1].disabled=true;
                }
            }
            
        </script>
    </div>
    <script>
        var today = Date.parse('{{now()}}');
        var IsBegin = true;
        today = new Date();
        month = today.getMonth();
        var position = {!! json_encode($Position) !!};
        var busyday = {!! json_encode($days) !!};
        InitCalendar(today,month,busyday,IsBegin);
        var busy = converDates(busyday);
        document.getElementById("ad-begin").parentElement.addEventListener("click",function(){IsBegin=true;changeEvent(true);});
        document.getElementById("ad-end").parentElement.addEventListener("click",function(){IsBegin=false;changeEvent(false);});
        document.getElementById("landmark-month").nextElementSibling.addEventListener("click",function(){InitCalendar(today,++month,busy,IsBegin);});
        document.getElementById("landmark-month").previousElementSibling.addEventListener("click",function(){InitCalendar(today,--month,busy,IsBegin);});
        document.getElementById("reset").addEventListener("click",click_reset);
        function Test_Begin(inp){
            if(inp.value == "")
        }
        function onclick_Submit(){
            
            document.getElementsByName("ad-end")[0].value == "";
            document.getElementsByName("linkad")[0].value == "";
            document.getElementsByName("image")[0].value == ""
        }
    </script>
@endsection