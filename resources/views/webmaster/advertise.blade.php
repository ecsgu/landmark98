@extends('layouts.webmaster')
@section('Container')

        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="abc" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Link</th>
                                            <th>Ảnh</th>
                                            <th>Tài khoản</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Vị trí</th>
                                            <th>Tổng tiền</th>
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
                                            <td>{{$ad->username}}</td>
                                            <td>{{$ad->start}}</td>
                                            <td>{{$ad->end}}</td>
                                            <td>{{$ad->position}}</td>
                                            <td>{{$ad->money}}$</td>
                                            <td>{{ $ad->status==1?"Chưa thanh toán":($ad->status==2?"Đã thanh toán":"Đã duyệt")  }}</td>
                                            <td>@if($ad->status==2)<input type="button" onclick="duyetadvertise('{{$ad->id}}')" value="Duyệt">
                                                @endif
                                                <input type="button" onclick="xoaadvertise('{{$ad->id}}')" value="Xóa">
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