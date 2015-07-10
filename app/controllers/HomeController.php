<?php

class HomeController extends BaseController {

    public function inicio() {
        $items_home = array();
        $destacados = array();

        $slideIndex = parent::slideIndex();
        $items_oferta = parent::itemsOferta(8);

        if (count($items_oferta) < 8) {
            foreach ($items_oferta as $item_of) {
                array_push($destacados, $item_of->id);
                array_push($items_home, $item_of);
            }

            $items_nuevos = parent::itemsNuevos(8 - count($items_home));

            if ((count($items_home) + count($items_nuevos)) < 8) {

                if (count($items_nuevos) > 0) {

                    foreach ($items_nuevos as $item) {
                        array_push($destacados, $item->id);
                        array_push($items_home, $item);
                    }

                    $ultimos_productos = Item::where('estado', 'A')->join('producto', 'item.id', '=', 'producto.item_id')->whereNotIn('item.id', $destacados)->orderBy('item.fecha_modificacion', 'desc')->skip(0)->take(8 - count($items_home))->get();
                } else {
                    $ultimos_productos = Item::where('estado', 'A')->join('producto', 'item.id', '=', 'producto.item_id')->orderBy('item.fecha_modificacion', 'desc')->skip(0)->take(8 - count($items_home))->get();
                }

                foreach ($ultimos_productos as $item_ul) {
                    array_push($items_home, $item_ul);
                }
            } else {
                foreach ($items_nuevos as $item) {
                    array_push($items_home, $item);
                }
            }
        } else {
            $items_home = $items_oferta;
        }
        /*
          $items_nuevos = parent::itemsNuevos();

          if (count($items_nuevos) < 8) {
          if (count($items_nuevos) > 0) {
          $destacados = array();
          foreach ($items_nuevos as $item) {
          array_push($destacados, $item->id);
          }

          $ultimos_productos = Item::where('estado', 'A')->whereNotIn('id', $destacados)->orderBy('fecha_modificacion', 'desc')->skip(0)->take(8 - count($items_nuevos))->get();
          } else {
          $ultimos_productos = Item::where('estado', 'A')->orderBy('fecha_modificacion', 'desc')->skip(0)->take(8 - count($items_nuevos))->get();
          }
          } else {
          $ultimos_productos = NULL;
          }
         * 
         */

        //$this->array_view['items_nuevos'] = $items_nuevos;
        $this->array_view['slide_index'] = $slideIndex;
        //$this->array_view['ultimos_productos'] = $ultimos_productos;
        $this->array_view['items_home'] = $items_home;

        return View::make($this->project_name . '-inicio', $this->array_view);
    }

    public function contacto() {

        return View::make($this->project_name . '-contacto', $this->array_view);
    }

    public function error() {

        $texto = Session::get('texto');

        $this->array_view['texto'] = $texto;

        return View::make($this->project_name . '-error', $this->array_view);
    }

    public function consultaContacto() {

        $data = Input::all();
        $this->array_view['data'] = $data;

        Mail::send('emails.consulta-contacto', $this->array_view, function($message) use($data) {
            $message->from($data['email'], $data['nombre'])
                    ->to('max.-ang@hotmail.com.ar')
                    ->subject('Consulta')
            ;
        });

        if (count(Mail::failures()) > 0) {
            $mensaje = 'El mail no pudo enviarse.';
        } else {
            $mensaje = 'El mail se envió correctamente';
        }

        if (isset($data['continue']) && ($data['continue'] != "")) {
            switch ($data['continue']) {
                case "contacto":
                    return Redirect::to('contacto')->with('mensaje', $mensaje);
                    break;
                case "menu":
                    $menu = Menu::find($data['menu_id']);

                    return Redirect::to('/' . $menu->url)->with('mensaje', $mensaje);
                    break;
            }
        }

        return Redirect::to("/")->with('mensaje', $mensaje);
        //return View::make('producto.editar', $this->array_view);
    }

}
