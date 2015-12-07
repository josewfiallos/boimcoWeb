<?php
//middleware de verificación

    function mw_estaLogueado($rol){
        if( isset($_SESSION["userLogged"]) && $_SESSION["userLogged"] == true){
          if ($rol=='CLT') {
            addToContext("layoutFile","layoutCliente.view.tpl");
          }
          else {
            addToContext("layoutFile","layoutAdministrador.view.tpl");
          }
          return true;
        }else{
          $_SESSION["userLogged"] = false;
          $_SESSION["userName"] = "";
          return false;
        }
    }

    function mw_setEstaLogueado($usuario, $logueado, $rol){
        if($logueado){
            $_SESSION["userLogged"] = true;
            $_SESSION["userName"] = $usuario;
            $_SESSION["userRol"] = $rol;
        }else{
          $_SESSION["userLogged"] = false;
          unset($_SESSION["userName"]);
          unset($_SESSION["userRol"]);
        }
    }
    function mw_redirectToLogin($to){
        $loginstring = urlencode("?".$to);
        $url = "index.php?page=login&returnUrl=".$loginstring;
        header("Location:" . $url);
        die();
    }

?>
