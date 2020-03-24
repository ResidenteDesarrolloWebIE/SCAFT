@extends('layouts.app')
@section('content')

<section class="section-home">
	@include('layouts.partials._navigationBar')
	<div class="container-home">
		@if(Auth::user()->hasRole('client'))
			<div class="testimotionals col-md-3 col-sm-5">
				<div class="card">
					<div class="layer"></div>
					<div class="content">
						<p>Tableros TPCYM, Servicio de pruebas en fábrica para TPCYM´S, Elaboración de ingeniería para TPCYM´S.</p>
						<div class="image">
							<img width="100px" src="{{ asset('images/supply-home.png') }}" alt="">
						</div>
						<div class="details">
							<h2><br>
								<a href="{{url('/projects/supplies')}}"> <span class="btn">SUMINISTROS</span></a>
							</h2>
						</div>
					</div>
				</div>
			</div>

			<div class="testimotionals col-md-3 col-sm-5">
				<div class="card">
					<div class="layer"></div>
					<div class="content">
						<p>Servicio de integración al sistema existente, Actualización de esquemas, Instalación de redes de comunicación.</p>
						<div class="image">
							<img width="100px" src="{{ asset('images/service-home.png') }}" alt="">
						</div>
						<div class="details">
							<h2>
								<br><a href="{{url('/projects/services')}}"> <span class="btn">SERVICIOS</span></a>
							</h2>
						</div>
					</div>
				</div>
			</div>
		@else
			<div class="testimotionals col-md-5 col-sm-5">
				<div class="card">
					<div class="layer"></div>
					<div class="content">
						<p>SERVICIOS: Servicio de integración al sistema existente, Actualización de esquemas, Instalación de redes de comunicación.</p>
						<p>SUMINISTROS: Tableros TPCYM, Servicio de pruebas en fábrica para TPCYM´S, Elaboración de ingeniería para TPCYM´S.</p>
						<div class="image">
							<img width="100px" src="{{ asset('images/supply-home.png') }}" alt="">
						</div>
						<div class="details">
							<h2><br>
								<a href="{{url('/projects')}}"> <span class="btn">Lista de proyectos</span></a>
							</h2>
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
</section>
@endsection