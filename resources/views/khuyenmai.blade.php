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
							<h4 align="center">Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<?php foreach ($khuyenmai_sp as $khuyenmai_sp): ?>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$khuyenmai_sp->id)}}">
												<img src="../image/product/{{$khuyenmai_sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<div style="float: left;">
											<p class="single-item-title">{{$khuyenmai_sp->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($khuyenmai_sp->unit_price)}} VND</span><br>
												<span class="flash-sale">{{number_format($khuyenmai_sp->promotion_price)}} VND</span>
											</p>
											</div>
											<div style="float: right;">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											</div>
										

										</div>
									</div>
								</div>
								<?php endforeach ?>
								
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
</div>
@endsection