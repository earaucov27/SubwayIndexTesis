<?php
session_start();
if (isset($_SESSION['Empleado']) == false) {
    header("location: LoginEmpleado.php?error=1");
}

$consulta=ConsultarEmpleado($_SESSION['Empleado']);

function ConsultarEmpleado($rut){
    include 'ConexionPHP.php';
    $query="select * from empleados where RutEmp='".$rut."'";
    $resultado=$ConexionBD->query($query) or die ("Error al consultar Empleado: ".mysqli_error($conexion) );

    $filas=$resultado->fetch_assoc();
    return [
        $filas['CodEmp'],
        $filas['NomEmp'],
        $filas['RutEmp'],
        $filas['ConEmp'],
        $filas['CorEmp']
    ];
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

<script type="text/javascript">
    function ConfirmModificar() {
        var respuesta = confirm("¿Estas seguro/a que deseas MODIFICAR sus DATOS?");
        if (respuesta == true) {
            
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
            <a href="VentasEmpleado.php">Historial de ventas</a>
            <a href="DatosEmpleado.php" style='background-color:#aed581; color:#000; text-align:center; letter-spacing:2px;'>Mis Datos</a>
            <form action="LoginEmpleado.php" method="get" id="fm_cerrar">
                <input type="submit" name="btn_cerr" onclick="return ConfirmExit()" value="Cerrar Sesion" style='width: 100%; height: 40px; border:none; color:#fff; background-color:#7cb342;'>
            </form>
        </div>

    </center>

    <table style="background: #BDFABE; border: 2px solid gray;">
        <tr>

            <td>

                <?php


                require 'Clases/DAO.php';
                $d = new DAO();

                if (isset($_POST['btnModificarDatosEmpleado'])) {
                    
                    $cod = $_POST['txtCodigo'];
                    $nom = $_POST['txtNombre'];
                    $cont = $_POST['txtContrasena'];
                    $cor = $_POST['txtCorreo'];
                    $con = mysqli_connect("localhost", "root", "", "rapidsubway");
                    $sql = "update empleados set NomEmp='$nom', ConEmp='$cont', CorEmp='$cor' where CodEmp='$cod'";

                    $res = mysqli_query($con, $sql);
                    json_encode($res);
                    mysqli_close($con);
                    echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se han modificado sus Datos</h6><td></tr></table></center>";
                    header("Refresh:2; url=DatosEmpleado.php");//refresca la pagina para actualizar los datos
                }

                if (isset($_GET['cod_eli'])) {
                    $cod = $_GET['cod_eli'];
                    $d->EliminarEmpleado($cod);
                }

                $rut = filter_input(INPUT_GET, 'RutEmp');

                $lista =  $d->ListarDatosEmpleado($rut);
							for ($i=0; $i < count($lista) ; $i++) {
								$s = $lista[$i];
								echo "<tr>";
                				echo "<td>" . $s->getCodigo() . "</td>";
                				echo "<td>" . $s->getNombre() . "</td>";                
								echo "<td>" . $s->getRut() . "</td>";
								echo "<td>" . $s->getContrasena() . "</td>";
								echo "<td>" . $s->getCorreo() . "</td>";
				        		echo "<td> <a href='GestionEmpleados.php?cod_eli=". $s->getCodigo() ."' style='color: #FE3E3E' onclick='return ConfirmDelete()'>Eliminar Empleado</a></td>";
								echo "</tr>";
							}
							
                ?>

                <form action="DatosEmpleado.php" method="POST">
                
                    <table align="center" width="100" class="responsive-table">
                        <caption>Mis Datos</caption>
                        <tr hidden>
                            <td>Codigo</td>
                            <td>
                                <input type="number" name="txtCodigo" placeholder="Digite el codigo del nuevo Empleado" required maxlength="6" min="1" value="<?php echo $consulta[0]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre del Empleado</td>
                            <td>
                                <input type="text" name="txtNombre" required value="<?php echo $consulta[1]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Rut</td>
                            <td>
                                <input disabled type="text" name="txtRut" maxlength="12" min="1" value="<?php echo $consulta[2]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td>
                                <input type="password" name="txtContrasena" required maxlength="15" min="1" value="<?php echo $consulta[3]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td>
                                <input type="email" name="txtCorreo" required maxlength="50" min="1" value="<?php echo $consulta[4]?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="btnModificarDatosEmpleado" onclick="return ConfirmModificar()" value="Modificar Datos Empleado" style="color:black; text-transform:uppercase; background: #35DD1F; padding: 10px; border: 1px solid gray; cursor: pointer;">
                            </td>
                        </tr>
                    </table>
                </form>
            </td>

        </tr>
    </table>
</body>

</html>