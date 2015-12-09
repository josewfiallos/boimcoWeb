<?php

  require_once("libs/template_engine.php");
  require_once("models/productos.model.php");
  require_once("models/login.model.php");


  function run(){
    $imagen = array();
    $filtro="";

    if (isset($_POST["btnBuscar"])){
      $filtro = $_POST["buscarTxt"];
      $imagen = buscarTodoProducto($filtro);
    }else{
      $imagen = obtenerProductosTodos();
    }

    if (isset($_POST["btnModificar"])) {
      $idProd = $_POST["idProducto"];
      updateProducto($_POST,$idProd);
      redirectWithMessage("Producto Actualizado Con Exito","index.php?page=productosAdmin");
    }

  if (isset($_POST["btnSignOut"])) {
    mw_setEstaLogueado("", false, "");
  redirectToUrl("index.php?page=productos");
  }
//PASAR A DETALE PRODUCTO
    renderizar("productosAdmin",array("imagen"=> $imagen,"buscar"=>$filtro));
  }
  run();
?>
