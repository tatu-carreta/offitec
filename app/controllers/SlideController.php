<?php

class SlideController extends BaseController {

    protected $folder_name = 'slide';

    public function vistaAgregar($menu_id, $tipo) {
        $datos = array(
            'titulo' => '',
            'menu_id' => $menu_id
        );

        $seccion = Seccion::agregarSeccion($datos);
        
        $this->array_view['seccion_id'] = $seccion['data']->id;
        $this->array_view['tipo'] = $tipo;

        return View::make($this->folder_name . '.agregar-sin-popup', $this->array_view);
    }

    public function agregar() {

        //Aca se manda a la funcion agregarItem de la clase Item
        //y se queda con la respuesta para redirigir cual sea el caso
        $respuesta = Slide::agregarSlideHome(Input::all());

        if ($respuesta['error'] == true) {
            return Redirect::to('admin/item')->with('mensaje', $respuesta['mensaje'])->with('error', true);
        } else {
            $menu = $respuesta['data']->seccion->menuSeccion()->url;
            $ancla = '#' . $respuesta['data']->seccion->estado . $respuesta['data']->seccion->id;

            return Redirect::to('/' . $menu)->with('mensaje', $respuesta['mensaje'])->with('ancla', $ancla)->with('ok', true);
        }
    }
    
    public function vistaEditar($id, $next) {
        $slide = Slide::find($id);
        
        $this->array_view['slide'] = $slide;
        $this->array_view['continue'] = $next;

        return View::make($this->folder_name . '.editar-sin-popup', $this->array_view);
    }

    public function editar() {

        //Aca se manda a la funcion agregarItem de la clase Item
        //y se queda con la respuesta para redirigir cual sea el caso
        $respuesta = Slide::editarSlideHome(Input::all());

        if ($respuesta['error'] == true) {
            return Redirect::to('/')->with('mensaje', $respuesta['mensaje'])->with('error', true);
        } else {
            
            return Redirect::to('/')->with('mensaje', $respuesta['mensaje'])->with('ok', true);
        }
    }

}
