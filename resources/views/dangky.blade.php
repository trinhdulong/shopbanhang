@extends('pages.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="/home">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangky')}}" method="post" class="form-signin">
				<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
				<div class="row">
					<div class="col-sm-3"></div>

					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Địa chỉ Email </label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ và tên</label>
							<input type="text" id="your_last_name" name="hoten" required>
						</div>
						<div class="form-block">
							<label for="adress">CMND</label>
							<input type="text" name="cmnd" required>
						</div>
						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							<input type="text" id="adress" name="diachi" required>
						</div>
						<div class="form-block">
							<label for="phone">Số điện thoại</label>
							<input type="text" id="phone" name="sdt" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu </label>
							<input type="password" id="phone" name="pass1" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu </label>
							<input type="password" id="phone" name="pass2"  required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection