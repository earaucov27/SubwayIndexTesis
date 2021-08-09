<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login Empleado</title>
  <link rel="stylesheet" href="Diseno/CssAdmin.css" type="text/css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.mask.js"></script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body oncopy="return false" onpaste="return false" style="background: #CBEED5;">
<style>
  


</style>
  <?php
  session_start();

  if (isset($_GET['btn_cerr'])) {
    unset($_SESSION['Empleado']);
    echo "<center><table><tr><td><h6 align='center'>Sesion cerrada correctamente</h6><td></tr></table></center>";
  }

  if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
      echo "<center><table><tr><td><h6 align='center'>Debe iniciar sesion para poder ingresar a la plataforma</h6><td></tr></table></center>";
    }
  }

  $msg = null;

  require 'xss\input-filter\class.inputfilter.php';

  if (isset($_POST['btn_ing'])) {

    $conexion = new mysqli('localhost', 'root', '', 'rapidsubway');
    $filter = new InputFilter(array('b', 'i', 'img'), array('src'));

    $empleado = $conexion->real_escape_string($_POST["empleado"]);
    $contraseña = $conexion->real_escape_string($_POST["contraseña"]);

    $empleado = $filter->process($_REQUEST['empleado']);
    $contraseña = $filter->process($_REQUEST['contraseña']);

    $empleado = str_replace(["=", "'", "<", ">", "</", "(", ")", '"', "$", ";", "{", "}", "#"], "", $empleado);
    $contraseña = str_replace(["=", "'", "<", ">", "</", "(", ")", '"', "$", ";", "{", "}", "#"], "", $contraseña);

    $sql = "SELECT RutEmp, ConEmp FROM EMPLEADOS WHERE RutEmp = '$empleado' AND ConEmp = '$contraseña'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
      $msg = "Sesion iniciada";
      $_SESSION['Empleado'] = $empleado;
      header("location: VentasEmpleado.php");
    } else {
      echo "<center><table><tr><td><h6 align='center'>Correo o Contraseña invalidos</h6><td></tr></table></center>";
    }
  }
  ?>
  <h1 style="font-family: 'Lobster', cursive; margin-left: 10px;">¡Que tengas un gran dia! <img src="imagenes/banner1.jpg"></h1> 
  <center>
    <form class="" action="LoginEmpleado.php" method="post" style=>
      <table border="2" class="Tabla" style=" margin: 30px;width: 30%;float: left; border: solid 2px #53BE71; background: white;">
        <tr>
          <td>
            <h1 class="Titulo" style="font-size: 35px; ">Inicio de Sesion Empleados</h1>
          </td>
        </tr>
        <tr>
          <td ><input type="text" name="empleado" id="empleado" placeholder="Ingresa tu RUT" class="Casilla1" required ></td>
        </tr>
        <tr>
          <td><input type="password" name="contraseña" id="contraseña" placeholder="Ingrese Contraseña" class="Casilla1" required></td>
        </tr>
        <tr>
          <td><input type="submit" name="btn_ing" value="Ingresar" style="margin: auto; background: #3BBD44; padding: 10px; width: 70%; border: none; cursor: pointer; margin-left: 58px;"></td>
        </tr>
        <tr>
          <td><a href="Logeo.php" style="margin-left: 42%; background: #D90202; width: 100%; padding: 10px; color: white;">Volver</a></td>
        </tr>
      </table>
      <img src="imagenes/wndelsubway.jpg" style="width: 800px; height: 480px; margin: 30px; border-radius: 30px;-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75); border: 2px solid white;">
    </form>
  </center>

</body>

</html>