@extends('layouts.app')
@section('content')

<head>
	<link href="/css/advance.css" rel="stylesheet">
	<link href="/css/advancetwo.css" rel="stylesheet">
</head>
<section class="section-home">
	@include('layouts.partials._navigationBar')
	<!-- AVANCE TÉCNICO -->
	<div class="container">
		<div id="rectangulo" class="forma">
			<p>NOMBRE DEL PROYECTO:<span style="text-decoration:underline;"> PROYECTO NUMERO 1</span><br>
				CODIGO PROYECYO:<span style="text-decoration:underline;"> TBXXXX / SRXXXX</span><br>
				CLIENTE:<span style="text-decoration:underline;"> JOSE ENRIQUE ERASMO</span><br>
				SUBESTACION:<span style="text-decoration:underline;"> INTEGRACION DE ENERGIA</span><br>
				DESCRIPCION:<span style="text-decoration:underline;"> Servicio de integración al sistema
					existente, Actualización de esquemas, Instalación de redes de comunicación, Tableros
					TPCYM, Servicio de pruebas en fábrica para TPCYM´S</span><br>
			</p>
		</div>

		<div style="display:inline-block;width:100%;">
			<ul class="timeline timeline-horizontal">
				<li class="timeline-item">
					<button class="btn btn-sm btn-primary">AVANCE TÉCNICO</button>
				</li>
				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>10%</b>
					</div>
					<p><span id="lower-text">ORDEN DE
							<br>COMPRA</span></p>
				</li>

				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>30%</b>
					</div>
					<p><span id="lower-text">LIBERACIÓN DE
							<br>INGENIERÍA</span></p>
				</li>

				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>40%</b>
					</div>
					<p><span id="lower-text">AVANCE DE
							<br>TRABAJOS</span></p>
				</li>


				<li class="timeline-item">
					<div class="timeline-badge primary">
						<b>20%</b>
					</div>
					<p><span id="lower-text">ENTREGA A
							<br>CLIENTE</span></p>
				</li>

				<li class="timeline-item select">
					<select class="select-css">
						<option>RELACIONADOS</option>
						<option>TBXXXX</option>
						<option>SRXXXX</option>
						<option>TBXXXX</option>
						<option>SRXXXX</option>
						<option>TBXXXX</option>
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
						<b>30%</b>
						<p>$500,000.00MXN</p>
					</div>
					<p1><span id="lower-text1">ANTICIPO</span></p>

				</li>
				<li class="timelines-item1">
					<div class="timelines-badges primary">
						<b>10%</b>
						<p>$500,000.00MXN</p>
					</div>
					<p><span id="lower-text1">PAGO POR LIBERACIÓN</span></p>
				</li>

				<li class="timelines-item1">
					<div class="timelines-badges primary">
						<b>60%</b>
						<p>$500,000.00MXN</p>
					</div>
					<p><span id="lower-text1">PAGO FINAL PROYECTO</span></p>
				</li>

				<li class="timelines-item1">
					<button class="btn btn-sm btn-primary">$1,500,000.00MXN</button>
				</li>

			</ul>
		</div>
	</div>
</section>
@endsection
<script src="/js/advance.js"></script>