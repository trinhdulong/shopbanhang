<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>The Plaza Store</title>
	<meta charset="UTF-8">
	<meta name="description" content="The Plaza eCommerce Template">
	<meta name="keywords" content="plaza, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{asset('img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<div class="caviar-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="{{url('search')}}" method="post">
                    	@csrf
                        <!-- <input type="hidden" name="_token" value="jaTKlhyD0ymH6SR2tlpqQFOwXYnil0TMKvbWzpmy">                         -->
                        <input type="search" name="caviarSearch" id="search" placeholder="Tìm kiếm...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section header-normal">
		<div class="container-fluid">
			<!-- logo -->
			<div class="site-logo">
				<a href="/" ><img src="{{asset('img/logo.png')}}" alt="logo"></a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-right">
				<!-- <a href="cart.html" class="card-bag"><img src="img/icons/bag.png" alt=""><span>2</span></a> -->
				<a id="search-btn" href="#" class="search"><img src="{{asset('img/icons/search.png')}}" alt=""></a>
			</div>
		
			<!-- site menu -->
			<ul class="main-menu">
				<!-- <li><a href="/home">Home</a></li> -->
				@foreach($loai_sp as $loai)
				<li><a href="{{ route('categorie',$loai->path)}}">{{$loai->typeproductname}}</a></li>
				@endforeach
				<li><a href="#">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
	</header>
	<!-- Header section end -->