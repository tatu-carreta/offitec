@extends($project_name.'-master')

@section('contenido')
    <section class="container">
        <h1>Inicio</h1>
        <div class="clear"></div>
        <ul>
            <!-- PRODUCTOS DESTACADOS -->
            @foreach($items_nuevos as $item)
                <li>
                    @if(!Auth::check())
                        <a href="{{URL::to('producto/'.$item->url)}}">
                    @endif
                    <img class="lazy" data-original="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
                    @if(!Auth::check())
                        </a>
                    @endif
                    <p>{{ $item->titulo }}</p>
                    @if((!$item->producto()->oferta()) || ($item->producto()->nuevo()))
                        @if($c = Cart::search(array('id' => $item->producto()->id)))
                            <a class="carrito" href="{{URL::to('carrito/borrar/'.$item->producto()->id.'/'.$c[0].'/home')}}">Quitar de Carrito</a>
                        @else
                            <a href="{{URL::to('carrito/agregar/'.$item->producto()->id.'/home')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Agregar a presupuesto</a>
                        @endif

                    @else
                        <span class="precio">Precio: ${{$item->producto()->precio(1)}} ${{$item->producto()->precio(2)}}</span>
                    @endif
                </li>
            @endforeach
            @if(count($ultimos_productos) > 0)
                <!-- ULTIMOS PRODUCTOS PARA COMPLETAR -->
                @foreach($ultimos_productos as $item)
                    <li>
                        @if(!Auth::check())
                            <a href="{{URL::to('producto/'.$item->url)}}">
                        @endif
                        <img class="lazy" data-original="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
                        @if(!Auth::check())
                            </a>
                        @endif
                        <p>{{ $item->titulo }}</p>
                        @if((!$item->producto()->oferta()) || ($item->producto()->nuevo()))
                            @if($c = Cart::search(array('id' => $item->producto()->id)))
                                <a class="carrito" href="{{URL::to('carrito/borrar/'.$item->producto()->id.'/'.$c[0].'/home')}}">Quitar de Carrito</a>
                            @else
                                <a href="{{URL::to('carrito/agregar/'.$item->producto()->id.'/home')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Agregar a presupuesto</a>
                            @endif

                        @else
                            <span class="precio">Precio: ${{$item->producto()->precio(1)}} ${{$item->producto()->precio(2)}}</span>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
        <!-- SLIDE HOME -->
        @include($project_name.'-slide-home')
    </section>
@stop