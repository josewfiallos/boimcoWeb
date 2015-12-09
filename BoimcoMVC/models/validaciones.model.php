<?php
function validar($tipo,$valor){


  if($valor == NULL) return false;

  switch($tipo){
    case 'nombre': 	$contenido = "/^[A-Za-z\s]{4,50}$/"; break;
    case 'numero':   $contenido = "/^[0-9]{1,20}$/"; break;
    case 'email':  	$contenido = "/^[\w-\._\+%]+@.[\w]{2,6}(.[\w]{2,6})?$/"; break;
    case 'fecha': $contenido= "/^\d{1,2}\/\d{1,2}\/\d{2,4}$/"; break;

  default: 			return false;
  }

  if (preg_match($contenido, $valor)==1 )
  return true;

  return false;

}
?>
