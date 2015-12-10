<title>Registro Compras - Boimco</title>
<div class="bannerGeneral">
  <p>
    Articulos de Factura No. {{idFactura}}
  </p>
</div>
{{if productosDetalles}}
{{foreach productosDetalles}}
<div class="carritoGeneral">
  <table>
      <td id="imga" >
        <a><img src="{{imgProducto}}" width="90px" height="90px"/></a>
      </td>
      <td id="cont2">
        <b>Producto:</b> {{nombreProducto}}<br>
        <b>Cantidad:</b> {{cantidadProducto}}<br>
        <b>Precio Unitario:</b> {{precioProducto}}<br>
        <b>SubTotal:</b> {{subTotal}}
      </td>
  </table>
</div>
  {{endfor productosDetalles}}
  <form class="butonRegreso" method="post">
    <button id="sabe" type="submit" name="btnRegresar">Volver a Compras</button>
  </form>
  <br><br>
<br>
{{endif productosDetalles}}
</div>
