<title>Perfil Usuario - BoimcoWeb</title>
<div class="bannerGeneral">
  <p>
    Hola, {{primerNombreCliente}} {{primerApellidoCliente}}
  </p>
</div>
<form class="formActualizarUsuario" method="post">
    <ul>
      <li>
        <label>Primer Nombre </label>
        <input type="text" name="nuevoPrimerNombre" value="{{primerNombreCliente}}" onkeypress="return validarTexto(event)" onpaste="return false">
      </li>
      <li>
        <label>Segundo Nombre</label>
        <input type="text" name="nuevoSegundoNombre" value="{{segundoNombreCliente}}" onkeypress="return validarTexto(event)" onpaste="return false">
      </li>
      <li>
        <label>Primer Apellido</label>
        <input type="text" name="nuevoPrimerApellido" value="{{primerApellidoCliente}}" onkeypress="return validarTexto(event)" onpaste="return false">
      </li>
      <li>
        <label>Segundo Apellido</label>
        <input type="text" name="nuevoSegundoApellido" value="{{segundoApellidoCliente}}" onkeypress="return validarTexto(event)" onpaste="return false">
      </li>
      <li>
        <label>Direccion</label>
        <input type="text" name="nuevaDireccion" value="{{direccionCliente}}">
      </li>
      <li>
        <label>Telefono</label>
        <input type="text" name="nuevoTelefono" value="{{telefonoCliente}}" onkeypress="return validarTelefono(event)" maxlength="12" onpaste="return false">
      </li>
      <li>
        <button id="btnINA" type="submit" name="btnDesactivar" onclick="return confirm('Si acepta, su cuenta quedará inhabilitada y no podrá iniciar sesión. ¿Desea continuar?')">Desactivar Cuenta</button>
        <button type="submit" name="btnModificar">Actualizar Datos</button>
      </li>
    </ul>
</form>
