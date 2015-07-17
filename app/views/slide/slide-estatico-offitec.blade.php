<!-- abre S L I D E estático -->
<div class="slideHome">
    
    <div class="wrapper">
                    <div id="ei-slider" class="ei-slider">
                        <ul class="ei-slider-large">
                            <li>
                                <img src="{{URL::to('images/slide1.jpg')}}" alt="image01" />
                                <div class="ei-title">
                                    <h3>diseño</h3>
                                </div>
                            </li>
                            <li>
                                <img src="{{URL::to('images/slide2.jpg')}}" alt="image01" />
                                <div class="ei-title">
                                    <h3>ergonomía</h3>
                                </div>
                            </li>
                            <li>
                                <img  src="{{URL::to('images/slide3.jpg')}}" alt="image02" />
                                <div class="ei-title">
                                    <h3>confort</h3>
                                </div>
                            </li>
                            <li>
                                <img src="{{URL::to('images/slide4.jpg')}}"alt="image03"/>
                                <div class="ei-title">
                                    <h3>estilo</h3>
                                </div>
                            </li>
                            <li>
                                <img src="{{URL::to('images/slide5.jpg')}}" alt="image04"/>
                                <div class="ei-title">
                                   <h3>funcionalidad</h3>
                                </div>
                            </li>
                       
                        </ul><!-- ei-slider-large -->
                    
                        <ul class="ei-slider-thumbs">
                                <li class="ei-slider-element">Current</li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                                <li><a href="#"></a><img src="" alt="" /></li>
                            </ul><!-- ei-slider-thumbs -->
                    </div><!-- ei-slider -->

            </div><!-- wrapper -->

</div><!-- cierra S L I D E estático --> 

<!--C A R O U S E L de colores-->
<div class="fondo-negro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contenedor-carousel">
                    <div class="carousel-home">
                        <div id="owl-demo2">
                            <?php $i = 0; ?>
                            @foreach($menu_dinamico as $menu)
                                @if(count($menu->children) > 0)
                                    @foreach($menu->children as $ch)
                                        <div class="item">
                                            <a class="@if(in_array($i, [0, 5, 10, 15])) boton-naranja @elseif(in_array($i, [1, 6, 11, 16])) boton-rojo @elseif(in_array($i, [2, 7, 12, 17])) boton-violeta @elseif(in_array($i, [3, 8, 13, 18])) boton-azul @elseif(in_array($i, [4, 9, 14, 19])) boton-verde @endif" href="{{URL::to($ch->url)}}">
                                                <span>{{ $ch->nombre }}</span>
                                            </a>
                                        </div>
                                        <?php $i++; ?>
                                    @endforeach
                                @endif
                            @endforeach
                            <!--
                                <div class="item"><a class="" href="#">muebles<br>operativos</a></div>
                                <div class="item"><a class="" href="#">mesas <br> de reunión</a></div>
                                <div class="item"><a class="" href="#">mesas <br>bajas</a></div>
                                <div class="item"><a class="" href="#">muebles <br> de guardado</a></div>
                                <div class="item"><a class="boton-naranja" href="#">asientos<br>gerenciales</a></div>
                                <div class="item"><a class="boton-rojo" href="#">asientos<br>operativos</a></div>
                                <div class="item"><a class="boton-violeta" href="#">sillas <br>de visita</a></div>
                                <div class="item"><a class="boton-azul" href="#">sillones <br>de visita</a></div>
                                <div class="item"><a class="boton-verde" href="#">cortinas<br> a medida</a></div>
                                <div class="item"><a class="boton-naranja" href="#">accesorios <br>y complementos</a></div>
                                <div class="item"><a class="boton-rojo" href="#">deco <br>casa</a></div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>