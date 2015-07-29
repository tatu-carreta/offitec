<div class="row @if(Auth::check()) sortable @endif">
@foreach($seccion -> items as $i)

    <div class="col-md-3 moduloItem">
        <div class="thumbnail">
        @if(Auth::check())
            <div class="iconos">
            <span class="pull-left">
                @if(!$i->producto()->nuevo())
                    @if(!$i->producto()->oferta())
                        @if(Auth::user()->can("destacar_item"))
                            <i onclick="destacarItemSeccion('{{URL::to('admin/producto/nuevo')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-tag fa-lg"></i>
                        @endif
                    @endif
                @else
                    @if(Auth::user()->can("quitar_destacado_item"))
                        <i onclick="destacarItemSeccion('{{URL::to('admin/item/quitar-destacado')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-tag prodDestacado fa-lg"></i>
                    @endif
                @endif
                @if(!$i->producto()->oferta())
                    @if(Auth::user()->can("destacar_item"))
                        <a href="{{URL::to('admin/producto/oferta/'.$i->producto()->id.'/'.$seccion->id.'/seccion')}}" class="popup-nueva-seccion"><i  class="fa fa-shopping-cart fa-lg"></i></a>
                    @endif
                @else
                    @if(Auth::user()->can("quitar_destacado_item"))
                        <i onclick="destacarItemSeccion('{{URL::to('admin/item/quitar-destacado')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-shopping-cart prodDestacado fa-lg"></i>
                    @endif
                @endif
                </span>
                <span class="pull-right">
                    @if(Auth::user()->can("editar_item"))
                        <a href="{{URL::to('admin/producto/editar/'.$i->producto()->id.'/seccion/'.$seccion->id)}}" data='{{$seccion->id}}'><i class="fa fa-pencil fa-lg"></i></a>
                    @endif
                    @if(Auth::user()->can("borrar_item"))
                        <i onclick="borrarData('{{URL::to('admin/item/borrar')}}', '{{$i->id}}');" class="fa fa-times fa-lg"></i>
                    @endif
                </span>
                <div class="clearfix"></div>
            </div>
        @endif

        <a class="fancybox" href="@if(!is_null($i->imagen_destacada())){{URL::to($i->imagen_destacada()->ampliada()->carpeta.$i->imagen_destacada()->ampliada()->nombre)}}@else{{URL::to('images/sinImg.gif')}}@endif" title="@if(!is_null($i->imagen_destacada())){{ $i->imagen_destacada()->ampliada()->epigrafe }}@else{{$i->titulo}}@endif" rel='group'>
            <div class="divImgProd">
                <img class="lazy" data-original="@if(!is_null($i->imagen_destacada())){{ URL::to($i->imagen_destacada()->carpeta.$i->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$i->titulo}}">
                @if($i->producto()->oferta())
                    <span class="bandaOfertas">OFERTA: ${{$i->producto()->precio(1)}} <span>(antes: ${{$i->producto()->precio(2)}})</span></span>
                @elseif($i->producto()->nuevo())
                    <span class="bandaNuevos">NUEVO</span>
                @endif
            </div>
        </a>
        
        <div class="bandaInfoProd @if($i->producto()->nuevo()) nuevos @elseif($i->producto()->oferta()) ofertas @endif" id="Pr{{$i->producto()->id}}">
            <p class="pull-left">{{ $i->titulo }}</p>
            {{-- <p class="marca">Marca: @if(!is_null($i->producto()->marca_principal())){{$i->producto()->marca_principal()->nombre}}@endif</p> --}}
            @if(!Auth::check())
                @if($c = Cart::search(array('id' => $i->producto()->id)))
                    <a class="carrito btn btn-default pull-right" href="{{URL::to('carrito/borrar/'.$i->producto()->id.'/'.$c[0].'/seccion/'.$seccion->id)}}"><i class="fa fa-check-square-o"></i>Presupuestar</a>
                @else
                    <a href="{{URL::to('carrito/agregar/'.$i->producto()->id.'/seccion/'.$seccion->id)}}" class="btn btn-default pull-right"><i class="fa fa-square-o"></i>Presupuestar</a>
                    {{-- <a class="carrito btn btn-default pull-right" href="{{URL::to('carrito/agregar/'.$i->producto()->id)}}">Agregar Carrito</a> --}}
                @endif
            @endif
            <div class="clearfix"></div>
        </div>
        
        {{--
        @if($i->producto()->oferta())
            <span class="precio">Oferta: ${{$i->producto()->precio(1)}} ${{$i->producto()->precio(2)}}</span>
        @elseif($i->producto()->nuevo())
            <span>NUEVO</span>
        @endif
        --}}
        {{-- <a class="detalle" href="{{URL::to('producto/'.$i->url)}}">Detalle</a>	--}}
        @if(Auth::check())
            <input type="hidden" name="orden[]" value="{{$i->id}}">
        @endif            		
        </div>
    </div>

@endforeach
</div>