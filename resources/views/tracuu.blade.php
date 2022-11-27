@extends('pages.master')
@section('content')

<div class="container">
		<div class="row" 	>
			<div class="col-lg-12">
				<h1>Tra cứu tình trạng đơn hàng</h1>
			</div>
		</div>
<div class="row" style="padding: 100px 0 300px 0">
	<div class="col-lg-12">
		<div class="tracking-order-form">
			<center>
				<h4>Tra cứu theo mã đơn hàng</h4>
				<p>Điền vào các thông tin bên dưới để xem tình trạng vắn tắt của Đơn hàng</p>
				<br><br><br>
				<form class="form-inline" action="{{route('posttracuu')}}" method="post">
					<input name="_token" type="hidden" value="{{ csrf_token() }}" />
				<!-- Đã đăng nhập không cần nhập Email -->
				@if(!Session::has('dangnhap'))
					<div class="form-group has-feedback ">
						<label for="email">Nhập vào địa chỉ email khi đặt hàng</label>
						<input name="email" type="email" class="form-control" id="email" value="" required>
						<span class="help-block"></span>
					</div>
				@endif
					<div class="form-group ">
						<label for="order">Mã đơn hàng</label>
						<input name="code" type="text" class="form-control" id="order-id" value="" required="">
						<span class="help-block"></span>
					</div>
				<button type="submit" class="btn btn-info" style="margin: 20px">Kiểm Tra</button>
				<br>
			</form>
			</center>
		</div>
	</div>
	<!-- Bảng danh sách đơn hàng của tài khoản -->
  	@if(Session::has('dangnhap') && Session::has('orders')) 
  	<div class="row">
  		<div class="col-lg-12">
  			<h3>Đơn hàng của bạn</h3>
			<div class="table-responsive ">
			<table class="table table-bordered">
				<tr>
					<th>Mã đơn hàng</th>
					<th>Ngày mua</th>
					<th>Tổng tiền</th>
					<th></th>
				</tr>
				@foreach(Session::get('orders') as $order)
				<tr>
					<td>{{$order->madonhang}}</td>
					<td>{{$order->date_order}}</td>
					<td>{{$order->total}}</td>	
					<td><a href="{{Route('xoadonhang',$order->id)}}" class="btn btn-info" role="button">Xóa</a></td>
				</tr>
				@endforeach
			</table>
			</div>
  		</div>
  	</div>
  	@endif
	<!-- Số thứ tự các sản phẩm trên bảng -->
	<?php $i = 0; ?>
	<!-- Tìm thấy thông tin đơn hàng -->
	@if(Session::has('tracuu'))

	<div class="col-lg-12">
			<h5>Thông tin đơn hàng  <em>@if(!Session::has('dangnhap')) 
				({{Session('tracuu')[0]->madonhang}}) ({{Session('tracuu')[0]->email}})
			@endif</em></h5><br>
			<div class="table-responsive ">
			<table class="table table-bordered">
				<tr>
					<th>#</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Ngày đặt hàng</th>
				</tr>
				@foreach($tracuu as $tracuu)
				<?php $i++; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td>{{$tracuu->name}}</td>
					<td>{{number_format($tracuu->unit_price)}} VND</td>
					<td>{{$tracuu->Soluong}}</td>
					<td>{{$tracuu->date_order}}</td>
				</tr>
				@endforeach
				<tfoot>
					<tr>
						<td><td><td><td></td></td></td></td>
						<td>Tổng: {{number_format($tracuu->total)}} VND </td>
					</tr>
				</tfoot>
			</table>
			</div>
  	</div>	
  	    {{Session::forget('tracuu')}}
  	@endif
  	<!-- Email hoặc mã đơn hàng không đúng -->
  	@if(Session::has('tracuufail'))
  	<div class="row">
  		<div class="col-lg-3"></div>
	  	<div class="col-lg-6" align="center"">
	  		<div class="alert alert-danger"><p >{{Session::get('tracuufail')}}</p></div>
	  	</div>
  	</div>
  	@endif
	</div>
</div>

@endsection