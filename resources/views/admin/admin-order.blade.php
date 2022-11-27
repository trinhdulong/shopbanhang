
@extends('../pages/master')

@section('content')
			
			<div class="col-sm-12">
				<br>
				<div class="row">
					<h3 align="center" ">Quản lý đơn hàng</h3>
				</div>
				<br>
				<div class="row">
					<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Mã đơn hàng</th>
				      <th scope="col">Khách hàng</th>
				      <th scope="col">Email</th>
				       <th scope="col">Ngày đặt</th>
				       <th scope="col">Thanh toán</th>
				       <th scope="col">Tổng tiền</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 0; ?>
				  	<?php foreach ($order1 as $order1): $i++;?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td>DH{{$order1->id}}</td>
				      <td><b>{{$order1->member_name}}</b></td>
				      <td>{{$order1->email}}</td>
				      <td>{{$order1->date_order}}</td>
				      <td>{{$order1->payment}}</td>
				      <td>{{number_format($order1->total)}} VND</td>
				    </tr>
				    <?php endforeach ?>

				    <?php foreach ($order2 as $order2): $i++;?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td>DH{{$order2->id}}</td>
				      <td>{{$order2->customer_name}}</td>
				      <td>{{$order2->email}}</td>
				      <td>{{$order2->date_order}}</td>
				     
				      <td>{{$order2->payment}}</td>
				      <td>{{number_format($order2->total)}} VND</td>
				    </tr>
				    <?php endforeach ?>
				  </tbody>
				</table>
				</div>
			</div> <!-- .main-content -->
			<div style="min-height: 500px"><br>.</div>
@endsection