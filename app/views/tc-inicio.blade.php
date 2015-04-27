@extends($project_name.'-master')

@section('contenido')
    <section>
        <h1>Inicio</h1>
        <div class="clear"></div>
        <ul>
            @foreach($items_nuevos as $item)
                <li>
                    @if(!Auth::check())
                        <a href="{{URL::to('producto/'.$item->url)}}">
                    @endif
                    <img class="lazy" data-original="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
                    @if(!Auth::check())
                        </a>
                    @endif
                    <p class="tituloProducto"><span>{{ $item->titulo }}</span></p>
                </li>
            @endforeach
            @if(count($ultimos_productos) > 0)
                @foreach($ultimos_productos as $item)
                    <li>
                        @if(!Auth::check())
                            <a href="{{URL::to('producto/'.$item->url)}}">
                        @endif
                        <img class="lazy" data-original="@if(!is_null($item->imagen_destacada())){{ URL::to($item->imagen_destacada()->carpeta.$item->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$item->titulo}}">
                        @if(!Auth::check())
                            </a>
                        @endif
                        <p class="tituloProducto"><span>{{ $item->titulo }}</span></p>
                    </li>
                @endforeach
            @endif
        </ul>
    </section>
@stop