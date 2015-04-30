<ul class="ulProductos @if(Auth::check()) sortable @endif">
    @foreach($seccion -> items as $i)
        <li>
            @if(Auth::check())
                <div class="iconos">
                    @if(!$i->producto()->nuevo())
                        @if(Auth::user()->can("destacar_item"))
                            <i onclick="destacarItemSeccion('{{URL::to('admin/producto/nuevo')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack fa-lg"></i>
                        @endif
                    @else
                        @if(Auth::user()->can("quitar_destacado_item"))
                            <i onclick="destacarItemSeccion('{{URL::to('admin/item/quitar-destacado')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack prodDestacado fa-lg"></i>
                        @endif
                    @endif
                    @if(!$i->producto()->oferta())
                        @if(Auth::user()->can("destacar_item"))
                            <a href="{{URL::to('admin/producto/oferta/'.$i->producto()->id.'/'.$seccion->id.'/seccion')}}" class="destacarProducto"><i  class="fa fa-thumb-tack fa-lg"></i></a>
                        @endif
                    @else
                        @if(Auth::user()->can("quitar_destacado_item"))
                            <i onclick="destacarItemSeccion('{{URL::to('admin/item/quitar-destacado')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack prodDestacado fa-lg"></i>
                        @endif
                    @endif
                    <span class="floatRight">
                        @if(Auth::user()->can("editar_item"))
                            <a href="{{URL::to('admin/producto/editar/'.$i->producto()->id.'/seccion')}}" data='{{$seccion->id}}'><i class="fa fa-pencil fa-lg"></i></a>
                        @endif
                        @if(Auth::user()->can("borrar_item"))
                            <i onclick="borrarData('{{URL::to('admin/item/borrar')}}', '{{$i->id}}');" class="fa fa-times fa-lg"></i>
                        @endif
                    </span>
                </div>
            @endif

            @if($i->producto()->nuevo())
            <h2>NUEVO</h2>
            @elseif($i->producto()->oferta())
            <h2>OFERTA</h2>
            @endif
            
            @if(!Auth::check())
                <a href="{{URL::to('producto/'.$i->url)}}">
            @endif
                    <img class="lazy" data-original="@if(!is_null($i->imagen_destacada())){{ URL::to($i->imagen_destacada()->carpeta.$i->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$i->titulo}}">
            @if(!Auth::check())
                </a>
            @endif

            <p class="tituloProducto"><span>{{ $i->titulo }}</span></p>
            {{-- <p class="marca">Marca: @if(!is_null($i->producto()->marca_principal())){{$i->producto()->marca_principal()->nombre}}@endif</p> --}}
            @if((!$i->producto()->oferta()) || ($i->producto()->nuevo()))
                @if($c = Cart::search(array('id' => $i->producto()->id)))
                    <a class="carrito" href="{{URL::to('carrito/borrar/'.$i->producto()->id.'/'.$c[0])}}">Quitar de Carrito</a>
                @else
                    <a class="carrito" href="{{URL::to('carrito/agregar/'.$i->producto()->id)}}">Agregar Carrito</a>
                @endif
                
            @else
                <span class="precio">Precio: ${{$i->producto()->precio(1)}} ${{$i->producto()->precio(2)}}</span>
            @endif
            
            {{-- <a class="detalle" href="{{URL::to('producto/'.$i->url)}}">Detalle</a>	--}}
            @if(Auth::check())
                <input type="hidden" name="orden[]" value="{{$i->id}}">
            @endif            		
        </li>
    @endforeach
</ul>