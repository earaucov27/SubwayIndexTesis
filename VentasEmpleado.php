<?php
session_start();
if (isset($_SESSION['Empleado']) == false) {
    header("location: LoginEmpleado.php?error=1");
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
            background-color: #4CAF50;
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



<body style="width: 90%; margin: auto; background: url(imagenes/fondo.jpg);">

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

    <p>Usuario Logeado: <strong>
            <?php echo $_SESSION["Empleado"]; ?>
        </strong></p>

    <center>
        <div class="vertical-menu" style="float: left;">
            <a href="VentasEmpleado.php" style='background-color:#aed581; color:#000; text-align:center; letter-spacing:2px;'>Historial de ventas</a>
            <a href="DatosEmpleado.php";>Mis Datos</a>
            <form action="LoginEmpleado.php" method="get" id="fm_cerrar">
                <input type="submit" name="btn_cerr" onclick="return ConfirmExit()" value="Cerrar Sesion" style='width: 100%; height: 40px; border:none; color:#fff; background-color:#7cb342;'>
            </form>
        </div>
        
    </center>

    <table>

        <?php
        require 'Clases/DAO.php';
        $d = new DAO();
        ?>

        <br>
        <table style="background: #BDFABE; border: 2px solid gray;">
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