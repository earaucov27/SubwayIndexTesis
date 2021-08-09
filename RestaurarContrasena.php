<html lang="en" dir="ltr">
<head>
	<title>Restauración de Contraseña</title>
	<link rel="stylesheet" href="Diseno/Estilo.css" type="text/css">
</head>

<script type="text/javascript">
	function ConfirmRes(){
		var res = confirm("¿Esta seguro/a que desea actualizar su CONTRASEÑA con ese DATO?");
		if (res == true) {
			return true;
		}else{
			return false;
		}
	}
</script>

<body oncopy="return false" onpaste="return false">


	<?php
		//require 'Clases/DAO.php';
		//$d = new DAO();
		if (isset($_POST['btn_modificarUsu'])){
		$ema = $_POST['txtEma'];
		$res = $_POST['txtRes'];
		$pas = $_POST['txtPas'];
		$con = mysqli_connect("localhost","root","","rapidsubway");
		$sql = "update usuarios set ContrasenaUsuario='$pas' where EmailUsuario='$ema' and RespuestaUsuario='$res'";
		$res = mysqli_query($con,$sql);
		json_encode($res);
		mysqli_close($con);
		echo "<center><table><tr><td><h6 align='center' class='Perfec'>Actualizado Correctamente</h6><td></tr></table></center>";
		}
	?>

	<style>
		.TituloRes{
			font-size: 50px;
			text-transform: uppercase;
			letter-spacing: 2px;
			font-family: sans-serif;
			text-align: center;
		}
		.CasillaRes{
			width: 100%;
			height: 40px;
			padding: 5px;
			top: 5px;
		}
		.CasillaRes:hover{
			background-color: #e8f5e9;
			width: 100%;
			height: 40px;
			padding: 5px;
			top: 5px;
		}
		.BtnRes{
			top: 5px;
			padding: 2px;
			width: 100%;
			height: 40px;
			border: none;
			background-color: #ffff8d;
			border-radius: 20px;
			letter-spacing: 3px;
			text-transform: uppercase;
			font-family: sans-serif;
			font-size: 20px;
		}
		.Ares{
			font-family: sans-serif;
			font-size: 20px;
			color: #004d40;
			text-decoration: none;
			letter-spacing: 3px;
		}
		.Perfec{
			font-size: 20px;
			color: #388e3c;
			text-transform: uppercase;
			letter-spacing: 2px;
		}
	</style>

	<form action="RestaurarContrasena.php" method="post">
		<center>
			<table>
				<tr>
					<td><h4 class="TituloRes">Restaurar Contraseña</h4></td>
				</tr>
				<tr>
					<td><input type="email" class="CasillaRes" name="txtEma" placeholder="Ingrese el correo" min="5" maxlength="40" required=""></td>
				</tr>
				<tr>
					<td><input type="text" class="CasillaRes" name="txtRes" placeholder="¿Cual es su animal favorito?" min="5" maxlength="40" required=""></td>
				</tr>
				<tr>
					<td><input type="password" class="CasillaRes" name="txtPas" placeholder="Ingrese contraseña nueva" min="5" maxlength="40" required=""></td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Cambiar la Contraseña" onclick="return ConfirmRes()" name="btn_modificarUsu" class="BtnRes">
					</td>
					<td>
						<a href="Logeo.php" class="ARes">Volver al LOGIN</a>
					</td>
				</tr>
			</table>
		</center>
	</form>

</body>
</html>
