<?php
/* Example Controller
     * 2015-10-14
     * Created By OJBA
     * Last Modification 2015-10-14 20:04
     */
      //Cargando Plantillero
      require_once("libs/template_engine.php");

      function run(){
        /* require_once("models/entidad.model.php ") */
        /* Procesamiento */
        /*todo arreglo que se envia al plantiller debe ser
          con una llave asociativa */
          //iniciamos el arreglo
        $data = array(
            "txtNombre" => "",
            "txtEmail" => "",
            "msg" => ""
        );

        if(isset($_POST["txtNombre"])){
            $data["txtNombre"] = $_POST["txtNombre"];
            $data["txtEmail"] = $_POST["txtEmail"];
            $data["msg"] = sprintf("La data enviada es: %s con correo %s",
                            $data["txtNombre"], $data["txtEmail"]    );
            renderizar("formulario2", $data);
        }else{
            renderizar("formulario", $data);
        }
      }
      run();
?>
