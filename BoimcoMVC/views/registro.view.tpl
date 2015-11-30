
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro - BoimcoWeb</title>
  </head>
  <div class="ImgRegistro"><p>
    Registro
  </p></div>
  <body>
    <form class="FormRegistro" action="registro.view.tpl" method="post">
      <ul>
         <li>
             <label for="txtName">Nombre: </label>
             <input type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Primer Nombre" maxlength="15" required />
         </li>
         <li>
           <label for="txtApellido">Apellido: </label>
           <input type="text" name="apellidoUsuario" id="apellidoUsuario" placeholder="Primer Apellido" maxlength="15" required />
         </li>
         <li>
             <label for="txtEmail">Correo Electrónico: </label>
             <input type="email" name="emailUsuario" placeholder="Escriba su Correo Electronico" id="emailUsuario" required />
         </li>
         <li>
             <label for="txtTel">Teléfono: </label>
             <input type="text" name="telefonoUsuario" placeholder="Sin guión ni paréntesis" id="telefonoUsuario" required maxlength="8" onkeypress="return validarTelefono(event)" onpaste="return false" />
         </li>
         <li>
          <label for="txtContraseña">Contraseña: </label>
          <input type="text" name="passUsuario" placeholder="Introduzca su contraseña (Min 8 Caracteres)" maxlength="16" minlength="8" required/>
           </select>
         </li>
          <li>
            <button class="submit" name="btnRegistrarse" type="submit">Registrarse</button>
          </li>
      </ul>
    </form>
  </body>
</html>
