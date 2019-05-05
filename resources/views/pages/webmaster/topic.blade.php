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
                                    <tr>
                                            <td>{{$topic->id}}</td>
                                            <td>{{$topic->caption}}</td>
                                            <td>{{$topic->image}}</td>
                                            <td>{{$topic->username}}</td>
                                            <td>{{$topic->status}}</td>
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
            $(document).ready( function () {
              var table = $('#table').DataTable({
                "aaSorting": [[ 0, "desc" ]]
              });
            } );
        </script>
@endsection