<div class="modal fade" id="imagesGallery">
    <div class="modal-dialog modal-sm modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="idTokenGallery"> </span>

            <!-- Modal Header -->
            <div class="modal-header modal-header-info" >
                <h4 class="modal-title" id="idModalTitleGallery"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong  id='idFolioGallery'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>GALERIA DE IMAGENES</strong></h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row" id="images"> <!-- class="fotorama" data-nav="thumbs" -->
                    <!-- <a href="2.jpg"><img  src="images/logo1.png" width="120" height="96"></a> -->
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>