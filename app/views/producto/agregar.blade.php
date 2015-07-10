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
            <h2 class="marginBottom2"><span>Nuevo producto</span></h2>

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
                    <!--
                    <div class="fondoDestacado marginBottom05">
                        <div class="radio">
                            <label>
                                <input id="" class="" type="checkbox" name="item_destacado" value="B" checked="true">
                                Normal
                            </label>
                        </div>
                    </div>
                    -->
                    <div class="fondoDestacado marginBottom05">
                        <div class="radio">
                            <label>
                                <input id="" class="" type="checkbox" name="item_destacado" value="N">
                                Nuevo
                            </label>
                        </div>
                    </div>
                    <div class="fondoDestacado marginBottom05">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="radio">
                                    <label>
                                        <input id="" class=" precioDisabled" type="checkbox" name="item_destacado" value="O">
                                        Oferta
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="" >
                                    Precio Antes $ <input id="" class="form-control inputWidth80 precioAble1" type="text" name="precio_antes" value="">
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="" >
                                    Precio Después $ <input id="" class="form-control inputWidth80 precioAble" type="text" name="precio_actual" value="">
                                </label>
                            </div>    
                        </div>
                    </div>
                    <p>Los productos nuevos y las ofertas se muestran en la home</p>
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