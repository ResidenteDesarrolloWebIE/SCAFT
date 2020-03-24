@extends('layouts.app')
@section('content')

<section class="section-projects py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects">
        <h2 class="text-center">SERVICIOS SOLICITADOS</h2><br>
        <div class="row center-content">
            @if($services->isEmpty())
            <div class="alert text-center col-md-8" role="alert">
                <strong>No ha solicitado servicios</strong>
            </div>
            @endif
            @foreach ($services as $service)
            <div class="col-md-3 list-projects">
                <div class="do-item do-item-circle do-circle">
                    <img src="{{ asset('images/service-services.png') }}" class="do-item do-circle do-item-circle-back">
                    <div class="do-info-wrap do-circle">
                        <div class="do-info">
                            <div class="do-info-front do-circle">
                                <h1 class="t-stroke text-center">{{$service->project->folio}}</h1>
                            </div>
                            <div class="do-info-back do-circle text-center">
                                <h3 class="text-info">
                                    <strong class="decription-color">
                                        {{$service->description}}
                                    </strong>
                                </h3>
                                <div class="details-projects">
                                    Servicio / {{ $service->status }}
                                    <br /> {{date("d M Y",strtotime($service->created_at))}}
                                    <div class="buttons-projects">
                                        <button class="backgroud-icon" id="btnInfoService" data-toggle="modal" data-target="#moreInformation" onclick='moreInformation({{$service->id}},this.id);'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Mas informacion!">
                                                <i class="fas fa-info" style="color:white;"></i>
                                            </span>
                                        </button>

                                        <button class="backgroud-icon" id="btnEconomicService" data-toggle="modal" data-target="#financialAdvance" onclick='financialAdvance({{$service->id}},this.id);'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Avance Economico!">
                                                <i class="fas fa-dollar-sign" style="color:white;"></i>
                                            </span>
                                        </button>
                                        <button class="backgroud-icon" data-toggle="modal" data-target="#technicalAdvanceService" onclick='technicalAdvanceService({{$service->id}});'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Avance Tecnico!">
                                                <i class="fas fa-wrench" style="color:white;"></i>
                                            </span>
                                        </button>

                                        <button class="backgroud-icon" id="btnGalleryService" data-toggle="modal" data-target="#imagesGallery" onclick='imagesGallery(this.id,{{$service}} )'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Galeria!">
                                                <i class="far fa-images" style="color:white;"></i>
                                            </span>
                                        </button>
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
<!--  section end -->

@include('client/modals/moreInformation')
@include('client/modals/financialAdvance')
@include('client/modals/technicalAdvanceService')
@include('client/modals/imageGallery')
@endsection