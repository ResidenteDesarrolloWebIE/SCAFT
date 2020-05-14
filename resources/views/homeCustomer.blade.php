@extends('layouts.app')
@if(Auth::user()->hasRole('Cliente'))
    <div class="container-fluid">
        <div class="row">
            <div class="customer-profile">
                <div class="col-md-4 menu-customer">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="contorno-avatar">
                            <img class="card-img-top avatar" src="{{asset($user->contacts[0]->profile_picture)}}" alt="Card image">
                        </div><br>
                    </div>
                    <div class="text-left text-profile">
                        <span class="text-23px">Bienvenido</span><br>
                        <span class="text-30px"><strong>{{Auth::user()->name}}</strong></span><br>
                        <span class="text-30px">Integracion De Energia</span>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-rewards"><b>Ver puntos Rewards</b></button>
                    </div>
                </div>
            </div>
            {{-- clases y estilo en general.css --}}
            <div class="customer-profile-mobile">
                <div class="col-md-4 menu-customer">
                    <div class="d-flex justify-content-center">
                        <div class="contorno-avatar">
                            <img class="card-img-top avatar" src="{{ asset('images/ie-profile.png') }}" alt="Card image">
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="offset-md-4 col-md-8 p-0"> {{-- p-0--}}
                @include('layouts.partials._navigationBarHome')
                <div class="container catalogs">
                    <div class="row" style="margin-bottom: 3%;">
                        <div class="col">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{asset('images/logo2.png')}}" class="img-logo"/>
                            </div>
                        </div>
                    </div>
                    <div class="buttons-mobile">
                        <div class="row">
                            <button type="button" class="btn btn-rewards"><b>Ver puntos Rewards</b></button>
                        </div>
                        <div class="row">
                            <div class="col" style="padding-right: 10%;">
                                <button type="button" class="btn btn-servicesProducts"><b>Ver Catálogo de
                                        Servicios</b></button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="padding-right: 10%;">
                                <button type="button" class="btn btn-servicesProducts"><b>Ver Catálogo de
                                        Productos</b></button>
                            </div>
                        </div>
                    </div>
                    <div class="info-empresa-mobile">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="title">¿QUIÉNES SOMOS?</h3>
                                <p class="p-mobile" style="text-align: justify;">Somos una empresa comprometida en proveer
                                    productos y
                                    servicios especializados para el
                                    el manejo de la energía eléctrica, cumpliendo las necesidades y expectativas de nuestros
                                    clientes con sistemas de innovación tecnológica, mediante procesos eficientes alineados
                                    a la mejora continua, basados en una cultura de calidad, valores y desarrollo personal.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="title">MISIÓN</h3>
                                <p class="p-mobile" style="text-align: justify;">
                                    Ser líder nacional con proyecttión internacional en el suministro de soluciones de
                                    seguridad y protección para la Industria Eléctrica. Ofreciendo siempre, soluciones
                                    de calidad y compromiso de servicio, todo ello orientado a la satisfacción de nuestros
                                    clientes.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3 class="title">VISIÓN</h3>
                                <p class="p-mobile" style="text-align: justify;">
                                    Ser una de las empresas líderes nacionales en tecnología e
                                    innovación de productos y servicios del ramo eléctrico, a través de la integración
                                    funcional de tecnología de vanguardia, para satisfacer
                                    las necesidades de nuestros clientes a través del desarrollo de nuestro personal
                                    y cultura de calidad.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3 class="title">VALORES</h3>
                                <p class="p-mobile" style="text-align: justify;">
                                    <ul>
                                        <li>Integridad</li>
                                        <li>Confianza</li>
                                        <li>Respeto</li>
                                        <li>Trabajo en equipo</li>
                                        <li>Responsabilidad</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="info-empresa">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="title">MISIÓN</h3>
                                <p style="text-align: justify;">
                                    Ser líder nacional con proyecttión internacional en el suministro de soluciones de
                                    seguridad y protección para la Industria Eléctrica. Ofreciendo siempre, soluciones
                                    de calidad y compromiso de servicio, todo ello orientado a la satisfacción de nuestros
                                    clientes.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3 class="title">VISIÓN</h3>
                                <p style="text-align: justify;">
                                    Ser una de las empresas líderes nacionales en tecnología e
                                    innovación de productos y servicios del ramo eléctrico, a través de la integración
                                    funcional de tecnología de vanguardia, para satisfacer
                                    las necesidades de nuestros clientes a través del desarrollo de nuestro personal
                                    y cultura de calidad.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3 class="title">VALORES</h3>
                                <p style="text-align: justify;">
                                    <ul>
                                        <li>Integridad</li>
                                        <li>Confianza</li>
                                        <li>Respeto</li>
                                        <li>Trabajo en equipo</li>
                                        <li>Responsabilidad</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="title">¿QUIÉNES SOMOS?</h3>
                                <p style="text-align: justify;">Somos una empresa comprometida en proveer productos y
                                    servicios especializados para el
                                    el manejo de la energía eléctrica, cumpliendo las necesidades y expectativas de nuestros
                                    clientes con sistemas de innovación tecnológica, mediante procesos eficientes alineados
                                    a la mejora continua, basados en una cultura de calidad, valores y desarrollo personal.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="cataloge">
                        <div class="row">
                            <div class="col" style="padding-right: 10%;">
                                <button type="button" class="btn btn-servicesProducts"><b>Ver Catálogo de
                                        Servicios</b></button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="padding-right: 10%;">
                                <button type="button" class="btn btn-servicesProducts"><b>Ver Catálogo de
                                        Productos</b></button>
                            </div>
                        </div>
                    </div><br>
                </div>
                @include('layouts.partials._footerHome')
            </div>
        </div>
    </div>
@endif