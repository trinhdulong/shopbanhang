@extends('pages/master')
@section('content')

<div id="between">
	<div class="container" >
		<div class="row text-center">
	        <div class="col-sm-6 col-sm-offset-3" >
	        <br><br> <h2 style="color:#0fad00">{{$thongbao or ''}}</h2>
	        <br><br> <h2 style="color:#0fad00">{{$message or ''}}</h2>
	        <h3>{{$code or ''}}</h3>
	        <div style="margin: 20px">
	        	<img src="../image/dathangthanhcong.png">
	        </div>
	        
	        <br><br>
	        <a href="/trangchu" class="btn btn-success">   Quay về trang chủ     </a>
	    	<br><br>
	        </div> 
		</div>
	</div>
</div>

@endsection
