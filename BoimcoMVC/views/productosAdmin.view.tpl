<title>Productos Administrador - BoimcoWeb</title>
<div class="bannerGeneral">
  <p>
    Mantenimiento de Productos
  </p>
</div>
<form class="formBusqueda" method="post">
<ul>
  <li>
    <input type="text" name="buscarTxt">
  </li>
  <li>
    <button type="submit" name="btnBuscar">Buscar</button>
  </li>
    <button id="boton2" type="button" name="btnAgregar" onclick="location.href='index.php?page=agregarProducto'">Agregar Producto</button>
</ul>
</form>
<div class="listadoProductos">
  {{foreach imagen}}
  <div class="produclistAdmin">
  <form action="" method="POST">
      <a><img src="{{imgProducto}}" width="130px" height="130px"/></a><br/>
  <p>
    <label>Producto:</label>
    <input type="text" name="modNombreProducto" value="{{nombreProducto}}">
  <br><br>
  <label>Precio:</label>
  <input type="text" name="modPrecioProducto" value="{{precioUnitarioProducto}}">
  <br><br>
  <label>Cantidad:</label>
  <input type="text" name="modCantidadProducto" value="{{cantidadProducto}}">
  <br><br>
  <label>Estado:</label>
  <select name="modEstadoProducto">
    <option value="ACT">Activar || {{estadoProducto}}</option>
    <option value="INA">Desactivar</option>
  </select>
  <br>
  <br>
  <button type="submit" name="btnModificar">Modificar</button>
  </p>
  <input type="hidden" name="idProducto" value="{{idProducto}}">
  </form>
  </div>
  {{endfor imagen}}
  {{render}}
</div>
