@extends('layouts.app')
@section('content')

<head>
	<link href="/css/gallery.css" rel="stylesheet">
</head>

<section class="">
	@include('layouts.partials._navigationBar')

	<body>

		<header>
			<div>
				<h1></h1>
				<hr style='margin-top:-5px; margin-bottom: 30px' class="hr-text" />
			</div>
		</header>

		<div class="demo1">
			<ul class="galeria">
				<div class="row">

					<div class="col-md-3 text-center">
						<span>1 Marzo 2020</span>
						<li><a href="#img1"><img src="{{ asset('images/a.jpg') }}"></a></li>
					</div>

					<div class="col-md-3 text-center">
						<span>5 Marzo 2020</span>
						<li><a href="#img2"><img src="{{ asset('images/b.jpg') }}"></a></li>
					</div>
					<div class="col-md-3 text-center">
						<span>10 Marzo 2020</span>
						<li><a href="#img3"><img src="{{ asset('images/c.jpg') }}"></a></li>
					</div>
					<div class="col-md-3 text-center">
						<span>15 Marzo 2020</span>
						<li><a href="#img4"><img src="{{ asset('images/d.jpg') }}"></a></li>
					</div>
					<div class="col-md-3 text-center">
						<span>20 Marzo 2020</span>
						<li><a href="#img5"><img src="{{ asset('images/e.jpg') }}"></a></li>
					</div>
					<div class="col-md-3 text-center">
						<span>25 Marzo 2020</span>
						<li><a href="#img6"><img src="{{ asset('images/f.jpg') }}"></a></li>
					</div>
					<div class="col-md-3 text-center">
						<span>30 Marzo 2020</span>
						<li><a href="#img7"><img src="{{ asset('images/g.jpg') }}"></a></li>
					</div>
					<div class="col-md-3 text-center">
						<span>31 Marzo 2020</span>
						<li><a href="#img8"><img src="{{ asset('images/h.jpg') }}"></a></li>
					</div>
				</div>
			</ul>

			<figure id="img1" class="lbox bounce">
				<span><a href="#img1" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img alt="img1" title="img1" src="{{ asset('images/a.jpg') }}" />
				<span id='right'><a href="#img2" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>1 MARZO 2020</h2>
			</figure>

			<figure id="img2" class="lbox bounce">
				<span><a href="#img2" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img2' src="{{ asset('images/b.jpg') }}" />
				<span id='right'><a href="#img3" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>5 MARZO 2020</h2>
			</figure>

			<figure id="img3" class="lbox bounce">
				<span><a href="#img3" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img3' src="{{ asset('images/c.jpg') }}" />
				<span id='right'><a href="#img4" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>10 MARZO 2020</h2>
			</figure>

			<div id="img4" class="lbox bounce">
				<span><a href="#img4" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img4' src="{{ asset('images/d.jpg') }}" />
				<span id='right'><a href="#img5" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>15 MARZO 2020</h2>
			</div>

			<figure id="img5" class="lbox bounce">
				<span><a href="#img5" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img5' src="{{ asset('images/e.jpg') }}" />
				<span id='right'><a href="#img6" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>20 MARZO 2020</h2>
			</figure>

			<figure id="img6" class="lbox bounce">
				<span><a href="#img6" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img6' src="{{ asset('images/f.jpg') }}" />
				<span id='right'><a href="#img7" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>25 MARZO 2020</h2>
			</figure>

			<figure id="img7" class="lbox bounce">
				<span><a href="#img7" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img7' src="{{ asset('images/g.jpg') }}" />
				<span id='right'><a href="#img8" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>30 MARZO 2020</h2>
			</figure>

			<figure id="img8" class="lbox bounce">
				<span><a href="#img8" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img title='img8' src="{{ asset('images/h.jpg') }}" />
				<span id='right'><a href="#img9" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>31 MARZO 2020</h2>
			</figure>

		</div>
		<link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" />
	</body>

</section>
@endsection

<!-- <script src="/js/general.js"></script> -->