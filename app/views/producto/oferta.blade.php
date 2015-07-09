@extends($project_name.'-master')

@section('head')@stop
@section('header')@stop

@section('contenido')
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Producto en oferta</h4>
    </div>
    {{ Form::open(array('url' => 'admin/producto/oferta')) }}
        <div class="modal-body">
            <div class="form-group marginBottom2">
                <input class="form-control" type="text" name="precio_antes" placeholder="Precio Anterior" required="true">
            </div>
            <div class="form-group marginBottom2">
                <input class="form-control" type="text" name="precio_actual" placeholder="Precio Actual" required="true">
            </div>
            
            {{Form::hidden('continue', $continue)}}
            {{Form::hidden('producto_id', $producto->id)}}
            {{Form::hidden('seccion_id', $seccion_id)}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    {{Form::close()}}
@stop

@section('footer')@stop