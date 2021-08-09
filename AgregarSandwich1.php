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
		var respuesta = confirm("¿Estas seguro/a que deseas ELIMINAR este SANDWICH?");
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
		var respuesta = confirm("¿Estas seguro/a que deseas AGREGAR este SANDWICH?");
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
			<a href="AgregarSandwich1.php" style='background-color:#81D5D0; color:#000; text-align:center; letter-spacing:2px;'>Agregar Sandwich</a>
			<a href="GestionPrecios1.php">Gestion de precios Sandwich</a>
			<a href="GestionUsuarios1.php">Gestion de usuarios</a>
			<a href="GestionEmpleados.php">Gestion de Empleados</a>
			<a href="GestionVentas1.php">Historial de ventas</a>
			<form action="LoginAdministrador.php" method="get" id="fm_cerrar">
				<input type="submit" name="btn_cerr" onclick="return ConfirmExit()" value="Cerrar Sesion" style='width: 100%; height: 40px; border:none; color:#fff; background-color:#4C55AF;'>
			</form>
		</div>

		<div class="vertical-menu" style="float: right;">
			<a href="#" class="active">Menu Administrador</a>
			<a href="EliminadosPanes.php">Panes Eliminados</a>
			<a href="EliminadosQuesos.php">Quesos Eliminados</a>
			<a href="EliminadosSalsas.php">Salsas Eliminadas</a>
			<a href="EliminadosVegetales.php">Vegetales Eliminados</a>
			<a href="EliminadasBebidas.php">Bebidas Eliminadas</a>
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
			<a href="Agregarjugo.php">Agregar Jugo</a>
			<a href="AgregarExtra.php">Agregar Extra</a>

		</div>
	</center>
<br>
	<table style="background: #81D5D0; border: 2px solid white;">
		<tr>

			<td>

				<?php


				require 'Clases/DAO.php';
				$d = new DAO();
				if (isset($_POST['btn_agregarSand'])) {
					$cod = $_POST['txt_codSand'];
					$nom = $_POST['txt_nomSand'];
					$pre = $_POST['txt_preSand'];
					$pre1 = $_POST['txt_preSand1'];

					$s = new Producto($cod, $nom, $pre, $pre1);
					$d->AgregarSandwich($s);
				}

				if (isset($_GET['cod_eli'])) {
					$cod = $_GET['cod_eli'];
					$d->EliminarSandwich($cod);
				}
				?>
				<form action="AgregarSandwich1.php" method="POST">
					<table align="center" width="100" class="responsive-table">
						<caption>Sandwiches</caption>
						<tr>
							<td>Codigo del Sandwich</td>
							<td>
								<input type="number" name="txt_codSand"style="background: white;" placeholder="Digite el codigo del sandwich nuevo" required maxlength="4" min="1">
							</td>
						</tr>
						<tr>
							<td>Nombre del Sandwich</td>
							<td>
								<input type="text" name="txt_nomSand" style="background: white;" placeholder="Escriba el nombre del sandwich nuevo" required>
							</td>
						</tr>
						<tr>
							<td>Precio del Sandwich 15 CM</td>
							<td>
								<input type="number" name="txt_preSand"style="background: white;" placeholder="Digite el precio de 15 CM del nuevo sandwich" required maxlength="4" min="1">
							</td>
						</tr>
						<tr>
							<td>Precio del Sandwich 30 CM</td>
							<td>
								<input type="number" name="txt_preSand1" style="background: white;"placeholder="Digite el precio de 30 CM del nuevo sandwich" required maxlength="4" min="1">
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="btn_agregarSand" onclick="return ConfirmAdd()" value="Agregar Sandwich" style="color:black; text-transform:uppercase; background: #35DD1F; padding: 10px; border: 1px solid gray; cursor: pointer;">
							</td>
						</tr>
					</table>
				</form>

				<table align="center" width="100" class="responsive-table">
					<caption>Sandwiches Registrados</caption>
					<tr>
						<td>Codigo</td>
						<td>Nombre</td>
						<td>Precio 15 CM</td>
						<td>Precio 30 CM</td>
						<td>Eliminar</td>
					</tr>
					<?php
					$lista = $d->ListarSandwich();
					for ($i = 0; $i < count($lista); $i++) {
						$s = $lista[$i];
						echo "<tr>";
						echo "<td>" . $s->getCodigoPro() . "</td>";
						echo "<td>" . $s->getNombrePro() . "</td>";
						echo "<td>" . $s->getPrecioPro15() . "</td>";
						echo "<td>" . $s->getPrecioPro30() . "</td>";
						echo "<td> <a href='AgregarSandwich1.php?cod_eli=" . $s->getCodigoPro() . "' style='color: #FE3E3E' onclick='return ConfirmDelete()'>Eliminar Sandwich</a></td>";
						echo "</tr>";
					}
					?>
				</table>
			</td>

		</tr>
	</table>





</body>

</html>