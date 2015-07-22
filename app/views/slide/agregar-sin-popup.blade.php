@extends($project_name.'-master')

@section('contenido')
<section class="container">
    {{ Form::open(array('url' => 'admin/slide/agregar')) }}
        <div class="row marginBottom2">
            <!-- Abre columna de imágenes -->
            <div class="col-md-12 cargaImg">
                <div class="fondoDestacado">
                    <h3>Selección de imágenes</h3>
                    @include('imagen.modulo-galeria-angular')
                </div>
            </div>
        </div>  
        <button type="button" class="btn btn-default" onclick="window.history.back();">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        {{Form::hidden('seccion_id', $seccion_id)}}
        {{Form::hidden('tipo', $tipo)}}
    {{Form::close()}}
</section>
@stop

@section('footer')

    @parent

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js"></script>
    <script src="{{URL::to('js/angular-file-upload.js')}}"></script>
    <script src="{{URL::to('js/ng-img-crop.js')}}"></script>
    <script src="{{URL::to('js/controllers.js')}}"></script>
    <script src="{{URL::to('js/directives-galeria.js')}}"></script>

@stop