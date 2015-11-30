</script>
<div class="form">
  <form class="contactForm" method="post">
  <ul>
     <li>
         <label for="txtName">Nombre:</label>
         <input type="text" id="txtName" placeholder="Escriba su Nombre" required />
     </li>
     <li>
         <label for="txtEmail">Correo Electrónico:</label>
         <input type="email" name="txtEmail" placeholder="Escriba su Correo" id="txtEmail" required />
     </li>
     <li>
         <label for="txtTel">Teléfono:</label>
         <input type="text" name="txtTel" placeholder="Sin guión ni paréntesis" id="txtTel" required maxlength="8" onkeypress="return validarTelefono(event)" onpaste="return false" />
     </li>

     <li>
       <label for="lugar">Lugar:</label>
       <select name="lugar">
         <option value="tgu" selected="selected">Tegucigalpa</option>
         <option value="sps">San Pedro Sula</option>
         <option value="cba">Ceiba</option>


       </select>
     </li>
     <li>
         <label for="txtMsg">Mensaje:</label>
         <textarea name="txtMsg" cols="40" rows="6" required  placeholder="Escriba su mensaje"></textarea>
     </li>
      <li>
        <button class="submit" type="submit">Enviar</button>
        <button type="reset" name="button">Limpiar</button>
      </li>
  </ul>
</form>

</div>

<div class="contactImg"><p>
  Contáctanos
</p></div>
