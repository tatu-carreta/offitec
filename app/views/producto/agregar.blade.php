@extends($project_name.'-master')

@section('contenido')
<style>
    .check_box {
    display:none;
}

.noTocado{
    background:url('{{URL::to("images/destacadoAzul.png")}}') no-repeat;
    height: 30px;
    width: 30px;
    display: inline-block;
    padding: 0 0 0 2em;
}

.tocado{
    background:url('{{URL::to("images/destacadoRojo.png")}}') no-repeat;
    height: 30px;
    width: 30px;
    display: inline-block;
    padding: 0 0 0 2em;
}

</style>
<script src="{{URL::to('js/ckeditorLimitado.js')}}"></script>
<script src="{{URL::to('js/producto-funcs.js')}}"></script>
<section>
        {{ Form::open(array('url' => 'admin/producto/agregar', 'files' => true)) }}
            <h2 class="marginBottom2"><span>Carga y modificación de productos</span></h2>
            <div id="error" class="error" style="display:none"><span></span></div>
            <div id="correcto" class="correcto ok" style="display:none"><span></span></div>

            <!-- Abre columna de descripción -->
            <div class="col70Admin datosProducto">
                <h3>Nombre y modelo del producto</h3>
                <input class="block anchoTotal marginBottom" type="text" name="titulo" placeholder="Código" required="true" maxlength="50">

                <div class="fondoDestacado padding1 marginBottom2">
                    <div class="marginBottom1 class_checkbox">
                        <label for="destacarProducto" class="destacarProducto noTocado">
                            <input id="destacarProducto" class="precioDisabled check_box" type="checkbox" name="item_destacado" value="A">
                            <span class="spanDestacarProd">Destacar este producto</span>
                        </label>
                    </div>

                    <p>Los últimos 5 productos destacados se muestran en la home.<br>
                        Los productos destacados deben tener precio</p>

                    <div class="form-group">
                        <label for="precio">Precio</label><span>$</span>
                        <input type="text" name="precio" disabled="true" class="precioAble">
                    </div>
                </div>
            </div>

            <!-- Abre columna de imágenes -->
            <div class="col30Admin fondoDestacado padding1 cargaImg">
                <h3>Imagen principal</h3>
                @include('imagen.modulo-imagen-euge')
            </div>

            <div class="clear"></div>
            <!-- cierran columnas -->
            
            

            <div class="punteado">
                <input type="submit" value="Publicar" class="btn marginRight5">
                <a onclick="window.history.back();" class="btnGris">Cancelar</a>
            </div>


            {{Form::hidden('seccion_id', $seccion_id)}}
            {{Form::hidden('descripcion', '')}}
            {{Form::hidden('tipo_precio_id[]', '2')}}
        {{Form::close()}}
    </section>
@stop
