<?php
require_once("libs/dao.php");

function facturar($productos, $resultado){

  $query = "SELECT * FROM usuarios WHERE correoUsuario='%s';";
    $query = sprintf($query,$_SESSION["userName"]);
    $usuario = obtenerUnRegistro($query);

    $query = "SELECT * FROM clientes WHERE idUsuario='%d';";
    $query = sprintf($query,$usuario["idUsuario"]);
    $cliente = obtenerUnRegistro($query);

    $query= "INSERT INTO facturas VALUES (NULL,'%d',NOW(),'%f','%f','%f');";
    $query = sprintf($query,$cliente["idCliente"],$resultado["subtotal"],$resultado["impuesto"],$resultado["total"]);

    if(ejecutarNonQuery($query)){
      $lastID= getLastInserId();
    }

      foreach ($productos as $key => $value) {
        $query = "INSERT INTO detalle_facturas VALUES (NULL,'%d','%d','%d','%f');";
        $query = sprintf($query,$lastID,$value["idProductos"],$value["cantidadProductos"],$value["precioProductos"]);
        ejecutarNonQuery($query);
      }

  return $lastID;

}

function obtenerFacturas(){

    $correo= $_SESSION["userName"];

    $query = "SELECT * FROM usuarios WHERE correoUsuario='%s';";
    $query = sprintf($query,$correo);
    $usuarios = obtenerUnRegistro($query);

    $query="SELECT * FROM clientes where idUsuario='%d';";
    $query=sprintf($query,$usuarios["idUsuario"]);
    $clientes=obtenerUnRegistro($query);

    $query = "SELECT * FROM facturas WHERE idCliente='". $clientes["idCliente"]."'";

    $facturas = array();

    $facturas = obtenerRegistros($query);
    return $facturas;


}

function obtenerDetallesFactura($id){

      $query="SELECT nombreProducto, imgProducto, D.precioProducto, D.cantidadProducto, D.precioProducto*D.cantidadProducto subTotal FROM productos P JOIN detalle_facturas D ON P.idProducto=D.idProducto
      WHERE idFactura='".$id."'";
      $detalles=obtenerRegistros($query);

  return $detalles;
}

?>
