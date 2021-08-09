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
		var respuesta = confirm("¿Estas seguro/a que deseas ELIMINAR esta BEBIDA?");
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
		var respuesta = confirm("¿Estas seguro/a que deseas AGREGAR esta BEBIDA?");
		if (respuesta == true) {
			return true;
		}else{
			return false;
		}
	}
</script>

<script type="text/javascript">
	function ConfirmMod(){
		var respuesta = confirm("¿Estas seguro/a que deseas ACTUALIZAR esta BEBIDA?");
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
				<a href="AgregarPan.php">Agregar Pan</a>
				<a href="AgregarQueso.php">Agregar Queso</a>
				<a href="AgregarSalsa.php">Agregar Salsa</a>
				<a href="AgregarVegetal.php">Agregar Vegetal</a>
				<a href="AgregarBebida.php"  style='background-color:#81D5D0; color:#000; text-align:center; letter-spacing:2px;'>Agregar Bebida</a>
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
				if (isset($_POST['btn_agregarBebida'])){
		      		$cod = $_POST['txt_codBeb'];
					$nom = $_POST['txt_nomBeb'];
					$pre = $_POST['txt_preBeb'];
					$est = $_POST['txt_estBeb'];

					$b = new Bebidas($cod,$nom,$pre,$est);
					$d->AgregarBebida($b);
				}

				if (isset($_GET['cod_eli'])) {
		            $cod = $_GET['cod_eli'];
		           	$d->EliminarBebida($cod);
		        }
			?>

			<?php
				if (isset($_POST['btn_modificarBebida'])){
		      		$cod = $_POST['txt_codBeb'];
					$nom = $_POST['txt_nomBeb'];
					$pre = $_POST['txt_preBeb'];
					$est= $POST['txt_estBeb'];
					$con = mysqli_connect("localhost","root","","rapidsubway");
					$sql = "update bebidas set NomBeb='$nom', PreBeb='$pre' where CodBeb='$cod'";
					$res = mysqli_query($con,$sql);
					json_encode($res);
					mysqli_close($con);
					echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se actualizo correctamente la Bebida</h6><td></tr></table></center>";
				}
			?>

			<?php
				if (isset($_POST['btn_eliminarBebida'])){
		      		$cod = $_POST['txt_codBeb'];
					$nom = $_POST['txt_nomBeb'];
					$pre = $_POST['txt_preBeb'];
					$est= $POST['txt_estBeb'];
					$con = mysqli_connect("localhost","root","","rapidsubway");
					$sql = "update bebidas set NomBeb='$nom', PreBeb='$pre', EstBeb='Eliminado' where CodBeb='$cod'";
					$res = mysqli_query($con,$sql);
					json_encode($res);
					mysqli_close($con);
					echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se actualizo correctamente la Bebida</h6><td></tr></table></center>";
				}
			?>

		<form action="AgregarBebida.php" method="POST">
			<table align="center" width="100" class="responsive-table">
			<caption>Bebida</caption>
			<tr>
				<td>Codigo de Bebida</td>
				<td>
					<input type="number" name="txt_codBeb" style="background: white;"placeholder="Digite el codigo de Bebida nueva" required maxlength="4" min="1">
				</td>
			</tr>
			<tr>
				<td>Nombre de Bebida</td>
				<td>
					<input type="text" name="txt_nomBeb" style="background: white;"placeholder="Escriba el nombre de la Bebida nueva" required>
				</td>
			</tr>
			<tr>
				<td>Precio de Bebida</td>
				<td>
					<input type="text" name="txt_preBeb" style="background: white;"placeholder="Digite el precio de la Bebida nueva" required>
				</td>
			</tr>
			<tr hidden>
				<td>Estado de Bebida</td>
				<td>
					<input type="text" name="txt_estBeb" style="background: white;"placeholder="Digite el precio de la Bebida nueva" required value='Activo'>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="btn_agregarBebida" onclick="return ConfirmAdd()" value="Agregar Bebida"  style="color:black; text-transform:uppercase; background: #35DD1F; padding: 10px; border: 1px solid gray; cursor: pointer;">
				</td>
				<td>
					<input type="submit" name="btn_modificarBebida" onclick="return ConfirmMod()" value="Actualizar Datos"  style="color:black; text-transform:uppercase; background: #FFF441; padding: 10px; border: 1px solid gray; cursor: pointer;">
					<string>*Para actualizar la Bebida se necesita indicar el CODIGO de la BEBIDA*</string>
				</td>
			</tr>
		</table>
		</form>

					<table align="center" width="100" class="responsive-table">
						<caption>Bebidas Registradas</caption>
						<tr>
							<td>Codigo</td>
							<td>Nombre</td>
							<td>Precio</td>
							<td>Estado</td>
							<td>Eliminar</td>
						</tr>
						<?php
							$lista = $d->ListarBebida();
							for ($i=0; $i < count($lista) ; $i++) {
								$b = $lista[$i];
								echo "<tr>";
								echo "<td>" . $b->getCodigoBeb() . "</td>";
								echo "<td>" . $b->getNombreBeb() . "</td>";
								echo "<td>" . $b->getPrecioBeb() . "</td>";
								echo "<td>" . $b->getEstadoBeb() . "</td>";
				        		echo "<td> <a href='AgregarBebida.php?cod_eli=". $b->getCodigoBeb() ."' style='color: #FE3E3E' onclick='return ConfirmDelete()'>Eliminar Bebida</a></td>";
								echo "</tr>";
							}
						?>

        </td>

      </tr>
    </table>
  </body>
</html>