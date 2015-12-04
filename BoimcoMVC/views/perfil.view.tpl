<div class="perfilBanner">
  <p>
    Hola, {{primerNombreCliente}} {{primerApellidoCliente}}
  </p>
</div>
<form class="formActualizarUsuario" method="post">
    <ul>
      <li>
        <label>Primer Nombre </label>
        <input type="text" name="nuevoPrimerNombre" value={{primerNombreCliente}}>
      </li>
      <li>
        <label>Segundo Nombre</label>
        <input type="text" name="nuevoSegundoNombre" value={{segundoNombreCliente}}>
      </li>
      <li>
        <label>Primer Apellido</label>
        <input type="text" name="nuevoPrimerApellido" value={{primerApellidoCliente}}>
      </li>
      <li>
        <label>Segundo Apellido</label>
        <input type="text" name="nuevoSegundoApellido" value={{segundoApellidoCliente}}>
      </li>
      <li>
        <label>Direccion</label>
        <input type="text" name="nuevaDireccion" value={{direccionCliente}}>
      </li>
      <li>
        <label>Telefono</label>
        <input type="text" name="nuevoTelefono" value={{telefonoCliente}}>
      </li>
      <li>
        <button type="submit" name="btnModificar">Actualizar Datos</button>
      </li>
    </ul>
</form>
