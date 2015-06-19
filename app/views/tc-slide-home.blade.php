
<script src="{{URL::to('js/jquery.flexslider.js')}}"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
</script>

<div class="slideDinamicoHome">
    <!-- Place somewhere in the <body> of your page -->
    <div class="flexslider">
        <ul class="slides">
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
        </ul>
    </div>

</div>
