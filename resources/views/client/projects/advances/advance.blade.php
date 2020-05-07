@extends('layouts.app')
@section('content')

<div class="container-fluid p-0">
    @include('layouts.partials._navigationBar')
    <div class="customer-profile-mobile">
        <div class="col-md-4 menu-customer">
            <div class="d-flex justify-content-center">
                <div class="contorno-avatar">
                    <img class="card-img-top avatar" src="{{ asset('images/ie-profile.jpg') }}" alt="Card image">
                </div><br>
            </div>
        </div>
    </div>
    <div class="row content-advances m-0">
        <div class="col-md-8 advances justify-content-center pl-md-4 pl-sm-2">
            <div class="row info-user m-0">
                <div class="col content-left">
                    <div class="row">
                        <div class="profile-left ">
                            <div class="mini-avatar">
                                <img class="" src="{{ asset('images/ie-profile.jpg') }}">
                            </div>
                        </div>
                        <div class="col-md-10 details">
                            <span style="font-size: 20px;font-weight: bold;">{{Auth::user()->name}}</span><br>
                            <span class="p-0" style="font-size: 20px;font-weight: bold;">Integración de energia</span>
                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="float-right col profile-right">
                        <div class="mini-avatar">
                            <img class="" src="{{ asset('images/ie-profile.jpg') }}">
                        </div>
                        <i class="fas fa-info-circle info"></i>
                    </div>
                    <div class="float-right col shade">
                    </div>
                </div>
            </div>
            <div class="col details">
                <h4 class="m-0" style="font-size: 40px;"><strong>TB20001</strong></h4>
                <h6 class="m-0" style="font-size: 20px;"><strong>Subestación: </strong> Mi subestación</h6>
                <h6 class="m-0" style="font-size: 20px;"><strong>Descripción: </strong> Mi proyecto</h6>
                <div class="row group-buttons">
                    <div class="col-md-3 col-6"><input class="btn-input" type="button" data-toggle="modal" data-target="#idModalOffer" onclick='initializeModalsCustomers({{$project}})' value="Oferta"></div>
                    <div class="col-md-3 col-6"><input class="btn-input" type="button" data-toggle="modal" data-target="#idModalPurchaseOrder" onclick='initializeModalsCustomers({{$project}})' value="Orden de compra">
                    </div>
                    <div class="col-md-3 col-6"><input class="btn-input" type="button" data-toggle="modal" data-target="#idModalMinutas" onclick='initializeModalsCustomers({{$project}})' value="Minutas">
                    </div>
                    <div class="col-md-3 col-6"><input class="btn-input" type="button" data-toggle="modal" data-target="#idModalGallery" onclick='initializeModalsCustomers({{$project}})' value="Galeria">
                    </div>
                </div>
            </div>
            <div class="col types">
                <div class="row technical">
                    <div class="col-md-2 col-12 stage-tittle d-flex align-items-center">
                        <h6 class="text-advance">AVANCE TÉCNICO</h6>
                    </div>
                    <div class="col-md-2 col-3 stage">
                        <div class="center
                            @if ($project->technicalAdvances->receive_order== 0) border-color-d8
                            @elseif($project->technicalAdvances->receive_order < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->technicalAdvances->receive_order}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Orden decompra</label>
                    </div>
                    <div class="col-md-2 col-3 stage">
                        <div class="center
                            @if ($project->technicalAdvances->engineering_release== 0) border-color-d8 
                            @elseif($project->technicalAdvances->engineering_release < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->technicalAdvances->engineering_release}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Liberación de
                            ingenieria</label>
                    </div>
                    <div class="col-md-2 col-3 stage">
                        <div class="center
                            @if ($project->technicalAdvances->work_progress== 0) border-color-d8
                            @elseif($project->technicalAdvances->work_progress < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->technicalAdvances->work_progress}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Avance de
                            trabajos</label>
                    </div>
                    <div class="col-md-2 col-3 stage">
                        <div class="center
                            @if ($project->technicalAdvances->delivery_customer== 0) border-color-d8 
                            @elseif($project->technicalAdvances->delivery_customer < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->technicalAdvances->delivery_customer}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Entrega a
                            cliente</label>
                    </div>
                    <div class="col-md-2 col-12 stage-related d-flex align-items-center">
                        <select class="btn-input">
                            <option value="" selected>Relacionados</option>
                            @forelse($project->affiliations as $affiliation)
                                <option value="{{url('/projects/advances/advance',['idProject' => $affiliation->id, 'typeproject' => $affiliation->project_type_id])}}">{{$affiliation->folio}}</option>
                            @empty
                                {{--  --}}
                            @endforelse
                        </select>
                    </div>
                    <div class="offset-md-3 col-md-6 offset-1 col-10 divider">
                    </div>
                </div>
                <div class="row economic" style="position: relative">
                    <div class="col-md-2 stage-tittle d-flex align-items-center">
                        <h6 class="text-advance">AVANCE ECONOMICO</h6>
                    </div>
                    <div class="col-md-2 col-4 stage">
                        <div class="center
                            @if ($project->economicAdvances->initial_advance_percentage == 0) border-color-d8
                            @elseif($project->economicAdvances->initial_advance_percentage < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->economicAdvances->initial_advance_percentage}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Anticipo</label>
                    </div>
                    <div class="col-md-2 col-4 stage">
                        <div class="center
                            @if ($project->economicAdvances->engineering_release_payment_percentage == 0) border-color-d8
                            @elseif($project->economicAdvances->engineering_release_payment_percentage < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->economicAdvances->engineering_release_payment_percentage}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Pago por
                            liberación</label>
                    </div>
                    <div class="col-md-2 col-4 stage">
                        <div class="center
                            @if ($project->economicAdvances->final_payment_percentage== 0) border-color-d8 
                            @elseif($project->economicAdvances->final_payment_percentage < 100) border-color-e5
                            @else border-color-a4 @endif">
                            <h4 class="m-0 text-advance">{{$project->economicAdvances->final_payment_percentage}} %</h4>
                        </div>
                        <label class="text-advance d-flex justify-content-center text-center">Pago final</label>
                    </div>
                    <div class="col-md-4 col-12 stage-total d-flex align-items-center">
                        <input type="button" class="btn-input btn-total" value="$ {{$project->sum_total_amoun}} {{$project->coin->code}}">
                    </div>
                    <div class="offset-md-3 col-md-6 offset-3 col-7 divider"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 bg-image-right">
            <div class="triangle-left"> </div>
            <div class="triangle-right"> </div>
        </div>
    </div>
</div>
@include('client/projects/advances/modals/images')
@include('client/projects/advances/modals/offers')
@include('client/projects/advances/modals/purchaseOrders')
@include('client/projects/advances/modals/minutas')