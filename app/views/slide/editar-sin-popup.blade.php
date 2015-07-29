@extends($project_name.'-master')

@section('contenido')
<section class="container">
<h2 class="marginBottom2"><span>Slide. Selección de imágenes</span></h2>
    {{ Form::open(array('url' => 'admin/slide/editar')) }}

    <div class="row marginBottom2">
      <!-- Abre columna de imágenes -->
            <div class="col-md-12 cargaImg">
                <div class="fondoDestacado">
                  @include('imagen.modulo-galeria-angular')
                  
                  @if(count($slide->imagenes) > 0)
                  <div class="row imgSeleccionadas">
                      @foreach($slide->imagenes as $img)
                          
                             <div class="col-md-3">
                                 <div class="thumbnail">
                                   <div class="divCargaImg marginBottom1">
                                       <input type="hidden" name="imagen_slide_editar[]" value="{{$img->id}}">
                                       <img src="{{ URL::to($img->carpeta.$img->nombre) }}" alt="{{$slide->titulo}}">
                                        <i onclick="borrarImagenReload('{{ URL::to('admin/imagen/borrar') }}', '{{$img->id}}');" class="fa fa-times-circle fa-lg"></i>
                                    </div>
                                       <textarea class="form-control" name="epigrafe_imagen_slide_editar[]" >{{$img->epigrafe}}</textarea>
                                       
                                  
                                 </div>
                             </div>
                         
                      @endforeach
                       </div>
                  @endif
                  <div class="clearfix"></div>
                </div>
              </div>

    </div>

      <div class="border-top">
          <button type="submit" class="btn btn-primary marginRight5">Publicar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>  
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