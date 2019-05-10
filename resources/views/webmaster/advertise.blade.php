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
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Advertise as $ad)
                                        <tr>
                                            <td>{{$ad->id}}</td>
                                            <td>{{$ad->linkad}}</td>
                                            <td><img src="{{url($ad->image)}}"></td>
                                            <td>{{$ad->username}}</td>
                                            <td>{{$ad->start}}</td>
                                            <td>{{$ad->end}}</td>
                                            <td>{{$ad->position}}</td>
                                            <td>{{$ad->money}}$</td>
                                            <td>{{ $ad->status==1?"Chưa thanh toán":($ad->status==2?"Đã thanh toán":"Đã duyệt")  }}</td>
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
@endsection