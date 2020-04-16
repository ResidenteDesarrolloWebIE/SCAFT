@extends('layouts.app')
@section('content')

<section class="section-projects py-2 text-xs-center">
	@include('layouts.partials._navigationBar')
	<div class="container container-projects">
		<h2 class="text-center" style="color: white">SERVICIOS SOLICITADOS</h2><br>
		@if(!$projects->isEmpty())
			<div class="row" style="justify-content: center"><!--Inicio Modificacion -->
                <span  class="btn" style="background-color: blue; color:white; margin-right:20px;"><strong>Pendiente</strong></span>
                <span  class="btn" style="background-color: yellow; color:black; margin-right:20px;"><strong>Proceso</strong></span>
                <span  class="btn" style="background-color: rgb(0,255,0); color:black; margin-right:20px;"><strong>Terminado</strong></span>
                <span  class="btn" style="background-color: red; color:white; margin-right:20px;"><strong>Cancelado</strong></span>
            </div><!-- Fin modificacion -->
        @endif
		<div class="row center-content">
			@if($projects->isEmpty())
			<div class="alert text-center col-md-8" role="alert">
				<strong>No ha solicitado servicios</strong>
			</div>
			@endif
			@foreach ($projects as $project)
			<div class="col-md-3 list-projects">
				<div class="do-item do-item-circle do-circle">
					<img src="{{ asset('images/service-services.png') }}" class="do-item do-circle do-item-circle-back">
					<div class="do-info-wrap do-circle" style="{{$project->color_circle}}"><!-- Modificacion -->
						<div class="do-info">
							<div class="do-info-front do-circle">
								<h1 class="t-stroke text-center" style="color: white">{{$project->folio}}</h1>
							</div>
							<div class="do-info-back do-circle text-center">
								<h3 class="text-info">
									<strong class="decription-color">
										{{$project->description}}
									</strong>
								</h3>
								<div class="details-projects">
									Servicio / <strong style="{{$project->color_text}}">{{$project->status }}</strong> <!-- Modificacion -->
									<br /> {{date("d M Y",strtotime($project->created_at))}}
									<div class="buttons-projects">
										<a href="{{url('/projects/advances/advance',['idProject' => $project->id, 'typeproject' => 2])}}">
											<button class="backgroud-icon">
												<span data-toggle="tooltip" data-placement="bottom" > <!-- title="Avance del proyecto!" -->
												<i class="far fa-images" style="color:white;"></i><i class="fas fa-dollar-sign" style="color:white;"></i> DETALLES
												</span>
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection