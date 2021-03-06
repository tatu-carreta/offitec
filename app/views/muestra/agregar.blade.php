@extends($project_name.'-master')

@section('head')

    @parent

    <link rel="stylesheet" href="{{URL::to('css/ng-img-crop.css')}}" />
@stop

@section('contenido')
    <script src="{{URL::to('js/ckeditorLimitado.js')}}"></script>
    @if (Session::has('mensaje'))
        <script src="{{URL::to('js/divAlertaFuncs.js')}}"></script>
    @endif
    <section class="container">
        {{ Form::open(array('url' => 'admin/muestra/agregar', 'files' => true, 'role' => 'form')) }}
            <h2 class="marginBottom2"><span>Carga y modificación de muestra</span></h2>
        
            <h3>Título de la muestra</h3>
            <input class="block anchoTotal marginBottom" type="text" name="titulo" placeholder="Título" required="true" maxlength="50">
            
            <div class="row marginBottom2">
                <!-- Abre columna de imágenes -->
                <div class="col-md-4 fondoDestacado cargaImg">
                    <h3>Imagen principal</h3>
                    @include('imagen.modulo-imagen-angular-crop')
                </div>

                <div class="clear"></div>
                <!-- cierran columnas -->
            </div>  
            
            <h3>Cuerpo</h3>
            <div class="divEditorTxt marginBottom2">
                <textarea id="texto" contenteditable="true" name="cuerpo"></textarea>
            </div>
            

            <div class="punteado">
                <input type="submit" value="Publicar" class="btn btn-primary marginRight5">
                <a onclick="window.history.back();" class="btn btn-default">Cancelar</a>
            </div>


            {{Form::hidden('seccion_id', $seccion_id)}}
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
