<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="Diseno/CssAdmin.css" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>

     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body oncopy="return false" onpaste="return false" style="background: #D4E5E9;">

    <?php
      session_start();

      if (isset($_GET['btn_cerr'])) {
        unset($_SESSION['Administrador']);
        echo "<center><table><tr><td><h6 align='center'>Sesion cerrada correctamente</h6><td></tr></table></center>";
      }

      if(isset($_GET['error'])){
        if($_GET['error'] == 1){
          echo "<center><table><tr><td><h6 align='center'>Debe iniciar sesion para poder ingresar a la plataforma</h6><td></tr></table></center>";
        }
      }

    $msg = null;

    require 'xss\input-filter\class.inputfilter.php';

    if (isset($_POST['btn_ing'])){

      $conexion = new mysqli('localhost','root','','rapidsubway');
      $filter = new InputFilter(array('b', 'i', 'img'), array('src'));

      $administrador = $conexion->real_escape_string($_POST["administrador"]);
      $contraseña= $conexion->real_escape_string($_POST["contraseña"]);

      $administrador = $filter->process($_REQUEST['administrador']);
      $contraseña = $filter->process($_REQUEST['contraseña']);

      $administrador = str_replace(["=","'","<",">","</","(",")",'"',"$",";","{","}","#"], "", $administrador);
      $contraseña = str_replace(["=","'","<",">","</","(",")",'"',"$",";","{","}","#"], "", $contraseña);

      $sql = "SELECT EmailAdministrador, ContrasenaAdministrador FROM ADMINISTRADORES WHERE EmailAdministrador = '$administrador' AND ContrasenaAdministrador = '$contraseña'";
      $resultado = $conexion->query($sql);
      if ($resultado->num_rows > 0) {
        $msg = "Sesion iniciada";
        $_SESSION['Administrador'] = $administrador;
        header("location: AgregarSandwich1.php");
      }else{
        echo "<center><table><tr><td><h6 align='center'>Correo o Contraseña invalidos</h6><td></tr></table></center>";
      }
    }
     ?>

    <center>

      <form class="" action="LoginAdministrador.php" method="post">
      <table border="2" class="Tabla" style="border: 2px solid #69CADF; float: left; width: 30%; margin: 30px;">
        <tr>
          <td><h1 class="Titulo" style="font-size: 35px;">Inicio de Sesion Administrador</h1></td>
        </tr>
        <tr>
          <td><input type="email" name="administrador" id="administrador" placeholder="Ingresa tu email de Administrador" class="Casilla1" required></td>
        </tr>
        <tr>
          <td><input type="password" name="contraseña" id="contraseña" placeholder="Ingresa la contraseña de Administrador" class="Casilla1" required></td>
        </tr>
        <tr>
          <td><input type="submit" name="btn_ing" value="Ingresar" style="margin: auto; background: #3BBD44; padding: 10px; width: 70%; border: none; cursor: pointer; margin-left: 58px;"></td>
        </tr>
        <tr>
          <td><a href="Logeo.php" style="margin-left: 42%; background: #D90202; width: 100%; padding: 10px; color: white;">Volver</a></td>
        </tr>
      </table>
      <img src="imagenes/admin.jpg" style="width: 800px; height: 480px; margin: 30px; border-radius: 30px;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75); border: 2px solid white;">
      </form>
    </center>

  </body>
</html>
