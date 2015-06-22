@extends($project_name.'-master')

@section('head')
    @parent
    <!-- Include OWL CARROUSEL -->
    <script src="{{URL::to('js/owl.carousel.js')}}"></script>

    <script>
    $(document).ready(function(){
        $("#owl-demo2").owlCarousel({
         
            autoPlay: 2000, //Set AutoPlay to 3 seconds 
            items : 8,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
        });
    });
    </script>
    
@stop

@section('slide-estatico')
    @include('slide.slide-estatico-offitec')
@stop

@section('contenido')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="presentacion">Equipamiento integral de oficinas. Muebles, sillas, sillones, tabiques, cortinas y complementos. Asesoramiento profesional. Muebles a medida. Envíos a todo el país.</h2>
            </div>
        </div>
        <div class="row carrouselProdHome">
            <div id="owl-demo-prod">

                @if(count($items_home) > 0)
                    <!-- PRODUCTOS DESTACADOS -->
                    @foreach($items_home as $item)
                        <div class="item">
                            <div class="col-md-12">
                                <div class="thumbnail">
                                    @if(!Auth::check())
                                    <a class="fancybox" href="{{URL::to($item->imagen_destacada()->ampliada()->carpeta.$item->imagen_destacada()->ampliada()->nombre)}}" title="{{ $item->imagen_destacada()->ampliada()->epigrafe }}">
                                    @endif
                                    <img class="lazy" src="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
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
                                        <span class="precioOferta">OFERTA: Nuevo: ${{$item->producto()->precio(1)}}, Oferta: ${{$item->producto()->precio(2)}}</span>
                                    @elseif($item->producto()->nuevo())
                                        <span class="precioNuevo">NUEVO</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 moduloItem">
            <!-- SLIDE HOME -->
            @include($project_name.'-slide-home')
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <h3>Offitec en La Plata </h3>
                    <p>Calle 39 N° 833 e/ 11 y 12 <br>Teléfono: (0221) 4221273 / Fax: (0221) 4273777 <br>Email: <a href="mailto:ventas@offitec.com">ventas@offitec.com</a></p>
                </div>
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3271.8274329658516!2d-57.96578080000005!3d-34.9107799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a2e7b4490665a3%3A0x29c5e5f3106069f4!2sCalle+39+833%2C+B1902AQG+La+Plata%2C+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1434379991554"></iframe>
            </div>
            <div class="col-md-6">
                <div class="info">
                    <h3>Offitec en Lomas de Zamora</h3>
                    <p>Av. Hipólito Yrigoyen 9275 (ex Av. Pavón) <br>Teléfono: (011) 4244 4099 <br>Email: <a href="mailto:lomas@offitec.com">lomas@offitec.com</a></p>
                </div>
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3277.6837661038417!2d-58.403364599999996!3d-34.763558100000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd2ed28db40b9%3A0xb8d7b47f437f2ca2!2sAv.+Hip%C3%B3lito+Yrigoyen+9275%2C+B1828CGE+Lomas+de+Zamora%2C+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1434380049442"></iframe>
                
            </div>
        </div>
    </section>
@stop

@section('footer')
    @parent
    <script>
        $(document).ready(function() {
          $("#owl-demo-prod").owlCarousel({
              items : 4,
              itemsDesktop : [1199,3],
              itemsDesktopSmall : [979,3]
          });
        });
    </script>
@stop