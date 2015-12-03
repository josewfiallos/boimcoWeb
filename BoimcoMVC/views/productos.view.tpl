<title>Productos - BoimcoWeb</title>
<div class="productoBanner">
  <p>
    Productos
  </p>
</div>
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
