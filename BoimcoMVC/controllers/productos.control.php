<?php

  require_once("libs/template_engine.php");
  require_once("models/productos.model.php");
  require_once("models/login.model.php");


  function run(){
    $imagen = array();
    $filtro="";

//APLICAR FILTRO DE BUSQUEDAD CON BOTON!!
    if (isset($_POST["btnBuscar"])){
      $filtro = $_POST["buscarTxt"];
      $imagen = buscarProductos($filtro);

    }else if(isset($_POST["btnTodos"])) {
      $imagen = obtenerProductos();
    }
    else {
      $imagen = obtenerProductos();
    }

    if (isset($_POST["btnLogin"])){
      $correo=$_POST['email'];
      $Contrasenia=$_POST['password'];
      $estado=verificacionDeUsuario($correo);
      if ($estado=='ACT') {
        if (compararDatos($correo,$Contrasenia)){
          $rol = obtenerRol($correo);
          mw_setEstaLogueado($correo,true,$rol);
            redirectWithMessage("Ingresando","index.php?page=productos");
        }
        else{
          $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
          redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=productos");
        }
      }
    else {
      $errores[] = array("errmsg"=>"Usuario Inactivo");
      redirectWithMessage("Su Cuenta de Usuario se encuentra Inactiva, Enviar mensaje para reactivacion de cuenta","index.php?page=contactus");
    }
  }

  if (isset($_POST["btnSignOut"])) {
    mw_setEstaLogueado("", false, "");
    redirectWithMessage("Saliendo","index.php?page=productos");
  }
//PASAR A DETALE PRODUCTO
    renderizar("productos",array("imagen"=> $imagen,"buscar"=>$filtro));
  }
  run();
?>
