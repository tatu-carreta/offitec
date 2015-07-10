@extends($project_name.'-master')

@section('contenido')
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Envíenos su consulta:</h2>
            <div class="colForm">
                {{Form::open(array('url' => 'consulta'))}}
                    <label>Nombre y apellido<br>
                        <input class="form-control" name="nombre" type="text" required>
                    </label>
                    <label>Teléfono<br>	
                        <input class="form-control" name="telefono" type="text" required>
                    </label>
                    <label>E-mail<br>
                        <input class="form-control" name="email" type="email" required>
                    </label>
                    <label>Consulta<br>
                        <textarea class="form-control" name="consulta"></textarea>
                    </label>
                    <input class="btn btn-primary" type="submit" value="Consultar">
                {{Form::close()}}
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section>
@stop