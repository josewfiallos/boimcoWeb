<?php
/* althome Controller
 * 2015-10-28
 * Created By OJBA
 * Last Modification 2015-10-28 19:27
 */
  require_once("libs/template_engine.php");
  function run(){
    //http_response_code(200);
    $data = array(
        array("cod"=>"1","dsc"=>"Producto 1","prc"=>100.25),
        array("cod"=>"2","dsc"=>"Producto 2","prc"=>200.25),
        array("cod"=>"3","dsc"=>"Producto 3","prc"=>50.25)
    );
    renderizar("althome", array("productos"=>$data,"productos2"=>$data));
  }


  run();
?>
