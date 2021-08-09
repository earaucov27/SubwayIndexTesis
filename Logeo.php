<?php
session_start();
if (isset($_SESSION['Usuario']) == true) {
  header("location: formularioPedido.php");
}

?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registro o Inicio</title>
  <link rel="stylesheet" href="Diseno/Estilo.css" type="text/css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.mask.js"></script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



  <style>

  </style>

</head>

<script type="text/javascript">
  function ConfirmAdd() {
    var res = confirm("¿Esta seguro/a que desea registrarse con estos datos?");
    if (res == true) {
      return true;
    } else {
      return false;
    }
  }
</script>

<script type="text/javascript">
  function ConfirmAccess() {
    var res = confirm("Esta seccion es de uso ADMINISTRATIVA ¿Deasea Continuar?");
    if (res == true) {
      return true;
    } else {
      return false;
    }
  }
</script>

<script type="text/javascript">
  function ConfirmAccessEmpleado() {
    var res = confirm("Esta seccion es de uso para EMPLEADO ¿Deasea Continuar?");
    if (res == true) {
      return true;
    } else {
      return false;
    }
  }
</script>


<body oncopy="return false" onpaste="return false" style="width: 90%; margin: auto; background: url('imagenes/fondo.jpg');">

  <center>

    <table border="0">
      <tr>
        <td colspan="4">
          <h5 class="TxtMin">Chile</h5>
        </td>
        <td colspan="4"><a href="https://www.subway.com/en-us" target="_blank" class="link1">
            <h5 class="TxtMin1">| SUBWAY.COM</h5>
          </a></td>
      </tr>

      <tr>
        <td><a href="Index.php"><img src="Imagenes/banner1.jpg" class="banner1"></a></td>
        <td class="op"><a href="Index.php" class="opciones1">Inicio</a></td>
        <td class="op"><a href="http://www.subway.cl/menu.php?cat=1&prod=0" target="_blank" class="opciones1">Menu</a></td>
        <td class="op"><a href="http://www.subway.cl/promociones.php" target="_blank" class="opciones1">Promociones</a></td>
        <td class="op"><a href="http://www.subway.cl/se_parte.php" target="_blank" class="opciones1">Forma parte <br>de nuestro equipo</a></td>
        <td class="op"><a href="http://www.subway.cl/quienes_somos.php" target="_blank" class="opciones1">Quienes Somos</a></td>
        <td class="op1"><a href="http://www.subway.cl/nuestros_locales.php?id_ciu=all" target="_blank" class="opciones1">Nuestros Locales</a></td>
        <td class="op2"><a href="Logeo.php" class="opciones1">Arma <br>tu pedido</a></td>
      </tr>
      <tr>
      </tr>
    </table>

  </center>

  <?php


  if (isset($_GET['btn_cerr'])) {
    unset($_SESSION['Usuario']);
    echo "<center><table><tr><td><h6 align='center'>Sesion cerrada correctamente</h6><td></tr></table></center>";
  }

  if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
      echo "<center><table><tr><td><h6 align='center'>Debe iniciar sesion para poder ingresar a la plataforma</h6><td></tr></table></center>";
    }
  }

  $msg = null;

  require 'xss\input-filter\class.inputfilter.php';

  if (isset($_POST['btn_iniciar'])) {

    $conexion = new mysqli('localhost', 'root', '', 'rapidsubway');
    $filter = new InputFilter(array('b', 'i', 'img'), array('src'));

    $usuario = $conexion->real_escape_string($_POST["txt_emausu2"]);
    $contraseña = $conexion->real_escape_string($_POST["txt_pasusu2"]);

    $usuario = $filter->process($_REQUEST['txt_emausu2']);
    $contraseña = $filter->process($_REQUEST['txt_pasusu2']);

    $usuario = str_replace(["=", "'", "<", ">", "</", "(", ")", '"', "$", ";", "{", "}", "#"], "", $usuario);
    $contraseña = str_replace(["=", "'", "<", ">", "</", "(", ")", '"', "$", ";", "{", "}", "#"], "", $contraseña);

    $sql = "SELECT EmailUsuario, ContrasenaUsuario FROM USUARIOS WHERE EmailUsuario = '$usuario' AND ContrasenaUsuario = '$contraseña'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
      $msg = "Sesion iniciada";
      $_SESSION['Usuario'] = $usuario;
      header("location: formularioPedido.php");
    } else {
      echo "<center><table><tr><td><h6 align='center'>Correo o Contraseña invalidos</h6><td></tr></table></center>";
    }
  }
  ?>

  <?php
  require 'Clases/DAO.php';
  $d = new DAO();
  if (isset($_POST['btn_registrar'])) {
    $cod = $_POST['txt_cod1'];
    $ema = $_POST['txt_ema1'];
    $nom = $_POST['txt_nom1'];
    $ape = $_POST['txt_ape1'];
    $con = $_POST['txt_con1'];
    $dir = $_POST['txt_dir1'];
    $res = $_POST['txt_res1'];

    $u = new Usuario($cod, $ema, $nom, $ape, $con, $dir, $res);
    $d->RegistrarUsuario($u);
  }
  ?>


  <table>
    <tr>
      <td>
        <form class="" action="Logeo.php" method="post">
          <table style="background: white; border: 2px solid gray;">
            <tr>
              <td colspan="2" style="border-bottom: 1px solid gray;background: #9CE0AE;">
                <h5>¡Registrate!</h5>
              </td>
            </tr>

            <tr hidden>
              <td>
                <h6>Codigo *</h6>
              </td>
              <td><input type="text" class="Casilla" name="txt_cod1"></td>
            </tr>

            <tr>
              <td>
                <h6>Email *</h6>
              </td>
              <td><input type="email" placeholder="Ingrese el Email" class="Casilla" name="txt_ema1" required></td>
            </tr>

            <tr>
              <td>
                <h6>Nombre *</h6>
              </td>
              <td><input type="Text" placeholder="Ingrese su Nombre" class="Casilla" name="txt_nom1" required></td>
            </tr>
            <tr>
              <td>
                <h6>Apellido *</h6>
              </td>
              <td><input type="Text" placeholder="Ingrese su Apellido" class="Casilla" name="txt_ape1" required></td>
            </tr>
            <tr>
              <td>
                <h6>Contraseña *</h6>
              </td>
              <td><input type="password" placeholder="Ingrese una contraseña" class="Casilla" name="txt_con1" required></td>
            </tr>
            <tr>
              <td>
                <h6>Dirección *</h6>
              </td>
              <td><input type="Text" placeholder="Ingrese su Dirección" class="Casilla" name="txt_dir1" required></td>
            </tr>
            <tr>
              <td>
                <h6>¿Cual es tu animal favorito? *</h6>
              </td>
              <td><input type="Text" placeholder="Ingrese su respuesta" class="Casilla" name="txt_res1" required></td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="btn_registrar" value="Registrarse" onclick="return ConfirmAdd()" style="padding: 15px; background: #53B851; border: none; cursor: pointer;">
              </td>
            </tr>
          </table>
        </form>

      </td>

      <td>



        <form class="" action="Logeo.php" method="post">
          <table style="background: white; border: 2px solid gray;">
            <tr>
              <td colspan="2" style="border-bottom: 1px solid gray;background: #9CE0AE;">
                <h5>Inicio de sesion</h5>
              </td>
            </tr>
            <tr>
              <td>
                <h6>Email *</h6>
              </td>
              <td><input type="email" placeholder="Ingrese el Email" class="Casilla" name="txt_emausu2" required></td>
            </tr>
            <tr>
              <td>
                <h6>Contraseña *</h6>
              </td>
              <td><input type="password" placeholder="Ingrese su contraseña" class="Casilla" name="txt_pasusu2" required></td>
            </tr>
            <tr>
              <td>
                <button class="btn waves-effect waves-light" type="submit" name="btn_iniciar">Iniciar y continuar
                  <i class="material-icons right"></i>
                </button>
              </td>
              <td><a href="RestaurarContrasena.php">¿Olvidaste tu contraseña?</a></td>
            </tr>
          </table>



        </form>
        <br><br><br><br><br><br>

        <center>
          <table>
            <tr>
              <td colspan="2"><a href="LoginAdministrador.php">
                  <button class="btn waves-effect blue darken-4" onclick="return ConfirmAccess()" name="btn_iniciarAdmin">Ingresar Como Administrador
                    <i class="material-icons right">perm_identity</i>
                  </button>
                </a>
              </td>
              <td colspan="2"><a href="LoginEmpleado.php">
                  <button class="btn waves-effect yellow darken-2" onclick="return ConfirmAccessEmpleado()" name="btn_iniciarAdmin">Ingresar Como Empleado
                    <i class="material-icons right">perm_identity</i>
                  </button>
                </a>
              </td>
            </tr>
          </table>
        </center>

      </td>

    </tr>
  </table>







</body>

</html>