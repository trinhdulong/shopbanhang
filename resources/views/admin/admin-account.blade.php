
@extends('../pages/master')

@section('content')
			
			<div class="col-sm-12">
				<br>
				<div class="row">
					<h3 align="center" ">Quản lý tài khoản</h3>
				</div>
				<br>
				<div class="row">
					<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Tên</th>
				      <th scope="col">Email</th>
				       <th scope="col">Địa chỉ</th>
				       <th scope="col">Phone</th>
				       <th scope="col">CMND</th>
				        <th scope="col">Ngày tạo</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 0; ?>
				  	<?php foreach ($acc as $order1): $i++;?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><b>{{$order1->member_name}}</b></td>
				      <td>{{$order1->email}}</td>
				      <td>{{$order1->address}}</td>
				      <td>{{$order1->phone_number}}</td>
				      <td>{{$order1->cmnd}}</td>
				      <td>{{ date_format($order1->created_at,"Y/m/d") }}</td>
				    </tr>
				    <?php endforeach ?>
				  </tbody>
				</table>
				</div>
			</div> <!-- .main-content -->
			<div style="min-height: 500px"><br>.</div>
@endsection