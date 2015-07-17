
<script src="{{URL::to('js/jquery.flexslider.js')}}"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
</script>

@if(Auth::check())
    @if (!is_null($slide_index) && !is_null($slide_index -> imagenes))
        <a href="{{URL::to('admin/slide/editar/'.$slide_index->id.'/home')}}">Editar Slide Home</a>
    @endif
@endif

<div class="slideDinamicoHome">
    <!-- Place somewhere in the <body> of your page -->
    <div class="flexslider">
        <ul class="slides">
            @if (!is_null($slide_index) && !is_null($slide_index -> imagenes))
                @foreach($slide_index -> imagenes as $img)
                    <li>
                        <div class="imgSlideFlex"><img src="{{ URL::to($img->carpeta.$img->nombre) }}" /></div>
                        <div class="flex-caption">
                            <p>{{ $img->epigrafe }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endforeach
            @else
                <li>
                    <div class="imgSlideFlex"><img src="{{URL::to('images/foto1.jpg')}}" /></div>
                    <div class="flex-caption">
                        <p>Descripción de la Imagen</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="imgSlideFlex"><img src="{{URL::to('images/foto1.jpg')}}" /></div>
                    <div class="flex-caption">
                        <p>Descripción de la Imagen</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            @endif
        </ul>
    </div>

</div>
