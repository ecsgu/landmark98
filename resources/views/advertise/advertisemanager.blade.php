@extends('layouts.advertise')

@section('Container')
	<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Các quảng cáo của tôi</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-11 ml-5 mt-3">
    	<table style="background: #fff" class="table table-hover">
			<thead>
			<tr>
			  <th scope="col">STT</th>
			  <th scope="col">Link quảng cáo</th>
			  <th scope="col">Ngày bắt đầu</th>
			  <th scope="col">Ngày kết thúc</th>
			  <th scope="col">Vị trí quảng cáo</th>
			  <th scope="col">Thành tiền</th>
			  <th scope="col">Trạng thái</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			  <th scope="row">1</th>
			  <td>Mark</td>
			  <td>Otto</td>
			  <td>@mdo</td>
			  <td>@mdo</td>
			  <td>@mdo</td>
			  <td>@mdo</td>
			</tr>
			<tr>
			  <th scope="row">2</th>
			  <td>Jacob</td>
			  <td>Thornton</td>
			  <td>@fat</td>
			  <td>@fat</td>
			  <td>@fat</td>
			  <td>@fat</td>
			</tr>
			<tr>
			  <th scope="row">3</th>
			  <td>Larry</td>
			  <td>the Bird</td>
			  <td>@twitter</td>
			  <td>@twitter</td>
			  <td>@twitter</td>
			  <td>@twitter</td>
			</tr>
			</tbody>
		</table>
    </div>
@endsection