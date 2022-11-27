
@extends('pages/master')

@section('content')

	<div class="rev-slider">
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4><br>
							<div class="beta-products-details">
								<p class="pull-left"></p> Tìm thấy {{count($products)}} sản phẩm
									<div class="clearfix"></div>
										</div>
							<div class="row">
								@foreach($products as $product)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$product->id)}}">
												<img src="../image/product/{{$product->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<div style="float: left;">
											<p class="single-item-title">{{$product->name}}</p>
											<p class="single-item-price">
											@if($product->promotion_price==0)
												<span class="flash-sale">{{number_format($product->unit_price)}} VND</span>
												@else 
												<span class="flash-del">{{number_format($product->unit_price)}} VND</span><br>
												<span class="flash-sale">{{number_format($product->promotion_price)}} VND</span>
												@endif
											</p>
											</div>
											<div style="float: right">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
											</div>
										

										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
@endsection