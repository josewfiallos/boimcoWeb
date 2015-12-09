<title>Mantenimiento de Productos - BoimcoWeb</title>
<div class="bannerGeneral">
  <p>
    Adicionar Nuevo Producto
  </p>
</div>
<form class="formProducto" method="post" enctype="multipart/form-data">
  <ul>
     <li id="LABELNOMBRE">
         <label>Nombre Producto: </label>
           <input type="text" name="newNombreProducto" required />
     </li>
     <li>
       <label>Precio Unitario: </label>
       <input type="text" name="newPrecioUnitarioProducto" required />
     </li>
     <li>
         <label>Cantidad: </label>
         <input type="number" name="newCantidadProducto" min="0" required />
     </li>
     <li>
         <label>Estado: </label>
         <select name="newEstadoProducto">
           <option value="ACT">Activo</option>
           <option value="INA">Inactivo</option>
         </select>
      </li>
      <li id="LABELDISTINTO">
        <label>URL de imagen: </label>
        <input class="imgSelect" name="imgSelect" type="file" required />
        <input name="action" type="hidden" value="upload" />
      </li>
      <li>
        <button class="submit" name="btnAñadir" type="button" onclick="location.href='index.php?page=productosAdmin'">Regresar</button>
        <button class="submit" name="btnAñadir" type="submit">Añadir Producto</button>
      </li>
  </ul>
</form>
