<div class="modal fade" id="idModalGallery">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioProjectGallery'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>GALERIA DE IMAGENES </strong></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                    <div>
                        <ul class="galeria">
                            <div class="row" style="justify-content: center">
                                @if($project->images->isEmpty())
                                <div class="alert text-center row" role="alert">
                                    <strong>No hay imagenes para mostrar</strong>
                                </div>
                                @endif
                                @foreach($project->images as $image)
                                <div class="col-md-3 text-center" style="margin-right:50px">
                                    <span  style="color: black">
                                        <span style="display: none">{{setlocale(LC_TIME,'spanish')}}</span>
                                        {{strftime("%d de %B del %Y", strtotime(date("d M Y",strtotime($image->created_at))))}}
                                    </span>
                                    <li><a href="{{'#image'.explode('.', explode('_', $image->name)[1])[0] }}"><img src="{{ asset('storage/'.$image->path ) }}"></a></li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                        @foreach($project->images as $image)
                        <figure id="{{'image'.explode('.', explode('_', $image->name)[1])[0]}}" class="lbox bounce">
                            <span><a href="{{ '#image'. ( intval( explode('.', explode('_', $image->name)[1])[0])-1) }}" title='Anterior'><i class="fas fa-angle-left"></i></a></span>
                            <img alt="" title="" src="{{ asset('storage/'.$image->path ) }}" />
                            <span id='right'><a href="{{ '#image'. ( intval( explode('.', explode('_', $image->name)[1])[0])+1) }}" title='Siguiente'><i class="fas fa-angle-right"></i></a></span>
                            <a title='Cerrar' href="#_"><i class="fas fa-times"></i></a>
                            <h2>
                                <span style="display: none">{{setlocale(LC_TIME,'spanish')}}</span>
                                {{strftime("%d de %B del %Y", strtotime(date("d M Y",strtotime($image->created_at))))}}
                            </h2>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>