<?php

  require_once("libs/template_engine.php");
  require_once("models/productos.model.php");
  require_once("models/login.model.php");

  function run(){
    $imagen = array();
    $filtro="";

    if (isset($_POST["btnBuscar"])){
      $filtro = $_POST["buscarTxt"];
      $imagen = buscarProductos($filtro);
    }else{
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
          if ($rol=='CLT') {
          redirectWithMessage("Ingresando","index.php?page=productos");
          }
          else {
          redirectWithMessage("Ingresando","index.php?page=productosAdmin");
          }
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

  if (isset($_POST["btnAgregar"])) {
    if ($_SESSION["userLogged"]==true) {
      agregarACarretilla($_POST["codigoProducto"],$_POST["cantidadProductosSeleccionados"]);
      disminuirStock($_POST["codigoProducto"],$_POST["cantidadProductosSeleccionados"]);
      redirectWithMessage("Su producto fue agregado exitosamente al carrito, Gracias","index.php?page=productos");
    }
    else{
      redirectWithMessage("Registrese o inicie sesion para poder agregar a Carrito","index.php?page=productos");
    }
  }

//PASAR A DETALE PRODUCTO
    renderizar("productos",array("imagen"=> $imagen,"buscar"=>$filtro));
  }
  run();
?>
