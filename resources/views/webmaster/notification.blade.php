@extends('layouts.webmaster')
@section('Container')

        <h1 align="center">
            Đăng thông báo mới
        </h1>
        <div class="content mt-3">
            <form action="notification" class="form-group" method="post">
                <div class="form-group col-sm-5">
                    <input class="form-control col-sm-12" type="text" name="caption" placeholder="Nội dung thông báo">
                </div>
                <div class="form-group col-sm-3">
                    <select class="form-control col-sm-12" name="level">
                        <option selected="selected" value="1">Mức độ</option>
                        <option value="1">Bình thường</option>
                        <option value="2">Cảnh báo</option>
                        <option value="3">Khẩn cấp</option>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <select class="form-control col-sm-12" name="end">
                        <option selected="selected" value="1">Thời gian</option>
                        <option value="1">1 Ngày</option>
                        <option value="2">3 ngày</option>
                        <option value="3">7 ngày</option>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <input  type="submit" class="btn btn-success col-sm-12 form-control rounded" value="Đăng thông báo">
                </div>
            </form>
        </div>
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