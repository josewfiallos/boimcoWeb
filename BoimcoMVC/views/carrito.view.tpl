<title>Carrito de compras - Boimco</title>
<div class="bannerGeneral">
  <p>
    Carrito Compras
  </p>
</div>
{{if productos}}
{{foreach productos}}
<div class="carritoGeneral">
  <table>
      <td id="imga" >
        <a><img src="{{imgProducto}}" width="90px" height="90px"/></a>
      </td>
      <td id="cont">
        <b>Producto:</b> {{nombreProducto}}<br>
        <b>Cantidad:</b> {{cantidadProductos}}<br>
        <b>Precio Unitario:</b> {{precioProductos}}<br>
        <b>Subtotal:</b> {{subtotal}}<br>
      </td>
      <td id="elim">
        <form method="post">
            <button type="submit" name="btnEliminar" onclick="return confirm('Si acepta, eliminará este producto de su carrito de comrpas. ¿Desea continuar?')">Eliminar</button>
            <input type="hidden" name="idCarrito" value="{{idCarrito}}">
        </form>
      </td>
  </table>
</div>
  {{endfor productos}}
  <br><br>
<div align="center">
  <div class="totales">
<table >
  <tr>
    <td> <b>Subtotal: </b></td>
    <td>{{subtotal}}</td>
  </tr>
  <tr>
    <td> <b>Impuestos: </b></td>
    <td>{{impuesto}}</td>
  </tr>

  <tr>
    <td> <b>Total: </b></td>
    <td>{{total}}</td>
  </tr>

</table>
</div>
<br>
<form class="factura" method="post">
  <button id="btnBorrarCarrito" type="submit" name="btnBorrarCarrito" onclick="return confirm('Si acepta, eliminará todos los productos de su carrito de compras. ¿Desea continuar?')">Eliminar Carrito De Compras</button>
  <button type="submit" name="btnFacturar">Realizar Compra</button>
</form>
{{endif productos}}

</div>
