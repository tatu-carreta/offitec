@extends($project_name.'-master')

@section('contenido')
<section class="container">
    {{ Form::open(array('url' => 'admin/slide/editar')) }}
        @include('imagen.modulo-galeria-angular')
        
        @if(count($slide->imagenes) > 0)
        
            @foreach($slide->imagenes as $img)
                <div class="imgSeleccionadas">
                   <div class="col-md-3">
                       <div class="thumbnail">
                           <input type="hidden" name="imagen_slide_editar[]" value="{{$img->id}}">
                           <img class="marginBottom1" src="{{ URL::to($img->carpeta.$img->nombre) }}" alt="{{$slide->titulo}}">
                           <textarea class="form-control" name="epigrafe_imagen_slide_editar[]" >{{$img->epigrafe}}</textarea>
                           <i onclick="borrarImagenReload('{{ URL::to('admin/imagen/borrar') }}', '{{$img->id}}');" class="fa fa-times-circle fa-lg"></i>
                       </div>
                   </div>
                </div>
            @endforeach
        @endif
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        {{Form::hidden('slide_id', $slide->id)}}
        {{Form::hidden('continue', $continue)}}
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