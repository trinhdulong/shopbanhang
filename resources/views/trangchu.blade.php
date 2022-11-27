
@extends('pages/master')

@section('content')

<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="hero-slider owl-carousel">
			@foreach($banners as $banner)
			<div class="hs-item">
				<div class="hs-left"><img src="{{$banner->Link}}" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">{{$banner->Content2}}</div>
						<h2><span>{{$banner->Content1}}</span> <br>{{$banner->Content}}</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
			@endforeach
		</div>
	</section>
	<!-- Hero section end -->
	
	<!-- Intro section -->
	<section class="intro-section spad pb-0">
		<div class="section-title">
			<!-- <h2>Hàng mới về</h2> -->
			<h2>PEMIUM PRODUCTS</h2>
			<!-- <p>We recommend</p> -->
		</div>
		<div class="intro-slider">
			<ul class="slidee">
				@foreach($khuyenmai_sp as $khuyenmai_sp)
				<li>
					<div class="intro-item">
						<figure>
							<img src="../image/product/{{$khuyenmai_sp->image}}" alt="#" width="393" height="451">
							<div class="bache">NEW</div>
						</figure>
						<div class="product-info">
							<h5>{{$khuyenmai_sp->name}}</h5>
							<p>{{number_format($khuyenmai_sp->promotion_price)}} ₫ 
								@if($khuyenmai_sp -> loai == 'sale')
								<i style=" font-size: 16px; "> <del> {{number_format($khuyenmai_sp->unit_price)}} ₫</del></i>
								@endif	
							</p>
													
							<a href="{{route('chitietsanpham1',$khuyenmai_sp->name1)}}" class="site-btn btn-line">XEM CHI TIẾT</a>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="container">
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<!-- Featured section -->
	<div class="featured-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="featured-item">
						<img src="img/featured/featured-1.jpg" alt="" width="552" height="492">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="featured-item mb-0">
						<img src="img/featured/featured-2.jpg" alt="" width="552" height="492">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Featured section end -->


	<!-- Product section -->
	<section class="product-section spad">
		<div class="container">
			<ul class="product-filter controls">
				<li class="control" data-filter=".new">New arrivals</li>
				<li class="control" data-filter="all">Recommended</li>
				<li class="control" data-filter=".best">Best sellers</li>
			</ul>
			<div class="row" id="product-filter">
				@foreach($loai_sp as $loai1)
				<div class="mix col-lg-3 col-md-6 {{$loai1->loai}}">
					<div class="product-item">
						<!-- <a href="http://localhost:8000/ao-so-mi-3"> -->
						<a href="{{route('chitietsanpham1',$loai1->name1)}}">
						<figure>
							 <img src="../image/product/{{$loai1->image}}" alt="" width="267" height="362">
							<div class="pi-meta">
								<div class="pi-m-center">
									<img src="img/icons/eye.png" alt="">
									<p>Xem chi tiết</p>
								</div>
							</div>
						</figure>
						</a>
						<div class="product-info">
							<h6>{{$loai1->name}}</h6>
							<p>{{number_format($loai1->unit_price)}} ₫ </p>
							<!-- <a href="#" class="site-btn btn-line">XEM CHI TIẾT</a> -->
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Product section end -->


	<!-- Blog section -->	
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="featured-item">
						<img src="img/featured/featured-3.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-lg-7">
					<h4 class="bgs-title">from the blog</h4>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/1.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>10 tips to dress like a queen</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/2.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>Fashion Outlet products</h5>
							<div class="bi-meta">July 02, 2018   |   By Jessica Smith</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/3.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>the little black dress just for you</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->	
@endsection