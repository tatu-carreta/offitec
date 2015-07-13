<?php

class PedidoController extends BaseController {
    /*
      public function vistaListado() {

      //Hace que se muestre el html lista.blade.php de la carpeta categoria
      //con los parametros pasados por el array
      return View::make('carrito.' . $this->project_name . '-ver', $this->array_view);
      }
     * 
     */

    public function agregarPedido() {

        $carrito_id = Session::get('carrito');

        $carrito = Carrito::find($carrito_id);

        $datos = DB::table('carrito_producto')->where('carrito_id', $carrito->id)->where('estado', 'A')->get();

        $productos = array();

        foreach ($datos as $prod) {

            $data = array(
                'id' => $prod->producto_id,
                'cantidad' => $prod->cantidad,
                'precio' => $prod->precio
            );

            array_push($productos, $data);
        }

        //Levanto los datos del formulario del presupuesto para
        //generar la persona correspondiente al pedido
        $datos_persona = array(
            'email' => Input::get('email'),
            'apellido' => Input::get('nombre'),
            'tipo_telefono_id' => 2,
            'telefono' => Input::get('telefono')
        );

        $persona = Persona::agregar($datos_persona);

        $datos_pedido = array(
            'persona_id' => $persona['data']->id,
            'productos' => $productos
        );

        $respuesta = Pedido::agregar($datos_pedido);

        if ($respuesta['error']) {

            return Redirect::to('/carrito')->with('mensaje', $respuesta['mensaje'])->with('error', true);
        } else {

            $this->resumenPedido($datos_persona);

            Cart::destroy();

            Session::forget('carrito');

            return Redirect::to('/')->with('mensaje', $respuesta['mensaje'])->with('ok', true);
        }

        /*
          switch ($continue) {
          case 'home':
          return Redirect::to('/')->with('mensaje', $respuesta['mensaje']);
          break;
          case 'seccion':
          $menu = $producto->item()->seccionItem()->menuSeccion()->url;
          $ancla = '#' . $producto->item()->seccionItem()->estado . $producto->item()->seccionItem()->id;

          return Redirect::to('/' . $menu)->with('mensaje', $respuesta['mensaje'])->with('ancla', $ancla);
          break;
          case 'carrito':
          return Redirect::to('/carrito')->with('mensaje', $respuesta['mensaje']);
          break;
          default :
          return Redirect::to('/')->with('mensaje', $respuesta['mensaje']);
          break;
          }
         * 
         */
        //CIERRO EL CARRITO
    }

    public function editarProducto($producto_id, $rowId) {

        $info = array(
            'producto_id' => $producto_id,
            'rowId' => $rowId,
            'cantidad' => Input::get('cantidad')
        );

        //Aca se manda a la funcion borrarItem de la clase Item
        //y se queda con la respuesta para redirigir cual sea el caso
        $respuesta = Carrito::editarProducto($info);

        return $respuesta;
    }

    public function borrarProducto($producto_id, $rowId, $continue) {

        $info = array(
            'producto_id' => $producto_id,
            'rowId' => $rowId
        );

        //Aca se manda a la funcion borrarItem de la clase Item
        //y se queda con la respuesta para redirigir cual sea el caso
        $respuesta = Carrito::borrarProducto($info);

        $producto = Producto::find($producto_id);
        switch ($continue) {
            case 'home':
                return Redirect::to('/')->with('mensaje', $respuesta['mensaje']);
                break;
            case 'seccion':
                $menu = $producto->item()->seccionItem()->menuSeccion()->url;
                $ancla = '#' . $producto->item()->seccionItem()->estado . $producto->item()->seccionItem()->id;

                return Redirect::to('/' . $menu)->with('mensaje', $respuesta['mensaje'])->with('ancla', $ancla);
                break;
            case 'carrito':
                return Redirect::to('/carrito')->with('mensaje', $respuesta['mensaje']);
                break;
            default :
                return Redirect::to('/')->with('mensaje', $respuesta['mensaje']);
                break;
        }
        //return Redirect::to('/carrito')->with('mensaje', $respuesta['mensaje']);
    }

    public function borrar() {

        //Aca se manda a la funcion borrarItem de la clase Item
        //y se queda con la respuesta para redirigir cual sea el caso
        $respuesta = Carrito::borrar();

        return Redirect::to('/carrito')->with('mensaje', $respuesta['mensaje']);
    }

    public function resumenPedido($info) {

        $data = $info;
        $this->array_view['data'] = $info;

        Mail::send('emails.consulta-pedido', $this->array_view, function($message) use($data) {
            $message->from($data['email'], $data['nombre'])
                    ->to('max.-ang@hotmail.com.ar')
                    ->subject('Pedido de presupuesto')
            ;
        });

        if (count(Mail::failures()) > 0) {
            $mensaje = 'El mail no pudo enviarse.';
        } else {

            //$data['nombre_apellido'] = $data['nombre'];
            //Cliente::agregar($data);

            $mensaje = 'El mail se envió correctamente';
        }
    }

}
