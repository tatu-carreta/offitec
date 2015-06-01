<script src="{{URL::to('js/moduleImageCrop.js')}}"></script>
<style type="text/css">
    #target {
        background-color: #ccc;
        width: 500px;
        height: 330px;
        font-size: 24px;
        display: block;
    }


</style>
<script type="text/javascript">
$(document).ready(function () {
    $('.file').previewInputFileImage();

    $(".imagen").change(function () {
        var id = $(this).attr('data');
        $(".url-archivo" + id).val($(this).val());
    });

    $(".cancelarCargaImagen").click(function () {
        var id = $(this).attr('data');
        $("#imagen" + id).val("");
        $(".url-archivo" + id).val("");
        $(".divCargaImg").html("");
        $(".divCargaImg").html("<img id='cropbox' style='width: auto; max-height: 280px;' src='{{URL::to('images/sinImg.gif')}}'  alt='Previsualización de Imagen 1'><i class='cancelarCargaImagen fa fa-times fa-lg' data='1'></i>");
    });
});
</script>

<div class="divCargaImgProducto">
    <label class="btn btn-primary cargar marginRight5"> Buscar archivo
        <span>
            <input id="imagen1" type="file" name="imagen_portada" class='oculto file imagen' onChange="validar(this);" required="true" data='1'>
        </span>
    </label>
    <input type="text" class="url-archivo1 campoNomArchivo">
    
    <div class="divCargaImg marginBottom1">
        <img id="cropbox" style="width: 370px; height: auto;" src="{{URL::to('images/sinImg.gif')}}"  alt="Previsualización de Imagen 1">
        <i class="cancelarCargaImagen fa fa-times fa-lg" data="1"></i>
    </div>
</div>

<input class="form-control" type="text" name="epigrafe_imagen_portada" placeholder="Ingrese una descripción de la foto">
<input type="hidden" id="x" name="x">
<input type="hidden" id="y" name="y">
<input type="hidden" id="w" name="w">
<input type="hidden" id="h" name="h">
