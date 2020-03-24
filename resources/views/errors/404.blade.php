@extends('layouts.app')
@section('content')


<nav class="d-flex">
    <div class="p-2 w-100 " style="background-color:#19202C">
        <a  class="site-logo text-center">
            <img class="logo" src="{{ asset('images/logo1.png') }}" alt="">
        </a>
    </div>
    <div class="p- flex-shrink-1" style="background-color:#19202C;color:white">Pagina no encontrada</div>
</nav>

<div class="d-flex justify-content-center" style="min-height: 78vh; background: url('../images/fondo1.jpg');background-size: cover;overflow: hidden;">
    <div class="row" style="color: black;display: flex;align-items: center;justify-content: center;">
        <h1 class="text-center" style="background-color:white; opacity:70%;padding:30px"> ¡¡¡ERROR!!! <br> PAGINA NO ENCONTRADA</h1>
    </div>
</div>
@endsection