<?php

  require_once("libs/template_engine.php");
  require_once("models/facturar.model.php");

  function run(){

    $compras=array();
    $productosDetalles=array();
    $compras=obtenerFacturas();

    if ($compras){
      if (isset($_POST["btnVer"])) {
        $id=$_POST["idFacturaSelect"];
        $productosDetalles=obtenerDetallesFactura($id);
        renderizar("comprasDetalles",array("productosDetalles"=> $productosDetalles, "idFactura"=>$id));
      }
      else {
        renderizar("compras",array("compras"=> $compras));
      }

    }
    else {
      redirectToUrl("index.php?page=comprasVacia");
    }

    if (isset($_POST["btnSignOut"])) {
      mw_setEstaLogueado("", false, "");
      redirectToUrl("index.php?page=home");
    }


  }
  run();
?>
