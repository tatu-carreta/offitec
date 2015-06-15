@foreach($menu -> secciones as $seccion)
    <div class="row divListadoItems">
        @if((count($seccion->items) > 0) || Auth::check())
            <div  class="col-md-12" id="{{$menu->estado.$menu->id}}">
                @if(($seccion->titulo != "") || (Auth::check()))
                    <h3 class="pull-left" id="{{$seccion->estado.$seccion->id}}">
                        @if($seccion->titulo != "")
                            {{ $seccion -> titulo }}
                        @else 
                            @if(Auth::check()) 
                                Sección sin título {{ $seccion->id }}
                            @endif 
                        @endif
                    </h3>
                @endif

                @if(Auth::check())
                    @if(Auth::user()->can("editar_seccion"))
                        <a href="{{URL::to('admin/seccion/editar/'.$seccion->id)}}" data='{{ $seccion->id }}' class="btn popup-seccion"><i class="fa fa-pencil fa-lg"></i>Cambiar nombre</a>
                    @endif
                    @if(Auth::user()->can("borrar_seccion"))
                        <a onclick="borrarData('../admin/seccion/borrar', '{{$seccion->id}}');" class="btn"><i class="fa fa-times fa-lg"></i>Eliminar sección</a>
                    @endif
                    @if(Auth::user()->can("agregar_item"))
                        <a href="{{URL::to('admin/'.$menu->modulo()->nombre.'/agregar/'.$seccion->id)}}" data='{{ $seccion->id }}' class="btn btn-primary pull-right"><i class="fa fa-plus fa-lg"></i>{{$texto_agregar}}</a>
                    @endif
                @endif
                <div class="clearfix"></div>
                 <!-- Ver con MAXI -->
                
            </div>
        @endif
    </div>
    
        @if(count($seccion->items) > 0)
            @if(Auth::check())
                {{ Form::open(array('url' => 'admin/item/ordenar-por-seccion', 'id' => 'formularioOrdenSeccion')) }}
            @endif

            <!-- LISTADO -->
            @include($html)

            @if(Auth::check())
                {{Form::hidden('seccion_id', $seccion->id)}}
                {{Form::close()}}
            @endif
            {{-- {{$seccion->items_noticias()['paginador']->links()}} --}}

        @else
            @if(!Auth::check())
                No hay {{$texto_modulo}} aún.
            @else
            <div class="sinProductos">Sin productos</div>
            @endif
        @endif

    @if(Auth::check())
        <div id="agregar-item{{ $seccion->id }}"></div>
        <div id="destacar-producto"></div>
        <div class="modal fade" id="seccion{{$seccion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content"></div>
            </div>
        </div>
    @endif
@endforeach