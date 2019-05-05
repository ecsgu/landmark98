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
                                            <td>{{$account->username}}</td>
                                            <td>{{$account->customer->name}}</td>
                                            <td>{{$account->email}}</td>
                                            <td>{{$account->role}}</td>
                                            <td>
                                                @if($account->status==1)
                                                <input type="button" value="Duyệt" id="{{$account->id}}" onclick="duyetbai(this.id)">
                                                @endif
                                                @if($account->status==2)
                                                <input type="button" value="Ẩn" id="{{$account->id}}" onclick="xoabai(this.id)">
                                                @endif
                                                @if($account->status==3)
                                                <input type="button" value="Hiện" id="{{$account->id}}" onclick="duyetbai(this.id)">
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
            $(document).ready( function () {
              var table = $('#table').DataTable({
                "aaSorting": [[ 0, "desc" ]]
              });
            } );
        </script>
@endsection