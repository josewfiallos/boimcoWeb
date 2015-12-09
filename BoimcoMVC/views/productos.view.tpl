<title>Productos - BoimcoWeb</title>
<div class="bannerGeneral">
  <p>
    Productos
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
</ul>
</form>
<div class="listadoProductos">
  {{foreach imagen}}
  <div class="produclist">
  <form action="" method="POST">
      <a><img src="{{imgProducto}}" width="130px" height="130px"/></a><br/>
  <p>
    {{nombreProducto}}
  <br>
    Precio: L {{precioUnitarioProducto}}
  <br><br>
  <label>Cantidad</label>
  <input type="number" name="cantidadProductosSeleccionados" placeholder="Disponibles: {{cantidadProducto}}" max="{{cantidadProducto}}" min="1" onkeypress="return validarTelefono(event)" onpaste="return false">
  <br>
  <button class="my_popup_open" type="submit" name="btnAgregar">Agregar a Carrito</button>
  </p>
  <input type="hidden" name="codigoProducto" value="{{idProducto}}">
  </form>
  </div>
  {{endfor imagen}}
  {{render}}
</div>
