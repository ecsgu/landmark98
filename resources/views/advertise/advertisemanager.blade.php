@extends('layouts.advertise')
@section('Container')

        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Quảng cáo của tôi</strong>
                            </div>
                            <div class="card-body">
                                <table id="abc" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Link</th>
                                            <th>Ảnh</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Vị trí</th>
                                            <th>Trạng thái</th>
                                            <th>Điều khiển</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Advertise as $ad)
                                        <tr>
                                            <td>{{$ad->id}}</td>
                                            <td><a href="{{$ad->linkad}}">{{$ad->linkad}}</a></td>
                                            <td><img src="{{url($ad->image)}}"></td>
                                            <td>{{$ad->start}}</td>
                                            <td>{{$ad->end}}</td>
                                            <td>{{$ad->position}}</td>
                                            <td>{{ $ad->status==1?"Chưa thanh toán":($ad->status==2?"Đã thanh toán":"Đã duyệt")  }}</td>
                                            <td>@if($ad->status==1)
                                                <input type="button" value="Thanh toán paypal" onclick="location.href='paypal/{{$ad->id}}';">
                                                <input type="button" value="Thanh toán ngân hàng" onclick="location.href='bank/{{$ad->id}}';">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <script>
            window.onload= function(){$('#abc').DataTable( {
                 "order": [[ 0, "desc" ]],
                 "paging": true,
            } )};
        </script>
@endsection