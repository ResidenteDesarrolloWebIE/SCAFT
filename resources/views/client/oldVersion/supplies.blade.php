@extends('layouts.app')
@section('content')

<section class="section-projects py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects">
        <h2 class="text-center">SUMINISTROS SOLICITADOS</h2><br>
        <div class="row center-content">
            @if($supplies->isEmpty())
            <div class="alert text-center col-md-8" role="alert">
                <strong>No ha solicitado suministros</strong>
            </div>
            @endif
            @foreach ($supplies as $supply)
            <div class="col-md-3 list-projects">
                <div class="do-item do-item-circle do-circle item-projects">
                    <img src="{{ asset('images/supply-supplies.png') }}" class="do-item do-circle do-item-circle-back">
                    <div class="do-info-wrap do-circle">
                        <div class="do-info">
                            <div class="do-info-front do-circle">
                                <h1 class="t-stroke text-center">{{$supply->project->folio}}</h1>
                            </div>
                            <div class="do-info-back do-circle text-center">
                                <h3 class="text-info">
                                    <strong class="decription-color">
                                        {{$supply->description}}
                                    </strong>
                                </h3>
                                <div class="details-projects">
                                    Suministro / {{ $supply->status }}
                                    <br /> {{date("d M Y",strtotime($supply->created_at))}}
                                    <div class="buttons-projects">
                                        <button class="backgroud-icon" id="btnInfoSupply" data-toggle="modal" data-target="#moreInformation" onclick='moreInformation({{$supply->id}},this.id);'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Mas informacion!">
                                                <i class="fas fa-info color" style="color:white;"></i>
                                            </span>
                                        </button>
                                        <button class="backgroud-icon" id="btnEconomicSupply" data-toggle="modal" data-target="#financialAdvance" onclick='financialAdvance({{$supply->id}},this.id);'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Avance del proyecto!">
                                                <i class="fas fa-dollar-sign" style="color:white;"></i>
                                            </span>
                                        </button>
                                        <button class="backgroud-icon" data-toggle="modal" data-target="#technicalAdvanceSupply" onclick='technicalAdvanceSupply({{$supply->id}});'>
                                            <span data-toggle="tooltip" data-placement="bottom" title="Avance Tecnico!">
                                                <i class="fas fa-wrench" style="color:white;"></i>
                                            </span>
                                        </button>

                                        <button class="backgroud-icon" id="btnGallerySupply" data-toggle="modal" data-target="#imagesGallery" onclick='imagesGallery(this.id,{{$supply}} )'>
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
@include('client/modals/moreInformation')
@include('client/modals/financialAdvance')
@include('client/modals/technicalAdvanceSupply')
@include('client/modals/imageGallery')
@endsection