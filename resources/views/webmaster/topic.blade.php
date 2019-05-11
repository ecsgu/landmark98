@extends('layouts.webmaster')
@section('Container')

        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Topic</strong>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Caption</th>
                                            <th>Image</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Topic as $topic)
                                    <tr class="@if($topic->status==1) vh-pale-red @elseif($topic->status==3) vh-pale-yellow @else @endif">
                                            <td>{{$topic->id}}</td>
                                            <td>{{$topic->caption}}</td>
                                            <td>{{$topic->image}}</td>
                                            <td>{{$topic->username}}</td>
                                            <td>{{$topic->status==1?"Chưa duyệt":$topic->status==3?"Đã ẩn":"Đã duyệt"}}</td>
                                            <td>
                                                @if($topic->status==1)
                                                <input type="button" value="Duyệt" id="{{$topic->id}}" onclick="duyetbai(this.id)">
                                                @endif
                                                @if($topic->status==2)
                                                <input type="button" value="Ẩn" id="{{$topic->id}}" onclick="xoabai(this.id)">
                                                @endif
                                                @if($topic->status==3)
                                                <input type="button" value="Hiện" id="{{$topic->id}}" onclick="duyetbai(this.id)">
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
            window.onload= function(){$('#table').DataTable( {
                 "order": [[ 0, "desc" ]],
                 "paging": true,
            } )};
        </script>
@endsection