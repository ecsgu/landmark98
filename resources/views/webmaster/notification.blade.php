@extends('layouts.webmaster')
@section('Container')

        <h1 align="center">
            Đăng thông báo mới
        </h1>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Thông báo</strong>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nội dung thông báo</th>
                                            <th>Ngày kết thúc thông báo</th>
                                            <th>Mức độ thông báo</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Notification as $noti)
                                    <tr>

                                            <td>{{$noti->id}}</td>
                                            <td>{{$noti->caption}}</td>
                                            <td>{{$noti->end}}</td>
                                            <td>{{$noti->level==1?"Bình thường":$noti->level==2?"Cảnh báo":"Khẩn cấp"}}</td>
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
            $(document).ready( function () {
              var table = $('#table').DataTable({
                "aaSorting": [[ 0, "desc" ]]
              });
            } );
        </script>
@endsection