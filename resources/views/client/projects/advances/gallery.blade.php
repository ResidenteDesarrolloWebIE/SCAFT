@extends('layouts.app')
@section('content')

<head>
	<link href="/css/gallery.css" rel="stylesheet">
</head>

<section class="gallery" style="margin-top: 20px">
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
					@if($project->images->isEmpty())
					<div class="alert text-center row" role="alert">
						<strong>No hay imagenes para mostrar</strong>
					</div>
					@endif
					@foreach($project->images as $image)
					<div class="col-md-3 text-center" style="margin-right:0px">
						<span>
							<span style="display: none">{{setlocale(LC_TIME,'spanish')}}</span>
							{{strftime("%d de %B del %Y", strtotime(date("d M Y",strtotime($image->created_at))))}}
						</span>
						<li><a href="{{'#image'.explode('.', explode('_', $image->name)[1])[0] }}"><img src="{{ asset('storage/'.$image->path ) }}"></a></li>
					</div>
					@endforeach

				</div>
			</ul>
			@foreach($project->images as $image)
			<figure id="{{'image'.explode('.', explode('_', $image->name)[1])[0]}}" class="lbox bounce">
				<span><a href="{{ '#image'. ( intval( explode('.', explode('_', $image->name)[1])[0])-1) }}" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
				<img alt="" title="" src="{{ asset('storage/'.$image->path ) }}" />
				<span id='right'><a href="{{ '#image'. ( intval( explode('.', explode('_', $image->name)[1])[0])+1) }}" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
				<a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
				<h2>
					<span style="display: none">{{setlocale(LC_TIME,'spanish')}}</span>
					{{strftime("%d de %B del %Y", strtotime(date("d M Y",strtotime($image->created_at))))}}
				</h2>
			</figure>
			@endforeach
		</div>
		<link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" />
	</body>
</section>
@endsection