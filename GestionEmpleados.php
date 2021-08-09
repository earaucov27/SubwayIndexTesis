<?php
session_start();
if(isset($_SESSION['Administrador']) == false){
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
	function ConfirmDelete(){
		var respuesta = confirm("¿Estas seguro/a que deseas ELIMINAR este EMPLEADO?");
		if (respuesta == true) {
			return true;
		}else{
			return false;
		}
	}

</script>

<script type="text/javascript">
    function ConfirmExit(){
      var res = confirm("Esta seguro/a que desea CERRAR SESION?");
      if (res == true) {
        return true;
      }else{
        return false;
      }
    }
  </script>

<script type="text/javascript">
	function ConfirmAdd(){
		var respuesta = confirm("¿Estas seguro/a que deseas AGREGAR este EMPLEADO?");
		if (respuesta == true) {
			return true;
		}else{
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
			<a href="GestionEmpleados.php" style='background-color:#81D5D0; color:#000; text-align:center; letter-spacing:2px;'>Gestion de Empleados</a>
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
    <table style="background: #81D5D0; border: 2px solid gray;">
      <tr>

        <td>

		<?php


			require 'Clases/DAO.php';
			$d = new DAO();
				if (isset($_POST['btnAgregarEmpleado'])){
		      		$cod = $_POST['txtCodigo'];
					$nom = $_POST['txtNombre'];
					$rut = $_POST['txtRut'];
					$con = $_POST['txtContrasena'];
					$cor = $_POST['txtCorreo'];

					$e = new Empleado($cod,$nom,$rut,$con,$cor);
					$d->AgregarEmpleado($e);
				}

				if (isset($_GET['cod_eli'])) {
		            $cod = $_GET['cod_eli'];
		           	$d->EliminarEmpleado($cod);
		        }
			?>
		<form action="GestionEmpleados.php" method="POST">
			<table align="center" width="100" class="responsive-table">
			<caption>Empleados</caption>
			<tr>
				<td>Codigo</td>
				<td>
					<input type="number" name="txtCodigo" style="background: white;"placeholder="Digite el codigo del nuevo Empleado" required maxlength="6" min="1">
				</td>
			</tr>
			<tr>
				<td>Nombre del Empleado</td>
				<td>
					<input type="text" name="txtNombre" style="background: white;"placeholder="Escriba el Nombre y Apellido del Empleado" required>
				</td>
			</tr>
			<tr>
				<td >Rut</td>
				<td>
					<input type="text" name="txtRut" style="background: white;"placeholder="Escriba el rut del Empleado" required maxlength="12" min="1">
				</td>
			</tr>
			<tr hidden>
				<td >Contraseña</td>
				<td>
					<input type="password" name="txtContrasena" style="background: white;" maxlength="15" min="1">
				</td>
			</tr>
      <tr>
				<td >Correo</td>
				<td>
					<input type="email" name="txtCorreo"style="background: white;" placeholder="Escriba el correo del Empleado" required maxlength="50" min="1">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="btnAgregarEmpleado" onclick="return ConfirmAdd()" value="Agregar Empleado"  style="color:black; text-transform:uppercase; background: #35DD1F; padding: 10px; border: 1px solid gray; cursor: pointer;">
				</td>
			</tr>
		</table>
		</form>

					<table align="center" width="100" class="responsive-table">
						<caption>Empleados Registrados</caption>
						<tr>
							<td>Codigo</td>
							<td>Nombre</td>
              				<td>Rut</td>
							<td>Contraseña</td>
							<td>Correo</td>              
							<td>Eliminar</td>
						</tr>
						<?php
							$lista = $d->ListarEmpleados();
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

        </td>

      </tr>
    </table>





  </body>
</html>
