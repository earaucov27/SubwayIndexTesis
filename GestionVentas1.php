<?php
session_start();
if (isset($_SESSION['Administrador']) == false) {
  header("location: LoginAdministrador.php?error=1");

  if (isset($_SESSION['Usuario']) == false) {
    header("location: Logeo.php?error=1");
  }
}
?>

<html lang="en" dir="ltr">

<head>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <meta charset="utf-8">
  <title>Subway Chile</title>
  <link rel="stylesheet" href="Diseno/Estilo.css" type="text/css">

  <style>
    .vertical-menu {
      width: 200px;
    }

    .vertical-menu a {
      background-color: #eee;
      color: black;
      display: block;
      padding: 12px;
      text-decoration: none;
    }

    .vertical-menu a:hover {
      background-color: #ccc;
    }

    .vertical-menu a.active {
      background-color: #4C55AF;
      color: white;
    }
  </style>
</head>

<script type="text/javascript">
  function ConfirmExit() {
    var res = confirm("Esta seguro/a que desea CERRAR SESION?");
    if (res == true) {
      return true;
    } else {
      return false;
    }
  }
</script>



<body style="width: 90%; margin: auto; background: url(imagenes/fondoadmin.jpg);">

  <p style="background: white; padding: 10px; width: 200px;">Bienvenido <strong>
      <?php echo $_SESSION["Administrador"]; ?>
    </strong></p>

  <center>
    <div class="vertical-menu" style="float: left;">
      <a href="#" class="active">Menu Administrador</a>
      <a href="AgregarSandwich1.php">Agregar Sandwich</a>
      <a href="GestionPrecios1.php">Gestion de precios Sandwich</a>
      <a href="GestionUsuarios1.php">Gestion de usuarios</a>
      <a href="GestionEmpleados.php">Gestion de Empleados</a>
      <a href="GestionVentas1.php" style='background-color:#81D5D0; color:#000; text-align:center; letter-spacing:2px;'>Historial de ventas</a>
      <form action="LoginAdministrador.php" method="get" id="fm_cerrar">
        <input type="submit" name="btn_cerr" onclick="return ConfirmExit()" value="Cerrar Sesion" style='width: 100%; height: 40px; border:none; color:#fff; background-color:#4C55AF;'>
      </form>
    </div>

    <div class="vertical-menu" style="float: right;" >
      <a href="#" class="active">Menu Administrador</a>
      <a href="EliminadosPanes.php">Panes Eliminados</a>
      <a href="EliminadosQuesos.php">Quesos Eliminados</a>
      <a href="EliminadosSalsas.php">Salsas Eliminadas</a>
      <a href="EliminadosVegetales.php">Vegetales Eliminados</a>
      <a href="EliminadasBebidas.php" >Bebidas Eliminadas</a>
      <a href="EliminadosAguas.php">Aguas Eliminadas</a>
      <a href="EliminadosJugos.php">Jugos Eliminados</a>
      <a href="EliminadosExtras.php">Extras Eliminados</a>  
    </div>

    <div class="vertical-menu" style="float: center;">
      <a href="#" class="active">Menu Administrador</a>
      <a href="AgregarPan.php">Agregar Pan</a>
      <a href="AgregarQueso.php">Agregar Queso</a>
      <a href="AgregarSalsa.php">Agregar Salsa</a>
      <a href="AgregarVegetal.php">Agregar Vegetal</a>
      <a href="AgregarBebida.php">Agregar Bebida</a>
      <a href="AgregarAgua.php">Agregar Agua</a>
      <a href="AgregarJugo.php">Agregar Jugo</a>
      <a href="AgregarExtra.php">Agregar Extra</a>

    </div>
  </center>

  <table>

    <?php
    require 'Clases/DAO.php';
    $d = new DAO();
    ?>

    <br>
    <table style="background: #81D5D0; border: 2px solid gray;">
      <tr>
        <td>Codigo</td>
        <td>Tamaño</td>
        <td>Sandwich</td>
        <td>Pan</td>
        <td>Queso</td>
        <td>Extra</td>
        <td>Vegetale</td>
        <td>Salsa</td>
        <td>Bebida</td>
        <td>Aguas</td>
        <td>Jugos</td>
        <td>Cliente</td>
        <td>Estado</td>
      </tr>
      <tr>
        <?php
        $lista = $d->ListarCompraAdministrador();
        for ($i = 0; $i < count($lista); $i++) {
          $c = $lista[$i];

          echo "<tr>";
          echo "<td>" . $c->getCodigoCom() . "</td>";
          echo "<td>" . $c->getTamanoCom() . "</td>";
          echo "<td>" . $c->getNombreSan() . "</td>";
          echo "<td>" . $c->getNombrePan() . "</td>";
          echo "<td>" . $c->getNombreQue() . "</td>";
          echo "<td>" . $c->getNombreExt() . "</td>";
          echo "<td>" . $c->getNombreVeg() . "</td>";
          echo "<td>" . $c->getNombreSal() . "</td>";
          echo "<td>" . $c->getNombreBeb() . "</td>";
          echo "<td>" . $c->getNombreAgu() . "</td>";
          echo "<td>" . $c->getNombreJug() . "</td>";
          echo "<td>" . $c->getNombreUsu() . "</td>";
          echo "<td>" . $c->getEstadoPro() . "</td>";
          echo "</tr>";
        }
        ?>
      </tr>
    </table>
  </table>
</body>

</html>