<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'SCATF') }}</title>
    <link href="{{asset('images/icon.ico') }}" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


    {{-- <link rel="stylesheet" href="{{asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{asset('css/admin/projects.css') }}" />
    <link rel="stylesheet" href="{{asset('css/admin/modals/images.css') }}" />
    <link rel="stylesheet" href="{{asset('css/projectlist.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/minutes.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/agreements.css')}}"/>--}}
    {{-- <link rel="stylesheet" href="{{asset('css/general.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/client/clientGeneral.css') }}" />
    <link rel="stylesheet" href="{{asset('css/client/advances.css') }}" />
    <link rel="stylesheet" href="{{asset('css/client/economicAdvance.css') }}" />
    <link rel="stylesheet" href="{{asset('css/client/gallery.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/home2.css')}}"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/auth/_navigationBar1.css') }}" /> --}}
    {{--Css de Jose--}}
    {{-- <link rel="stylesheet" href="{{asset('css/client/servicesSupplies.css')}}"/> --}}


    <link rel="stylesheet" href="{{asset('plugins/dropzone-2012/dropzone.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/fileinput-4.3.6/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/fileinput-4.3.6/css/fileinput.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.4.1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.4.1/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/dataTables-1.10.20/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-5.12.1/css/solid.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fotoroma-4.6.4/fotorama.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui-1.12.1/jquery-ui.css')}}">


    {{-- Nueva reestructura de css y nueva ruta --}}
    <link rel="stylesheet" href="{{asset('css/general.css')}}"/>
    {{--  Administrador--}}
    <link rel="stylesheet" href="{{asset('css/administrator/home.css') }}" /> {{-- Por depurar --}}
    <link rel="stylesheet" href="{{asset('css/administrator/projects.css') }}" />
    {{-- Cliente --}}
    <link rel="stylesheet" href="{{asset('css/customer/home.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/customer/projects.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/customer/project-advances.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/auth/_navigationBar.css') }}" />
</head>
