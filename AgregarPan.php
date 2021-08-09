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
		var respuesta = confirm("¿Estas seguro/a que deseas ELIMINAR este PAN?");
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
		var respuesta = confirm("¿Estas seguro/a que deseas AGREGAR este PAN?");
		if (respuesta == true) {
			return true;
		} else {
			return false;
		}
	}
</script>

<script type="text/javascript">
	function ConfirmMod() {
		var respuesta = confirm("¿Estas seguro/a que deseas ACTUALIZAR este PAN?");
		if (respuesta == true) {
			return true;
		} else {
			return false;
		}
	}
</script>

<body style="width: 90%; margin: auto; background: url(imagenes/fondoadmin.jpg);">


<p style="background: white; padding: 10px; width: 200px;">Bienvenido <strong>
  <?php echo $_SESSION["Administrador"];?>
</strong></p>

	<center>
	<div class="vertical-menu" style="float: left;" >
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
		<a href="EliminadasBebidas.php" >Bebidas Eliminadas</a>
		<a href="EliminadosAguas.php">Aguas Eliminadas</a>
		<a href="EliminadosJugos.php">Jugos Eliminados</a>
		<a href="EliminadosExtras.php">Extras Eliminados</a>	
	</div>

	<div class="vertical-menu" style="float: center;">
			<a href="#" class="active">Menu Administrador</a>
			<a href="AgregarPan.php" style='background-color:#81D5D0; color:#000; text-align:center; letter-spacing:2px;'>Agregar Pan</a>
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
				if (isset($_POST['btn_agregarPan'])) {
					$cod = $_POST['txt_codPan'];
					$nom = $_POST['txt_nomPan'];
					$est = $_POST['txt_estPan'];

					$p = new Pan($cod, $nom, $est);
					$d->AgregarPan($p);
				}

				if (isset($_GET['cod_eli'])) {
					$cod = $_GET['cod_eli'];
					$d->EliminarPan($cod);
				}
				?>

				<?php
				if (isset($_POST['btn_modificarPan'])) {
					$cod = $_POST['txt_codPan'];
					$nom = $_POST['txt_nomPan'];

					$con = mysqli_connect("localhost", "root", "", "rapidsubway");
					$sql = "update panes set NomPan='$nom' where CodPan='$cod'";
					$res = mysqli_query($con, $sql);
					json_encode($res);
					mysqli_close($con);
					echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se actualizo correctamente el Pan</h6><td></tr></table></center>";
				}
				?>

				<form action="AgregarPan.php" method="POST">
					<table align="center" width="100" class="responsive-table">
						<caption>Pan</caption>
						<tr>
							<td>Codigo del Pan</td>
							<td>
								<input type="number" name="txt_codPan" style="background: white;"placeholder="Digite el codigo del Pan nuevo" required maxlength="4" min="1">
							</td>
						</tr>
						<tr>
							<td>Nombre del Pan</td>
							<td>
								<input type="text" name="txt_nomPan" style="background: white;"placeholder="Escriba el nombre del Pan nuevo" required>
							</td>
						</tr>
						<tr hidden>
							<td>Estado Pan</td>
							<td>
								<input type="text" name="txt_estPan" value='Activo' required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="btn_agregarPan" onclick="return ConfirmAdd()" value="Agregar Pan" style="color:black; text-transform:uppercase; background: #35DD1F; padding: 10px; border: 1px solid gray; cursor: pointer;">
							</td>
							<td>
								<input type="submit" name="btn_modificarPan" onclick="return ConfirmMod()" value="Actualizar Datos" style="color:black; text-transform:uppercase; background: #FFF441; padding: 10px; border: 1px solid gray; cursor: pointer;">
								<string>*Para actualizar el Pan se necesita indicar el CODIGO del PAN*</string>
							</td>
						</tr>
					</table>
				</form>

				<table align="center" width="100" class="responsive-table">
					<caption>Panes Registrados</caption>
					<tr>
						<td>Codigo</td>
						<td>Nombre</td>
						<td>Estado</td>
						<td>Eliminar</td>
					</tr>
					<?php
					$lista = $d->ListarPan();
					for ($i = 0; $i < count($lista); $i++) {
						$p = $lista[$i];
						echo "<tr>";
						echo "<td>" . $p->getCodigoPan() . "</td>";
						echo "<td>" . $p->getNombrePan() . "</td>";
						echo "<td>" . $p->getEstadoPan() . "</td>";
						echo "<td> <a href='AgregarPan.php?cod_eli=" . $p->getCodigoPan() . "' style='color: #FE3E3E' onclick='return ConfirmDelete()'>Eliminar Pan</a></td>";
						echo "</tr>";
					}
					?>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>