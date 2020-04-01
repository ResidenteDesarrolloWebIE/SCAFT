@extends('layouts.app')
@section('content')

<section class="section-projects py-2 text-xs-center">
	@include('layouts.partials._navigationBar')
	<div class="container container-projects">
		<h2 class="text-center">SERVICIOS SOLICITADOS</h2><br>
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
					<div class="do-info-wrap do-circle">
						<div class="do-info">
							<div class="do-info-front do-circle">
								<h1 class="t-stroke text-center">{{$project->folio}}</h1>
							</div>
							<div class="do-info-back do-circle text-center">
								<h3 class="text-info">
									<strong class="decription-color">
										{{$project->description}}
									</strong>
								</h3>
								<div class="details-projects">
									Servicio / {{ $project->status }}
									<br /> {{date("d M Y",strtotime($project->created_at))}}
									<div class="buttons-projects">
										<a href="{{url('/projects/advances/advance',['idProject' => $project->id, 'typeproject' => 2])}}">
											<button class="backgroud-icon" data-toggle="modal" data-target="#technicalAdvanceService">
												<span data-toggle="tooltip" data-placement="bottom" title="Avance del proyecto!">
													<i class="fas fa-wrench" style="color:white;"></i>
												</span>
											</button>
										</a>
										<a href="{{url('/projects/advances/gallery',['idProject' => $project->id, 'typeproject' => 2])}}">
											<button class="backgroud-icon" id="btnGalleryService" data-toggle="modal" data-target="#imagesGallery">
												<span data-toggle="tooltip" data-placement="bottom" title="Galeria!">
													<i class="far fa-images" style="color:white;"></i>
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