@extends('layouts.webmaster')
@section('Container')        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Account</strong>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ảnh đại diện</th>
                                            <th>Tài khoản</th>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Quyền</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Account as $account)
                                    <tr>
                                            <td><img src="{{url($account->customer->image)}}" width="100px" height="100px"></td>
                                            <td><a target="_blank" href="{{ url('Customer',$account->username) }}">{{$account->username}}</a></td>
                                            <td><a target="_blank" href="{{ url('Customer',$account->username) }}">{{$account->customer->name}}</a></td>
                                            <td>{{$account->email}}</td>
                                            <td id="{{$account->username}}">
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/dangbai.png')}}" alt="Đăng bài" onclick="phanquyen('{{ $account->username }}',0)" @if( ($account->role & 1) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Đăng bài</div>
                                                </div>
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/dangquangcao.png')}}" alt="Đăng quảng cáo" onclick="phanquyen('{{ $account->username }}',1)" @if( ($account->role & 2) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Đăng quảng cáo</div>
                                                </div>
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/thongke.png')}}" alt="Thống kê" onclick="phanquyen('{{ $account->username }}',2)" @if( ($account->role & 4) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Thống kê</div>
                                                </div>
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/duyetbai.png')}}" alt="Duyệt bài" onclick="phanquyen('{{ $account->username }}',3)" @if( ($account->role & 8) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Duyệt bài</div>
                                                </div>
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/duyetqc.png')}}" alt="Duyệt quảng cáo" onclick="phanquyen('{{ $account->username }}',4)" @if( ($account->role & 16) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Duyệt quảng cáo</div>
                                                </div>
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/suathongtin.png')}}" alt="Sửa thông tin" onclick="phanquyen('{{ $account->username }}',5)" @if( ($account->role & 32) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Thông báo</div>
                                                </div>
                                                <div class="vh-tooltip">
                                                    <img src="{{asset('Images/Decentralization/phanquyen.png')}}" alt="Phân quyền" onclick="phanquyen('{{ $account->username }}',6)" @if( ($account->role & 64) == 0 ) class="vh-grayscale-max" @endif />
                                                    <div class="vh-tooltiptext-top">Phân quyền</div>
                                                </div>
                                                    <!--
                                                @if( ($account->role & 1) != 0 )
                                                <div>Đăng Bài</div>
                                                @endif
                                                @if( ($account->role & 2) != 0 )
                                                <div>Đăng Quảng Cáo</div>
                                                @endif
                                                @if( ($account->role & 4) != 0 )
                                                <div>Thống kê thu nhập</div>
                                                @endif
                                                @if( ($account->role & 8) != 0 )
                                                <div>Duyệt bài - Duyệt bình luận</div>
                                                @endif
                                                @if( ($account->role & 16) != 0 )
                                                <div>Duyệt quảng cáo</div>
                                                @endif
                                                @if( ($account->role & 32) != 0 )
                                                <div>Xem - Sửa dữ liệu</div>   
                                                @endif
                                                @if( ($account->role & 64) != 0 )
                                                <div>Phân quyền</div>
                                                @endif-->
                                            </td>
                                            <td>
                                                Chưa có
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
            window.onload= function(){$('#table').DataTable( {
                 "order": [[ 0, "desc" ]],
                 "paging": true,
            } )};
        </script>
@endsection