@extends('layouts.webmaster')
@section('Container')

        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Bình luận</strong>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Idtopic</th>
                                            <th>Bình luận</th>
                                            <th>Tên tài khoản</th>
                                            <th>Trạng thái</th>
                                            <th>Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Comment as $comment)
                                    <tr class="@if($comment->status==1) vh-pale-red @elseif($comment->status==3) vh-pale-yellow @else @endif">
                                            <td>{{$comment->id}}</td>
                                            <td>{{$comment->idtopic}}</td>
                                            <td>{{$comment->caption}}</td>
                                            <td>{{$comment->username}}</td>
                                            <td>{{$comment->status==1?"Chưa duyệt":$comment->status==3?"Đã ẩn":"Đã duyệt"}}</td>
                                            <td>
                                                @if($comment->status==1)
                                                <input type="button" value="Duyệt" id="{{$comment->id}}" onclick="duyetcmt(this.id)">
                                                @endif
                                                @if($comment->status==2)
                                                <input type="button" value="Ẩn" id="{{$comment->id}}" onclick="xoacmt(this.id)">
                                                @endif
                                                @if($comment->status==3)
                                                <input type="button" value="Hiện" id="{{$comment->id}}" onclick="duyetcmt(this.id)">
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