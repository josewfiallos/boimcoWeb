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
  </p>
  </form>
  </div>
  {{endfor imagen}}
  {{render}}
</div>
