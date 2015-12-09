<title>Control de Usuarios - BoimcoWeb</title>
<div class="bannerGeneral">
  <p>
    Control de Usuarios
  </p>
</div>
<div class="usuarios" align="center">
{{if usuarios}}
  <table cellspacing="10">
    <tr id="arriba">
      <th>Primer Nombre</th>
      <th>Primer Apellido</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Fecha De Ingreso</th>
      <th>Estado Usuario</th>
      <th>Accion</th>
    </tr>
  {{foreach usuarios}}
    <tr align="center" id="abajo">
        <td>{{primerNombreCliente}}</td>
        <td>{{primerApellidoCliente}}</td>
        <td>{{telefonoCliente}}</td>
        <td>{{correoUsuario}}</td>
        <td>{{fechaIngresoUsuario}}</td>
        <td>{{estadoUsuario}}</td>
        <td>
        <form method="post">
          <button id="{{estadoUsuario}}" type="submit" name="btnCambiarEstado"><span>...</span></button>
          <input type="hidden" name="idUsuario" value="{{idUsuario}}">
          <input type="hidden" name="estadoUsuario" value="{{estadoUsuario}}">
        </form>
        </td>
    </tr>
    {{endfor usuarios}}
  </table>
{{endif usuarios}}
</div>
