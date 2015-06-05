@extends($project_name.'-master')

@section('contenido')
    <section class="container">
        <div class="row">
            <div id="owl-demo-prod">

            @if(count($items_nuevos) > 0)
                <!-- PRODUCTOS DESTACADOS -->
                @foreach($items_nuevos as $item)
                    <div class="item">
                        <div class="col-md-12">
                            <div class="thumbnail">
                                @if(!Auth::check())
                                    <a href="{{URL::to('producto/'.$item->url)}}">
                                @endif
                                <img class="lazy" data-original="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
                                @if(!Auth::check())
                                    </a>
                                @endif
                                <div class="bandaProd nuevo">
                                    <span>{{ $item->titulo }}</span>
                                    @if((!$item->producto()->oferta()) || ($item->producto()->nuevo()))
                                        @if($c = Cart::search(array('id' => $item->producto()->id)))
                                            <a class="carrito" href="{{URL::to('carrito/borrar/'.$item->producto()->id.'/'.$c[0].'/home')}}">Quitar de Carrito</a>
                                        @else
                                            <a href="{{URL::to('carrito/agregar/'.$item->producto()->id.'/home')}}" class="btn btn-default"><i class="fa fa-plus"></i>Presupuestar</a>
                                        @endif
                                </div>
                                @else
                                    <span class="precio">Precio: ${{$item->producto()->precio(1)}} ${{$item->producto()->precio(2)}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
            @if(count($ultimos_productos) > 0)
                <!-- ULTIMOS PRODUCTOS PARA COMPLETAR -->
                @foreach($ultimos_productos as $item)
                    <div class="item"> <!-- Antes col-md-3 -->
                        <div class="col-md-12">
                            <div class="thumbnail">
                                @if(!Auth::check())
                                    <a href="{{URL::to('producto/'.$item->url)}}">
                                @endif
                                <img class="lazy" data-original="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
                                @if(!Auth::check())
                                    </a>
                                @endif
                               <div class="bandaProd nuevo">
                                    <span>{{ $item->titulo }}</span>
                                    @if((!$item->producto()->oferta()) || ($item->producto()->nuevo()))
                                        @if($c = Cart::search(array('id' => $item->producto()->id)))
                                            <a class="carrito" href="{{URL::to('carrito/borrar/'.$item->producto()->id.'/'.$c[0].'/home')}}" class="btn btn-offitec">Quitar de Carrito</a>
                                        @else
                                            <a href="{{URL::to('carrito/agregar/'.$item->producto()->id.'/home')}}" class="btn btn-default"><i class="fa fa-plus"></i>Presupuestar</a>
                                        @endif
                                    </div>
                                    @else
                                        <span class="precio">Precio: ${{$item->producto()->precio(1)}} ${{$item->producto()->precio(2)}}</span>
                                    @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <!-- SLIDE HOME -->
            @include($project_name.'-slide-home')
            </div>
        </div>
    </section>
@stop