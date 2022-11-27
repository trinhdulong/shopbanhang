@extends('pages/master')
@section('content')
<!-- Page Info -->
<div class="page-info-section page-info-big">
	<div class="container">
		@if(isset($message))
		<div class="site-breadcrumb">
			<a href="/home">Home</a> / 
		</div>
		@else
		<h2>{{$categorie->typeproductname}}</h2>
		<div class="site-breadcrumb">
			<a href="/home">Home</a> / 
			<span>{{$categorie->typeproductname}}</span>
		</div>
		@endif
		<img src="{{asset('img/categorie-page-top.png')}}" alt="" class="cata-top-pic">
	</div>
</div>
<!-- Page Info end -->


<!-- Page -->
<div class="page-area categorie-page spad">
	<div class="container">
		<div class="categorie-filter-warp">
			@if(isset($message))
			<p>{{$message}}</p>
			@else
			<!-- <p>Đang hiển thị {{count($Products)}} sản phẩm</p> -->
			@endif
			<div class="cf-right">
				<div class="cf-layouts">
					<a class="active" href="#"><img src="img/icons/layout-2.png" alt=""></a>
				</div>
				<form action="#">
					<select>
						<option>Color</option>
					</select>
					<select>
						<option>Brand</option>
					</select>
					<select>
						<option>Sort by</option>
					</select>
				</form>
			</div>
		</div>
		@if(!isset($message))
		<div class="row">
			@foreach($Products as $Product)
			<div class="col-lg-3">
				<div class="product-item">
					<a href="{{route('chitietsanpham1',$Product->name1)}}">
					<figure>
						<img src="{{asset('image/product/'.$Product->image)}}" alt="" width="267" height="362">
						@if($Product -> loai == 'new')
						<div class="bache">NEW</div>
						@elseif($Product -> loai == 'sale')
						<div class="bache sale">SALE</div>
						@endif
						<div class="pi-meta">
							<div class="pi-m-center">
								<img src="{{asset('img/icons/eye.png')}}" alt="#">
								<p>View Detail</p>
							</div>
						</div>
					</figure>
					</a>
					<div class="product-info">
						<h6>{{$Product->name}}</h6>
						@if($Product -> loai == 'sale') <p>{{number_format($Product->promotion_price)}} ₫ 
							<span> <del> {{number_format($Product->unit_price)}} ₫</del></span></p>
						@else
						<p> {{number_format($Product->unit_price)}} ₫ </p>
						@endif
						<!-- <a href="#" class="site-btn btn-line">ADD TO CART</a> -->
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row"><div style="float:right; margin-right: 500px;">{{$Products->links()}}</div></div>
		@endif
		<!-- <div class="site-pagination">
			<span class="active">01.</span>
			<a href="">02.</a>
			<a href="">03.</a>
			<a href="">04.</a>
			<a href="">05.</a>
			<a href="">06</a>
		</div> -->
	</div>
</div>
<!-- Page -->

@endsection