@extends('layouts.app')
@section('content')



<section class="section-home">
	@include('layouts.partials._navigationBar')
	<!-- AVANCE TÉCNICO -->
	<div class="container">
		<div id="rectangulo" class="forma">
			<p>NOMBRE DEL PROYECTO:<span style="text-decoration:underline;"> {{$project->name}}</span><br>
				CODIGO PROYECYO:<span style="text-decoration:underline;"> {{$project->folio}}</span><br>
				CLIENTE:<span style="text-decoration:underline;"> {{$project->customer->name}}</span><br>
				SUBESTACION:<span style="text-decoration:underline;"> {{$project->substation}}</span><br>
				DESCRIPCION:<span style="text-decoration:underline;"> {{$project->description}}</span><br>
			</p>
		</div>

		<div style="display:inline-block;width:100%;">
			<ul class="timeline timeline-horizontal">
				<li class="timeline-item">
					<button class="btn btn-sm btn-primary">AVANCE TÉCNICO</button>
				</li>
				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>{{$project->technicalAdvances->receive_order}} %</b>
					</div>
					<p><span id="lower-text">ORDEN DE
							<br>COMPRA</span></p>
				</li>

				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>{{$project->technicalAdvances->engineering_release}} %</b>
					</div>
					<p><span id="lower-text">LIBERACIÓN DE
							<br>INGENIERÍA</span></p>
				</li>

				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>{{$project->technicalAdvances->work_progress}} %</b>
					</div>
					<p><span id="lower-text">AVANCE DE
							<br>TRABAJOS</span></p>
				</li>


				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>{{$project->technicalAdvances->delivery_customer}} %</b>
					</div>
					<p><span id="lower-text">ENTREGA A
							<br>CLIENTE</span></p>
				</li>

				<li class="timeline-item select">
					<select class="select-css" onchange="window.location.href=this.value;">
						<option selected >RELACIONADOS</option>
						@foreach($project->affiliations as $affiliation)
						<option value="{{url('/projects/advances/advance',['idProject' => $affiliation->id, 'typeproject' => $affiliation->project_type_id])}}">{{$affiliation->folio}}</option>
						@endforeach
					</select>
				</li>

		</div>

		</ul>
	</div>
	</div>

	<!-- AVANCE ECONÓMICO -->
	<div class="container">
		<div style="display:inline-block;width:100%;">
			<ul class="timelines timelines-horizontale">
				<li class="timelines-item1">
					<button class="btn btn-sm btn-primary">AVANCE ECONÓMICO</button>
				</li>
				<li class="timelines-item1">
					<div class="timelines-badges primary">
						<b>{{$project->economicAdvances->initial_advance_percentage}} %</b>
						<p> $ {{$project->economicAdvances->initial_advance_mount}}</p>
					</div>
					<p1><span id="lower-text1">ANTICIPO</span></p>
				</li>
				<li class="timelines-item1">
					<div class="timelines-badges primary">
						<b>{{$project->economicAdvances->engineering_release_payment_percentage}} %</b>
						<p> $ {{$project->economicAdvances->engineering_release_payment_mount}}</p>
					</div>
					<p><span id="lower-text1">PAGO POR LIBERACIÓN</span></p>
				</li>

				<li class="timelines-item1">
					<div class="timelines-badges primary">
						<b>{{$project->economicAdvances->final_payment_percentage}} %</b>
						<p> $ {{$project->economicAdvances->final_payment_mount}}</p>
					</div>
					<p><span id="lower-text1">PAGO FINAL PROYECTO</span></p>
				</li>

				<li class="timelines-item1">
					<button class="btn btn-sm btn-primary"> $ {{$project->total_amount}} {{$project->coin->code}}</button>
				</li>

			</ul>
		</div>
	</div>
</section>
@endsection
<script src="/js/advance.js"></script>