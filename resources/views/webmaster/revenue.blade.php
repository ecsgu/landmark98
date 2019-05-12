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
                                            <th>Doanh thu tháng/năm</th>
                                            <th>Số tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Revenue as $reve)
                                    <tr>
                                        <td>{{$reve->month}}/{{$reve->year}}</td>
                                        <td>{{$reve->money}}</td>
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