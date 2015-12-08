<title>Registro Compras - Boimco</title>
<div class="bannerGeneral">
  <p>
    Registro de Compras
  </p>
</div>
<div class="Compras" align="center">
  {{if compras}}
  <table cellspacing="10">
    <tr id="arriba">
      <th>No. Factura</th>
      <th>Fecha De Compra</th>
      <th>SubTotal de Compra</th>
      <th>Impuestos de Compra</th>
      <th>Total de Compra</th>
      <th>Articulos de Compra</th>
    </tr>
  {{foreach compras}}
    <tr align="center" id="abajo">
        <td>{{idFactura}}</td>
        <td>{{fechaFactura}}</td>
        <td>L.{{subTotalFactura}}</td>
        <td>L.{{isvFactura}}</td>
        <td><b>L.{{totalFactura}}</b></td>
        <td>
        <form method="post">
          <button id="show" onclick="window.location.href='index.php?page=contactus'" type="submit" name="btnVer">Ver Articulos</button>
          <input type="hidden" name="idFacturaSelect" value="{{idFactura}}">
        </form>
        </td>
    </tr>
    {{endfor compras}}
  </table>
{{endif compras}}
</div>
