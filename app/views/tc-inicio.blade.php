@extends($project_name.'-master')

@section('contenido')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="presentacion">Equipamiento integral de oficinas. Muebles, sillas, sillones, tabiques, cortinas y complementos. Asesoramiento profesional. Muebles a medida. Envíos a todo el país.</h2>
            </div>
        </div>
        <div class="row">
            <div id="owl-demo-prod">

                @if(count($items_home) > 0)
                    <!-- PRODUCTOS DESTACADOS -->
                    @foreach($items_home as $item)
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
                                    <div class="bandaProd @if($item->producto()->nuevo()) nuevos @elseif($item->producto()->oferta()) ofertas @endif">
                                        <span class="pull-left">{{ $item->titulo }}</span>
                                        @if($c = Cart::search(array('id' => $item->producto()->id)))
                                            <a href="{{URL::to('carrito/borrar/'.$item->producto()->id.'/'.$c[0].'/home')}}" class="carrito btn btn-default pull-right">Quitar de Carrito</a>
                                        @else
                                            <a href="{{URL::to('carrito/agregar/'.$item->producto()->id.'/home')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i>Presupuestar</a>
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                    @if($item->producto()->oferta())
                                        <span class="precio">Oferta: ${{$item->producto()->precio(1)}} ${{$item->producto()->precio(2)}}</span>
                                    @elseif($item->producto()->nuevo())
                                        <span>NUEVO</span>
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