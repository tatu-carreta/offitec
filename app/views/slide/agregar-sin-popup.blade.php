@extends($project_name.'-master')

@section('contenido')
<section class="container">
    <h2 class="marginBottom2"><span>Slide. Selección de imágenes</span></h2>
    {{ Form::open(array('url' => 'admin/slide/agregar')) }}
        <div class="row marginBottom2">
            <!-- Abre columna de imágenes -->
            <div class="col-md-12 cargaImg">
                <div class="fondoDestacado">
                    @include('imagen.modulo-galeria-angular')
                </div>
            </div>
        </div>  
        <div class="border-top">
            <button type="submit" class="btn btn-primary marginRight5">Publicar</button>
            <button type="button" class="btn btn-default" onclick="window.history.back();">Cancelar</button>
        </div>

        
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