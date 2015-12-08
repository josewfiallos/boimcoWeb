function validarTelefono(e){
  key = e.keyCode || e.wich;
  teclado = String.fromCharCode(key);
  numeros = "0123456789";
  especiales = "8-37-38-46";
  tecladoEespecial = false;

  for(var i in especiales){
    if(key==especiales[i]){
      tecladoEespecial=true;
    }//if
  }//for

  if(numeros.indexOf(teclado)==-1 && !tecladoEespecial){
    return false;

  }//if

}//validarTelefono()
