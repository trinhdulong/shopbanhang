@extends('pages.master')
@section('content')
<div class="container" style="min-height: 500px; margin-top: 50px; margin-bottom: 50px">
	<div  class="row">
		<div class="col-md-3" style="min-height: 500px; border: 2px solid #a0d09a;margin-right:10px">
			<div class="row">
				<center>
					<img src="../image/avatar.png">					

				</center>
				<div style="margin: 15px">
					<p>Tên: {{Session('dangnhap')->member_name}}</p>
					<p>Địa chỉ: {{Session('dangnhap')->address}}</p>
					<p>SDT: {{Session('dangnhap')->phone_number}}</p>
					<p>CMND: {{Session('dangnhap')->cmnd}}</p>

				</div>
				
				
				
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-md-6" style="min-height: 500px; border: 2px solid #a0d09a;">
			<form class="form-signin" action="#" method="post" >
              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      <div class="form-label-group">
      	<h4>Thông tin tài khoản</h4><br>
        <label for="inputName">Tên Tài Khoản</label>
        <input type="name" id="inputName" class="form-control" value="{{Session('dangnhap')->member_name}}"  name="hoten" required="">
        
      </div>

      <div class="form-label-group">
      	<label for="inputNumber">Số điện thoại</label>
            <input type="text" id="inputNumber" class="form-control" value="{{Session('dangnhap')->phone_number}}" name="sdt" required="" autofocus="">
        
      </div>

       <div class="form-label-group">
       	     <label for="inputAddress">Địa chỉ</label>
        <input type="address" id="inputAddress" class="form-control" value="{{Session('dangnhap')->address}}" name="diachi" required="" autofocus="">
   
      </div>
      <div class="form-label-group">
      	    <label for="inputEmail">Email</label>
        <input type="email" id="inputEmail" class="form-control" value="{{Session('dangnhap')->email}}" name="username" readonly="readonly" required="" autofocus="">
    
      </div>

      <div class="form-label-group">
      	  <label for="inputPassword">CMND</label>
        <input type="CMND" id="inputPassword" class="form-control" value="{{Session('dangnhap')->cmnd}}" name="cmnd" required="">
      
      </div>
      <br>
      <div class="row">
      	<div class="col-md-3" style="float: right;">
      		<button class="btn btn-lg btn-primary btn-block" type="submit">Cập Nhật</button>
      	</div>
      </div>
      
    </form>
		</div>
		
	</div>
</div>
@endsection