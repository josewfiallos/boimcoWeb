<title>Productos - BoimcoWeb</title>
<div class="productoBanner">
  <p>
    Productos
  </p>
</div>
<form class="formBusqueda" method="post">
  <label>Busqueda</label>
  <input type="text" name="buscarTxt">
  <input type="submit" name="btnBuscar" value="Buscar">
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
  </p>
  </form>
  </div>
  {{endfor imagen}}
  {{render}}
</div>
