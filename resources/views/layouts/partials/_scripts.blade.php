<!-- Js de plugins-->
<script src="{{asset('plugins/jquery-3.4.1/jquery.min.js')}}"></script>
<script src="{{asset('plugins/dropzone-2012/dropzone.js') }}"></script>
<script src="{{asset('plugins/popper-1.16.0/popper.min.js') }}"></script>

<script src="{{asset('plugins/bootstrap-4.4.1/js/bootstrap.min.js') }}"></script>
<script src="{{asset('plugins/fontawesome-5.12.1/fontawesome.js') }}"></script>
<script src="{{asset('plugins/fotoroma-4.6.4/fotorama.js') }}"></script>
<script src="{{asset('plugins/dataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('plugins/sweetalert-2/sweetalert2.all.min.js') }}"></script>
<script src="{{asset('plugins/bootstrap-4.4.1/js/bootstrap-multiselect.js') }}"></script>

<script src="{{asset('plugins/fileinput-4.3.6/js/fileinput.min.js') }}"></script>
<script src="{{asset('plugins/fileinput-4.3.6/js/fileinput.js') }}"></script>
<script src="{{asset('plugins/fileinput-4.3.6/locales/es.js') }}"></script>

<script src="{{ asset('js/general.js') }}"></script>
<script src="{{ asset('js/admin/projects/projects.js') }}"></script>
<script src="{{ asset('js/admin/projects/create.js') }}"></script>
<script src="{{ asset('js/admin/projects/economicAdvance.js') }}"></script>
<script src="{{ asset('js/admin/projects/edit.js') }}"></script>
<script src="{{ asset('js/admin/projects/externalMinuta.js') }}"></script>
<script src="{{ asset('js/admin/projects/file.js') }}"></script>
<script src="{{ asset('js/admin/projects/images.js') }}"></script>
<script src="{{ asset('js/admin/projects/internalMinuta.js') }}"></script>
<script src="{{ asset('js/admin/projects/technicalAdvance.js') }}"></script>
<script src="{{ asset('js/admin/projects/technicalAdvance.js') }}"></script>


{{--<!-- <script src="{{ asset('js/client/modals/financialAdvance.js') }}"></script>
<script src="{{ asset('js/client/modals/imageGallery.js') }}"></script>
<script src="{{ asset('js/client/modals/moreInformation.js') }}"></script>
<script src="{{ asset('js/client/modals/technicalAdvanceSupply.js') }}"></script>
<script src="{{ asset('js/client/modals/technicalAdvanceService.js') }}"></script> -->--}}
<script src="{{asset('plugins/jquery-ui-1.12.1/jquery-ui.js')}}"></script>


<script type="text/javascript">
    function procesando() {
		var timerInterval
		swal.fire({
			title: 'PROCESANDO',
			html: 'AGUARDA UN MOMENTO POR FAVOR.',

			onBeforeOpen: () => {
				Swal.showLoading();
			}
		})


	}
</script>

<script>
	$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '< Ant',
	nextText: 'Sig >',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	weekHeader: 'Sm',
	dateFormat: 'yy/mm/dd',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
   $(function () {
   $("#fecha").datepicker();
   });
</script>