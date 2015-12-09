<?php

  require_once("libs/template_engine.php");
  require_once("models/carrito.model.php");
  require_once("models/login.model.php");
  require_once("models/facturar.model.php");

  function run(){

    $productos =  array();

    $resultado= array();
    $resultado["subtotal"]="";
    $resultado["impuesto"]="";
    $resultado["total"]="";

  if (isset($_POST["btnSignOut"])) {
    mw_setEstaLogueado("", false, "");
    redirectToUrl("index.php?page=home");
  }

   $productos = mostrarCarretilla();

    if (isset($_POST["btnEliminar"])) {
      if (eliminarProductoDeCarretilla($_POST["idCarrito"])) {
        redirectWithMessage("Producto Eliminado de su Carrito","index.php?page=carrito");
      }
    }

    if($productos){
      foreach ($productos as $value) {
        $resultado["subtotal"]+= $value["cantidadProductos"]*$value["precioProductos"];
      }
      $resultado["impuesto"]=  number_format($resultado["subtotal"]*0.12, 2, '.', '');
      $resultado["total"]=number_format($resultado["subtotal"]+$resultado["impuesto"], 2, '.', '');
      $resultado["subtotal"]= number_format($resultado["subtotal"], 2, '.', '');
    }
    else {
      redirectToUrl("index.php?page=carritoVacio");
    }

    if (isset($_POST["btnFacturar"])) {

      if ($id=facturar($productos,$resultado)) {
        borrarMiCarretilla($_SESSION["userName"]);
          redirectWithMessage("Compra Exitosa","index.php?page=carrito");
      }

    }

    if (isset($_POST["btnBorrarCarrito"])) {
      borrarMiCarretillaCompleta($_SESSION["userName"],$productos);
        redirectWithMessage("Carrito Eliminado :D","index.php?page=carrito");
    }

    renderizar("carrito",array("productos" =>$productos,"subtotal"=>$resultado["subtotal"],"impuesto"=>$resultado["impuesto"],"total"=>$resultado["total"]));

  }
  run();
?>
