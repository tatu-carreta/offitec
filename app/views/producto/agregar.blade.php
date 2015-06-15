@extends($project_name.'-master')

@section('head')

    @parent

    <link rel="stylesheet" href="{{URL::to('css/ng-img-crop.css')}}" />
@stop

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
<section class="container">
        {{ Form::open(array('url' => 'admin/producto/agregar', 'files' => true, 'role' => 'form')) }}
            <h2 class="marginBottom2"><span>Carga y modificación de productos</span></h2>
            <div id="error" class="error" style="display:none"><span></span></div>
            <div id="correcto" class="correcto ok" style="display:none"><span></span></div>

        <div class="row datosProducto marginBottom2">
            <!-- Abre columna de descripción de Producto -->
            <div class="col-md-6">

                <!-- Nombre del producto -->
                <div>
                    <h3>Nombre y modelo del producto</h3>
                    <div class="form-group marginBottom2">
                        <input class="form-control" type="text" name="titulo" placeholder="Código" required="true" maxlength="50">
                    </div>
                </div>

                <!-- Estado  -->
                <h3>Estado</h3>
                <div class="marginBottom2">
                    <div class="fondoDestacado marginBottom05">
                        <div class="">
                            <label>
                                <input id="" class="" type="checkbox" name="" value="">
                                Nuevo
                            </label>
                        </div>
                    </div>
                    <div class="fondoDestacado marginBottom05">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">
                                    <input id="" class="" type="checkbox" name="" value="">
                                    Oferta
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="" >
                                    Precio Antes $ <input id="" class="form-control inputWidth80" type="text" name="" value="">
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="" >
                                    Precio Después $ <input id="" class="form-control inputWidth80" type="text" name="" value="">
                                </label>
                            </div>    
                        </div>
                    </div>
                    <p>Los productos nuevos y las ofertas se muestran en la home</p>
                </div>

                <!-- Destacar producto  -->
                <div class="fondoDestacado marginBottom2">
                    <div class="class_checkbox marginBottom1">
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
                
                <div class="fondoDestacado modIndicarSeccion">
                    <h3>Ubicación</h3>
                        @foreach($menues as $men)
                        <div class="cadaSeccion">
                            @if(count($men->children) == 0)
                                <div>{{$men->nombre}}</div>
                                <div>
                                @foreach($men->secciones as $seccion)
                                    <span><input id="seccion{{$seccion->id}}" type="checkbox" name="secciones[]" value="{{$seccion->id}}" @if($seccion->id == $seccion_id) checked="true" disabled @endif><label for="seccion{{$seccion->id}}">@if($seccion->titulo != ""){{$seccion->titulo}}@else Sección {{$seccion->id}} @endif</label></span>
                                @endforeach
                                </div>
                            @endif
                        </div>
                        @endforeach
                </div>
            </div><!--cierra columna datos de producto-->

            <!-- Abre columna de imágenes -->
            <div class="col-md-6 fondoDestacado cargaImg">
                <h3>Imagen principal</h3>
                @include('imagen.modulo-imagen-angular-crop')
            </div>

            <div class="clear"></div>
            <!-- cierran columnas -->


        </div>  
            

            <div class="border-top">
                <input type="submit" value="Publicar" class="btn btn-primary marginRight5">
                <a onclick="window.history.back();" class="btn btn-default">Cancelar</a>
            </div>


            {{Form::hidden('seccion_id', $seccion_id)}}
            {{Form::hidden('descripcion', '')}}
            {{Form::hidden('tipo_precio_id[]', '2')}}
        {{Form::close()}}
    </section>
@stop

@section('footer')

    @parent

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
    <script src="{{URL::to('js/angular-file-upload.js')}}"></script>
    <script src="{{URL::to('js/ng-img-crop.js')}}"></script>
    <script src="{{URL::to('js/controllers.js')}}"></script>

@stop