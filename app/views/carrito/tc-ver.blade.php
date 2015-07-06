@extends($project_name.'-master')

@section('footer_consulta_form')
<div class="clear"></div>
@stop

@section('contenido')
<section>
    @if (Session::has('mensaje'))
    <div class="divAlerta ok alert-success">{{ Session::get('mensaje') }}<i onclick="" class="cerrarDivAlerta fa fa-times fa-lg"></i></div>
    @endif
    
    <div class="container">
        <div class="row">
             <div class="col-md-12 marginBottom2">
                <h2 class="pull-left">Presupuesto</h2>
                <div class="redes pull-right">
                    <a class="facebook" href="#"></a>
                    <a class="google" href="#"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class=" col-carrito">
                    <h3>Productos seleccionados</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td> <img src="imagen1.jpg" alt=""></td>
                                <td> COD: CXR-324</td>
                                <td> <input type="" class="form-control"></td>
                                <td> <a href=""><i class="fa fa-times fa-2x"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class=" col-carrito">
                    <div class="borde">
                        <h3>Complete sus datos</h3>
                    </div>
                        <form role="form">
                            <div class="form-group">
                                <label for="ejemplo_email_1">Nombre y apellido</label>
                                <input type="email" class="form-control" id="ejemplo_email_1"
                                placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="ejemplo_password_1">Empresa</label>
                                <input type="password" class="form-control" id="ejemplo_password_1" 
                                placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="ejemplo_password_1">email</label>
                                <input type="password" class="form-control" id="ejemplo_password_1" 
                                placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="ejemplo_password_1">Teléfono</label>
                                <input type="password" class="form-control" id="ejemplo_password_1" 
                                placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="ejemplo_password_1">Comentarios</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Enviar</button>
                        </form>

                </div>
            </div>
        </div>
       <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <h4>Offitec en La Plata</h4>
                    <p>Calle 39 N° 833 e/ 11 y 12<br>
                    Teléfono: (0221) 4221273 / Fax: (0221) 4273777<br>
                    Email: ventas@offitec.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info">
                    <h4>Offitec en Lomas de Zamora</h4>
                    <p>Av. Hipólito Yrigoyen 9275 (ex Av. Pavón)<br>
                    Teléfono: (011) 4244 4099<br>
                    Email: lomas@offitec.com</p>
                </div>
            </div>
        </div>
    <table>
           
</div>          
            <!--
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Borrar</th>
            </tr>
            @if(Cart::count()>0)
                @foreach(Cart::content() as $producto)
                <tr>
                    <td><img class="lazy" data-original="@if(!is_null($producto->producto->item()->imagen_destacada())){{ URL::to($producto->producto->item()->imagen_destacada()->carpeta.$producto->producto->item()->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$producto->producto->item()->titulo}}"></td>
                    <td>{{ $producto->producto->item()->titulo }}</td>
                    <td><input class="cant_prod_carrito" type="text" name="cantidad" value="{{ $producto->qty }}" data='{{ $producto->rowid }}' id="{{ $producto->id }}"></td>
                    <td><a href="{{URL::to('carrito/borrar/'.$producto->id.'/'.$producto->rowid.'/carrito')}}">Borrar</a></td>
                </tr>
                @endforeach
                <tr>
                    <td>Total</td>
                    <td></td>
                    <td><a href="{{ URL::to('carrito/borrar') }}">Borrar Carrito</a></td>
                    <td></td>
                    <td>${{Cart::total()}}</td>
                </tr>
            @endif
        </table> 
        -->
   
</section>
@stop