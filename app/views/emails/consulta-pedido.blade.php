<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <div style="max-width: 600px; font-family: sans-serif; font-size:16px; line-height:20px; padding:30px; color: #0E4B70">
            <!-- remitente -->
            <p style="font-weight:bold; font-size: 18px">CONSULTA:</p>
            <p>
                <strong>Nombre y Apellido: </strong>{{ $data['nombre'] }}<BR>
                <strong>Email: </strong>{{ $data['email'] }}<BR>
                @if(isset($data['empresa']))
                <strong>Empresa: </strong>{{ $data['empresa'] }}<BR>
                @endif
                @if(isset($data['telefono']))
                <strong>Teléfono: </strong>{{ $data['telefono'] }}<BR>
                @endif
                @if(isset($data['consulta']))
                <strong>Consulta: </strong>{{ $data['consulta'] }}
                @endif
            </p>
            
            <!-- PRODUCTOS -->
            @if(count($data['productos']) > 0)
                @foreach($data['productos'] as $producto)
                    <strong>COD:</strong>{{ Producto::find($producto['id'])->item()->titulo }}<br>
                    @if(!is_null(Producto::find($producto['id'])->item()->imagen_destacada()))<strong>IMG:</strong><img src="{{URL::to(Producto::find($producto['id'])->item()->imagen_destacada()->carpeta.Producto::find($producto['id'])->item()->imagen_destacada()->nombre) }}"><br>@endif
                    <strong>CNT:</strong>{{ $producto['cantidad'] }}<br>
                @endforeach
            @endif
        </div>
    </body>
</html>