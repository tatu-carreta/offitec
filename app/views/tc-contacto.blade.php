@extends($project_name.'-master')

@section('contenido')
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Envíenos su consulta:</h2>
            <div class="colForm">
                {{Form::open(array('url' => 'consulta'))}}
                    <div class="form-group">
                        <label for="nombre">Nombre y apellido</label>
                        {{Form::text('nombre', Input::old('nombre'),  array('id' => 'nombre','class' => 'form-control', 'required' => true))}}    
                        <!--<input type="type" class="form-control" id="ejemplo_email_1"
                               placeholder="" name="nombre">-->
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        {{Form::email('email', Input::old('email'),  array('id' => 'email','class' => 'form-control', 'required' => true))}} 
                        <!--<input type="email" class="form-control" id="ejemplo_password_1" 
                               placeholder="" name="email">-->
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        {{Form::text('telefono', Input::old('telefono'),  array('id' => 'telefono','class' => 'form-control'))}} 
                        <!--<input type="type" class="form-control" id="ejemplo_password_1" 
                               placeholder="" name="telefono">-->
                    </div>
                    <div class="form-group">
                        <label for="consulta">Comentarios</label>
                        {{Form::textarea('consulta', Input::old('consulta'),  array('id' => 'consulta','class' => 'form-control', 'rows' => 3))}} 
                        <!--<textarea class="form-control" rows="3" name="consulta"></textarea>-->
                    </div>
                    <button class="btn btn-primary" type="submit">Consultar</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</section>
@stop