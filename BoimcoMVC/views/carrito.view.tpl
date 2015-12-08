<title>Carrito de compras - Boimco</title>
<div class="bannerGeneral">
  <p>
    Carrito Compras
  </p>
</div>
<div class="carritoContent">
  {{if productos}}
  {{foreach productos}}
  <a><img src="{{imgProducto}}" width="150px" height="150px"/></a><br><br><br>
  {{endfor productos}}
</div>
<div align="center">
  <div class="newpro">
<table >
  <tr>
    <td> <b>SUBTOTAL: </b></td>
    <td>{{subtotal}}</td>
  </tr>
  <tr>
    <td> <b>IMPUESTO: </b></td>
    <td>{{impuesto}}</td>
  </tr>

  <tr>
    <td> <b>TOTAL: </b></td>
    <td>{{total}}</td>
  </tr>

</table>
</div>
<br>
<form action="index.php?page=facturar" method="post">
  <div class="boton">
  <input type="submit" name="btnFacturar" id="btnFacturar" value="Facturar">
</div>
</form>
{{endif productos}}



</div>
