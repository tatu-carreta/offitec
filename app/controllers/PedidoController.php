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

        $input = Input::all();

        Input::flashOnly('nombre', 'email', 'empresa', 'telefono', 'consulta');
        
        $reglas = array(
            'email' => array('required', 'email'),
            'nombre' => array('required'),
            'telefono' => array('required'),
        );

        $validator = Validator::make($input, $reglas);

        if ($validator->fails()) {
            $messages = $validator->messages();
            if ($messages->has('nombre')) {
                $mensaje = $messages->first('nombre');
            } elseif ($messages->has('email')) {
                $mensaje = $messages->first('email');
            } elseif ($messages->has('telefono')) {
                $mensaje = $messages->first('telefono');
            } else {
                $mensaje = 'Los datos de contacto para el envio del presupuesto son erróneos.';
            }

            return Redirect::to('/carrito')->with('mensaje', $mensaje)->with('error', true)->withInput();
        } else {
            $productos = array();
            if (Session::has('carrito')) {

                $carrito_id = Session::get('carrito');

                $carrito = Carrito::find($carrito_id);

                $datos = DB::table('carrito_producto')->where('carrito_id', $carrito->id)->where('estado', 'A')->get();



                foreach ($datos as $prod) {

                    $data = array(
                        'id' => $prod->producto_id,
                        'cantidad' => $prod->cantidad,
                        'precio' => $prod->precio
                    );

                    array_push($productos, $data);
                }
            }



            if (count($productos) == 0) {
                $mensaje = 'Para realizar el presupuesto debe seleccionar al menos un producto.';
                return Redirect::to('/carrito')->with('mensaje', $mensaje)->with('error', true)->withInput();
            } else {

                //Levanto los datos del formulario del presupuesto para
                //generar la persona correspondiente al pedido
                $datos_persona = array(
                    'email' => Input::get('email'),
                    'apellido' => Input::get('nombre'),
                    'nombre' => Input::get('empresa'),
                    'tipo_telefono_id' => 2,
                    'telefono' => Input::get('telefono')
                );

                $persona = Persona::agregar($datos_persona);

                if ($persona['error']) {
                    $mensaje = 'Hubo un error al realizar el pedido. Vuelva a intentarlo en unos minutos.';
                    return Redirect::to('/carrito')->with('mensaje', $mensaje)->with('error', true);
                } else {

                    $datos_pedido = array(
                        'persona_id' => $persona['data']->id,
                        'productos' => $productos,
                    );

                    $respuesta = Pedido::agregar($datos_pedido);

                    if ($respuesta['error']) {

                        return Redirect::to('/carrito')->with('mensaje', $respuesta['mensaje'])->with('error', true);
                    } else {

                        $datos_resumen_pedido = array(
                            'persona_id' => $persona['data']->id,
                            'productos' => $productos,
                            'email' => Input::get('email'),
                            'nombre' => Input::get('nombre'),
                            'telefono' => Input::get('telefono'),
                            'empresa' => Input::get('empresa'),
                            'consulta' => Input::get('consulta')
                        );

                        $envio_mail = $this->resumenPedido($datos_resumen_pedido);

                        if ($envio_mail) {
                            Cart::destroy();

                            Session::forget('carrito');

                            $mensaje = 'El presupuesto fue enviado.';

                            return Redirect::to('/')->with('mensaje', $mensaje)->with('ok', true);
                        } else {
                            $mensaje = 'El mail con el resumen de su presupuesto no pudo enviarse correctamente. Vuelva a intentarlo en unos minutos.';
                            return Redirect::to('/carrito')->with('mensaje', $mensaje)->with('error', true);
                        }
                    }
                }
            }
        }
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
        $this->array_view['data'] = $data;

        Mail::send('emails.consulta-pedido', $this->array_view, function($message) use($data) {
            $message->from($data['email'], $data['nombre'])
                    ->to('lomas@offitec.com')
                    ->subject('Pedido de presupuesto')
            ;
        });

        if (count(Mail::failures()) > 0) {
            $mensaje = 'El mail no pudo enviarse.';
            $ok = FALSE;
        } else {

            //$data['nombre_apellido'] = $data['nombre'];
            //Cliente::agregar($data);

            $mensaje = 'El mail se envió correctamente';
            $ok = TRUE;
        }

        return $ok;
    }

}
