<?php
  require_once("libs/template_engine.php");
  require_once("models/login.model.php");
  require_once("models/validaciones.model.php");
  require("PHPMailer-master/PHPMailerAutoload.php");

  function run(){

    $htmlContacto = array();
    $htmlContacto["txtName"] = "";
    $htmlContacto["txtEmail"] = "";
    $htmlContacto["txtTel"] = "";
    $htmlContacto["txtMsg"] = "";
    $boolValidar = true;

    if (isset($_POST["btnEnviar"])) {

      if(!validar('email',$_POST["txtEmail"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Ingrese correo correctamente, Ejemplo: correo@electroni.co');</script>";
    }
      if(!validar('nombre',$_POST["txtName"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Nombre ingresado con caracteres no permitidos');</script>";
      }
      if(!validar('numero',$_POST["txtTel"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Teléfeno ingresado con caracteres no permitidos');</script>";
      }

      if ($boolValidar) {

        $nombre=$_POST["txtName"];
        $correo=$_POST["txtEmail"];
        $content=$_POST["txtMsg"];
        $salto="\r\n";
        $mensaje = "De: ".$correo."<br><br>".$content;

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "boimcohn@gmail.com";
        $mail->Password = "admin.boimco";
        $mail->SetFrom("example@gmail.com");
        $mail->Subject = $nombre." tiene una consulta nueva";
        $mail->Body = $mensaje;
        $mail->AddAddress("boimcohn@gmail.com");

         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "Message has been sent";
         }

        redirectWithMessage("Gracias por sus comentarios, Su mensaje ha sido enviado correctamente","index.php?page=home");
      }


    }//IF Enviar




    if (isset($_POST["btnLogin"])){
      $correo=$_POST['email'];
      $Contrasenia=$_POST['password'];
      $estado=verificacionDeUsuario($correo);
      if ($estado=='ACT') {
        if (compararDatos($correo,$Contrasenia)){
          $rol = obtenerRol($correo);
          mw_setEstaLogueado($correo,true,$rol);
            redirectToUrl("index.php?page=contactus");
        }
        else{
          $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
          redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=contactus");
        }
      }
    else {
      $errores[] = array("errmsg"=>"Usuario Inactivo");
      redirectWithMessage("Su Cuenta de Usuario se encuentra Inactiva, Enviar mensaje para reactivacion de cuenta","index.php?page=contactus");
    }
      }

      if (isset($_POST["btnSignOut"])) {
        mw_setEstaLogueado("", false, "");
        redirectToUrl("index.php?page=contactus");
      }
    renderizar("contactus",array());
  } // if function run
  run();
?>
