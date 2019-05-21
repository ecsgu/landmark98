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
                    <div class="col-sm-6">
                        <div class="form-group col-sm-12">
                            <label>Người dùng: {{session('advertiser')->customer->name}}</label>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Link quảng cáo: {{$Advertise->linkad}}</label>
                        </div>  
                        <div class="form-group col-sm-12">
                            <label>Ngày bắt đầu: {{$Advertise->start}} </label>
                        </div>     
                        <div class="form-group col-sm-12">
                            <label>Ngày kết thúc: {{$Advertise->end}}</label>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Vị trí: {{$Advertise->position}}</label>
                        </div>   
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-12">
                            <label>Ảnh:<img src="{{url($Advertise->image)}}"> </label>
                        </div> 
                    </div>
                </div>
                <div class="links pb-3 col-sm-12">
                    <div class="col-sm-5">&nbsp
                    </div>
                    <div class="col-sm-5" id="paypal-button"></div>
                    <button onclick="deleteadvertise('{{$Advertise->id}}')" type="button" style="border-radius: 23px; height: 45px" class="btn btn-secondary col-sm-2">Quay lại</button>
                </div>
            </form>
        </div>
    <script src="{{ asset('js/paypalobjects.js') }}"></script>
    <script>
      paypal.Button.render({
        env: 'sandbox', // Or 'production'
        client: {
            sandbox:'Afm6ObD0Wl0Jcnfiknnh5XsTrUru00d5BDzoQOBD7J57aFOQB19ogYGA3AN5ukdMgx4aCOixa1fk_h2I',
            production:''
        },

        style: {
          size: 'large',
          color: 'gold',
          shape: 'pill',
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
          // 2. Make a request to your server
          return actions.payment.create({
            transactions: [{
                amount: {
                    total: '{!! $Advertise->money !!}',
                    currency: 'USD'
                }
            }]
          });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
          // 2. Make a request to your server
            return actions.payment.execute().then(function(){
                //window.location="http://www.vietjack.com";
                formData = new FormData();
                formData.append('id', {!!$Advertise->id!!});
                $.ajax({
                    type: 'post',
                    url: '{!! url('advertisethanhtoan') !!}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success : function(success) {
                        if(success=="true")
                            window.location="{{url('advertise')}}";
                        else
                            alert("Bạn không có quyền này");
                    }
                });
                //window.alert('vuithoima');
            });

        }
      }, '#paypal-button');
    </script>
    </body>
</html>
@endsection