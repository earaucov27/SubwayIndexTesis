<?php
session_start();
if (isset($_SESSION['Administrador']) == false) {
    header("location: LoginAdministrador.php?error=1");
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
    function ConfirmDelete() {
        var respuesta = confirm("¿Estas seguro/a que deseas ELIMINAR este JUGO?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

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

<script type="text/javascript">
    function ConfirmAdd() {
        var respuesta = confirm("¿Estas seguro/a que deseas AGREGAR este JUGO?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<script type="text/javascript">
    function ConfirmMod() {
        var respuesta = confirm("¿Estas seguro/a que deseas ACTUALIZAR este JUGO?");
        if (respuesta == true) {
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
        <a href="GestionVentas1.php">Historial de ventas</a>
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
  <a href="EliminadasBebidas.php">Bebidas Eliminadas</a>
  <a href="EliminadosAguas.php">Aguas Eliminadas</a>
  <a href="EliminadosJugos.php" style='background-color:#81D5D0; color:#000; text-align:center; letter-spacing:2px;'>Jugos Eliminados</a>
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
<br>
    <table style="background: #81D5D0; border: 2px solid gray;">
        <tr>

            <td>

                <?php


                require 'Clases/DAO.php';
                $d = new DAO();
                if (isset($_POST['btn_agregarJugo'])) {
                    $cod = $_POST['txt_codJug'];
                    $nom = $_POST['txt_nomjug'];
                    $pre = $_POST['txt_preJug'];
                    $est = $_POST['txt_estJug'];

                    $j = new Jugos($cod, $nom, $pre, $est);
                    $d->AgregarJugo($j);
                }

                if (isset($_GET['cod_eli'])) {
                    $cod = $_GET['cod_eli'];
                    $d->ActivarJugo($cod);
                }
                ?>

                <?php
                if (isset($_POST['btn_modificarJugo'])) {
                    $cod = $_POST['txt_codJug'];
                    $nom = $_POST['txt_nomjug'];
                    $pre = $_POST['txt_preJug'];
                    $con = mysqli_connect("localhost", "root", "", "rapidsubway");
                    $sql = "update jugos set NomJug='$nom', PreJug='$pre' where CodJug='$cod'";
                    $res = mysqli_query($con, $sql);
                    json_encode($res);
                    mysqli_close($con);
                    echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se actualizo correctamente el Jugo</h6><td></tr></table></center>";
                }
                ?>

                <form action="EliminadosJugos.php" method="POST">
                    <table align="center" width="100" class="responsive-table">
                        <caption>Jugos Eliminados</caption>
                        <tr>
                            <td>Codigo</td>
                            <td>Nombre</td>
                            <td>Precio</td>
                            <td>Estado</td>
                            <td>Activar</td>
                        </tr>
                        <?php
                        $lista = $d->ListarJugosEliminados();
                        for ($i = 0; $i < count($lista); $i++) {
                            $j = $lista[$i];
                            echo "<tr>";
                            echo "<td>" . $j->getCodigoJug() . "</td>";
                            echo "<td>" . $j->getNombreJug() . "</td>";
                            echo "<td>" . $j->getPrecioJug() . "</td>";
                            echo "<td>" . $j->getEstadoJug() . "</td>";
                            echo "<td> <a href='EliminadosJugos.php?cod_eli=" . $j->getCodigoJug() . "' style='color: #FE3E3E' onclick='return ConfirmDelete()'>Activar Jugo</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>