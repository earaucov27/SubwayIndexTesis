<?php
require 'Usuario.php';
require 'Administrador.php';
require 'Sandwich.php';
require 'Venta.php';
require 'Producto.php';
require 'Pan.php';
require 'Queso.php';
require 'Extra.php';
require 'Bebidas.php';
require 'Aguas.php';
require 'Jugos.php';
require 'Vegetales.php';
require 'Salsas.php';
require 'Compras.php';
require 'Tamanos.php';
require 'Empleado.php';


class DAO
{
	var $mi;

	private function conexion()
	{
		$this->mi = new mysqli("localhost", "root", "", "rapidsubway");
		if ($this->mi->connect_errno) {
			die("error en la conexion en la base de datos");
		}
	}

	private function desconexion()
	{
		$this->mi->close();
	}

	public function AgregarEmpleado(Empleado $e)
	{
		$this->conexion();
		$cod = $e->getCodigo();
		$nom = $e->getNombre();
		$rut = $e->getRut();
		$cor = $e->getCorreo();

		$sql = "insert into EMPLEADOS values ('$cod','$nom','$rut','123456','$cor')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Empleado</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Empleado, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarSandwich(Producto $s)
	{
		$this->conexion();
		$cod = $s->getCodigoPro();
		$nom = $s->getNombrePro();
		$pre = $s->getPrecioPro15();
		$pre1 = $s->getPrecioPro30();

		$sql = "insert into productos values ('$cod','$nom','$pre','$pre1')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Sandwich</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Sandwich, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarPan(Pan $p)
	{
		$this->conexion();
		$cod = $p->getCodigoPan();
		$nom = $p->getNombrePan();

		$sql = "insert into panes values ('$cod','$nom','Activo')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Pan</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Pan, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarQueso(Queso $q)
	{
		$this->conexion();
		$cod = $q->getCodigoQue();
		$nom = $q->getNombreQue();
		$est = $q->getEstadoQue();

		$sql = "insert into quesos values ('$cod','$nom','$est')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Queso</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Queso, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarSalsa(Salsas $s)
	{
		$this->conexion();
		$cod = $s->getCodigoSal();
		$nom = $s->getNombreSal();

		$sql = "insert into salsas values ('$cod','$nom',''Activo')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente la Salsa</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar la Salsa, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarVegetal(Vegetales $v)
	{
		$this->conexion();
		$cod = $v->getCodigoVeg();
		$nom = $v->getNombreVeg();

		$sql = "insert into vegetales values ('$cod','$nom','Activo')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Vegetal</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Vegetal, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarBebida(Bebidas $b)
	{
		$this->conexion();
		$cod = $b->getCodigoBeb();
		$nom = $b->getNombreBeb();
		$pre = $b->getPrecioBeb();
		$est = $b->getEstadoBeb();

		$sql = "insert into bebidas values ('$cod','$nom','$pre','$est')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente la Bebida</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar la Bebida, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarAgua(Aguas $a)
	{
		$this->conexion();
		$cod = $a->getCodigoAgu();
		$nom = $a->getNombreAgu();
		$pre = $a->getPrecioAgu();

		$sql = "insert into aguas values ('$cod','$nom','$pre','Activo')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Agua</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Agua, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarJugo(Jugos $j)
	{
		$this->conexion();
		$cod = $j->getCodigoJug();
		$nom = $j->getNombreJug();
		$pre = $j->getPrecioJug();

		$sql = "insert into jugos values ('$cod','$nom','$pre','Activo')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Jugo</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Jugo, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function AgregarExtra(Extra $e)
	{
		$this->conexion();
		$nom = $e->getNombreExt();
		$pre = $e->getPrecioExt();
		$pre1 = $e->getPrecioExt1();

		$sql = "insert into extras values (null,'$nom','$pre','$pre1','Activo')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se registro correctamente el Extra</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Extra, codigo ya registrado u otro factor está erroneo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	/*public function ModificarSandwich($cod){
		$this->conexion();
		$cod = $s->getCodigo();
		$nom = $s->getNombre();
		$pre = $s->getPrecio();
		$sql = "update sandwich set nom_sand='$nom', pre_sand='$pre' where cod_sand='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se actualizo correctamente el Sandwich</h6><td></tr></table></center>";
		}else{
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo actualizar el Sandwich, verifique los datos</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}*/

	public function ListarEmpleados()
	{
		$this->conexion();
		$sql = "select * from EMPLEADOS";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodEmp'];
			$nom = $rs['NomEmp'];
			$rut = $rs['RutEmp'];
			$con = $rs['ConEmp'];
			$cor = $rs['CorEmp'];
			$e = new Empleado($cod, $nom, $rut, $con, $cor);
			$lista[] = $e;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarSandwich()
	{
		$this->conexion();
		$sql = "select * from productos";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodProducto'];
			$nom = $rs['NomProducto'];
			$pre = $rs['PreProducto15'];
			$pre1 = $rs['PreProducto30'];

			$s = new Producto($cod, $nom, $pre, $pre1);
			$lista[] = $s;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarPan()
	{
		$this->conexion();
		$sql = "select * from panes where EstPan='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodPan'];
			$nom = $rs['NomPan'];
			$est = $rs['EstPan'];

			$p = new Pan($cod, $nom, $est);
			$lista[] = $p;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarPanesEliminados()
	{
		$this->conexion();
		$sql = "select * from panes where EstPan='Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodPan'];
			$nom = $rs['NomPan'];
			$est = $rs['EstPan'];

			$p = new Pan($cod, $nom, $est);
			$lista[] = $p;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarQueso()
	{
		$this->conexion();
		$sql = "select * from quesos where EstQue='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodQue'];
			$nom = $rs['NomQue'];
			$est = $rs['EstQue'];

			$q = new Queso($cod, $nom, $est);
			$lista[] = $q;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarQuesosEliminados()
	{
		$this->conexion();
		$sql = "select * from quesos where EstQue='Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodQue'];
			$nom = $rs['NomQue'];
			$est = $rs['EstQue'];

			$q = new Queso($cod, $nom, $est);
			$lista[] = $q;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarSalsa()
	{
		$this->conexion();
		$sql = "select * from salsas where EstSal='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodSal'];
			$nom = $rs['NomSal'];
			$est = $rs['EstSal'];

			$s = new Salsas($cod, $nom, $est);
			$lista[] = $s;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarSalsasEliminadas()
	{
		$this->conexion();
		$sql = "select * from salsas where EstSal='Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodSal'];
			$nom = $rs['NomSal'];
			$est = $rs['EstSal'];

			$s = new Salsas($cod, $nom, $est);
			$lista[] = $s;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarVegetal()
	{
		$this->conexion();
		$sql = "select * from vegetales";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodVeg'];
			$nom = $rs['NomVeg'];

			$v = new Vegetales($cod, $nom);
			$lista[] = $v;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarBebida()
	{
		$this->conexion();
		$sql = "select * from bebidas where EstBeb='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodBeb'];
			$nom = $rs['NomBeb'];
			$pre = $rs['PreBeb'];
			$est = $rs['EstBeb'];

			$b = new Bebidas($cod, $nom, $pre, $est);
			$lista[] = $b;
		}
		$this->desconexion();
		return $lista;
	}
	public function ListarBebidaEliminada()
	{
		$this->conexion();
		$sql = "select * from bebidas where EstBeb='Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodBeb'];
			$nom = $rs['NomBeb'];
			$pre = $rs['PreBeb'];
			$est = $rs['EstBeb'];

			$b = new Bebidas($cod, $nom, $pre, $est);
			$lista[] = $b;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarAgua()
	{
		$this->conexion();
		$sql = "select * from aguas where EstAgu='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodAgu'];
			$nom = $rs['NomAgu'];
			$pre = $rs['PreAgu'];
			$est = $rs['EstAgu'];

			$a = new Aguas($cod, $nom, $pre, $est);
			$lista[] = $a;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarAguasEliminadas()
	{
		$this->conexion();
		$sql = "select * from aguas where EstAgu = 'Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodAgu'];
			$nom = $rs['NomAgu'];
			$pre = $rs['PreAgu'];
			$est = $rs['EstAgu'];

			$a = new Aguas($cod, $nom, $pre, $est);
			$lista[] = $a;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarJugo()
	{
		$this->conexion();
		$sql = "select * from jugos where EstJug='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodJug'];
			$nom = $rs['NomJug'];
			$pre = $rs['PreJug'];
			$est = $rs['EstJug'];

			$j = new Jugos($cod, $nom, $pre, $est);
			$lista[] = $j;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarJugosEliminados()
	{
		$this->conexion();
		$sql = "select * from jugos where EstJug='Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodJug'];
			$nom = $rs['NomJug'];
			$pre = $rs['PreJug'];
			$est = $rs['EstJug'];

			$j = new Jugos($cod, $nom, $pre, $est);
			$lista[] = $j;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarExtra()
	{
		$this->conexion();
		$sql = "select * from extras where EstExt='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodExt'];
			$nom = $rs['NomExt'];
			$pre = $rs['PreExt15'];
			$pre1 = $rs['PreExt30'];
			$est = $rs['EstExt'];

			$e = new Extra($cod, $nom, $pre, $pre1, $est);
			$lista[] = $e;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarExtrasEliminados()
	{
		$this->conexion();
		$sql = "select * from extras where EstExt='Eliminado'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodExt'];
			$nom = $rs['NomExt'];
			$pre = $rs['PreExt15'];
			$pre1 = $rs['PreExt30'];
			$est = $rs['EstExt'];

			$e = new Extra($cod, $nom, $pre, $pre1, $est);
			$lista[] = $e;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboSandwich()
	{
		$this->conexion();
		$sql = "select CodProducto,NomProducto,PreProducto15,PreProducto30 from productos";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodProducto'];
			$nom = $rs['NomProducto'];
			$pre = $rs['PreProducto15'];
			$pre1 = $rs['PreProducto30'];
			$p = new Producto($cod, $nom, $pre, $pre1);
			$lista[] = $p;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboPan()
	{
		$this->conexion();
		$sql = "select * from panes where EstPan='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodPan'];
			$nom = $rs['NomPan'];
			$est = $rs['EstPan'];
			$z = new Pan($cod, $nom, $est);
			$lista[] = $z;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboQueso()
	{
		$this->conexion();
		$sql = "select * from quesos where EstQue='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodQue'];
			$nom = $rs['NomQue'];
			$est = $rs['EstQue'];

			$q = new Queso($cod, $nom, $est);
			$lista[] = $q;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboExtra()
	{
		$this->conexion();
		$sql = "select * from extras where EstExt = 'Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodExt'];
			$nom = $rs['NomExt'];
			$pre = $rs['PreExt15'];
			$pre1 = $rs['PreExt30'];
			$est = $rs['EstExt'];

			$e = new Extra($cod, $nom, $pre, $pre1, $est);
			$lista[] = $e;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboBebida()
	{
		$this->conexion();
		$sql = "select * from bebidas where EstBeb='Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodBeb'];
			$nom = $rs['NomBeb'];
			$pre = $rs['PreBeb'];
			$est = $rs['EstBeb'];
			$b = new Bebidas($cod, $nom, $pre, $est);
			$lista[] = $b;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboAgua()
	{
		$this->conexion();
		$sql = "select * from aguas where EstAgu = 'Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodAgu'];
			$nom = $rs['NomAgu'];
			$pre = $rs['PreAgu'];
			$est = $rs['EstAgu'];

			$a = new Aguas($cod, $nom, $pre, $est);
			$lista[] = $a;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboJugo()
	{
		$this->conexion();
		$sql = "select * from jugos where EstJug = 'Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodJug'];
			$nom = $rs['NomJug'];
			$pre = $rs['PreJug'];
			$est = $rs['EstJug'];

			$j = new Jugos($cod, $nom, $pre, $est);
			$lista[] = $j;
		}
		$this->desconexion();
		return $lista;
	}

	public function ComboTamano()
	{
		$this->conexion();
		$sql = "select * from tamanos";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodTam'];
			$nom = $rs['NomTam'];
			$t = new Tamanos($cod, $nom);
			$lista[] = $t;
		}
		$this->desconexion();
		return $lista;
	}

	public function CheckVegetales()
	{
		$this->conexion();
		$sql = "select * from vegetales";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodVeg'];
			$nom = $rs['NomVeg'];
			$v = new Vegetales($cod, $nom);
			$lista[] = $v;
		}
		$this->desconexion();
		return $lista;
	}

	public function CheckSalsas()
	{
		$this->conexion();
		$sql = "select * from salsas where EstSal = 'Activo'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodSal'];
			$nom = $rs['NomSal'];
			$est = $rs['NomSal'];

			$s = new Salsas($cod, $nom, $est);
			$lista[] = $s;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarUsuarios()
	{
		$this->conexion();
		$sql = "select * from usuarios";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodigoUsuario'];
			$ema = $rs['EmailUsuario'];
			$nom = $rs['NombreUsuario'];
			$ape = $rs['ApellidoUsuario'];
			$cont = $rs['ContrasenaUsuario'];
			$dir = $rs['DireccionUsuario'];
			$res = $rs['RespuestaUsuario'];
			$u = new Usuario($cod, $ema, $nom, $ape, $cont, $dir, $res);
			$lista[] = $u;
		}
		$this->desconexion();
		return $lista;
	}

	public function EliminarEmpleado($cod)
	{
		$this->conexion();
		$sql = "delete from EMPLEADOS where CodEmp='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Empleado</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Empleado</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarSandwich($cod)
	{
		$this->conexion();
		$sql = "delete from productos where CodProducto='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Sandwich</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Sandwich</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarPan($cod)
	{
		$this->conexion();
		$sql = "update panes set EstPan='Eliminado' where CodPan='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Pan</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Pan</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarPan($cod)
	{
		$this->conexion();
		$sql = "update panes set EstPan='Activo' where CodPan='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se activó correctamente el Pan</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo activar el Pan</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarQueso($cod)
	{
		$this->conexion();
		$sql = "update quesos set EstQue='Eliminado' where CodQue='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se eliminó correctamente el Queso</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Queso</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarQueso($cod)
	{
		$this->conexion();
		$sql = "update quesos set EstQue='Activo' where CodQue='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se activó correctamente el Queso</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo activar el Queso</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarSalsa($cod)
	{
		$this->conexion();
		$sql = "update salsas set EstSal='Eliminado' where CodSal='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente la Salsa</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar la Salsa</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarSalsa($cod)
	{
		$this->conexion();
		$sql = "update salsas set EstSal='Activo' where CodSal='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se activó correctamente la Salsa</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo activar la Salsa</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarVegetal($cod)
	{
		$this->conexion();
		$sql = "delete from vegetales where CodVeg='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Vegetal</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar El Vegetal</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	/*public function EliminarBebida($cod){
			$this->conexion();
			$sql = "delete from bebidas where CodBeb='$cod'";
			$st = $this->mi->query($sql);
			if ($st == 1) {
					echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente la Bebida</h6><td></tr></table></center>";
			}else{
					echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar la Bebida</h6><td></tr></table></center>";
			}
			$this->desconexion();
	}*/

	public function EliminarBebida($cod)
	{
		$this->conexion();
		$sql = "update bebidas set EstBeb='Eliminado' where CodBeb='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente la Bebida</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar la Bebida</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarBebida($cod)
	{
		$this->conexion();
		$sql = "update bebidas set EstBeb='Activo' where CodBeb='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se activo la bebida correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo activar la Bebida</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarAgua($cod)
	{
		$this->conexion();
		$sql = "update aguas set EstAgu='Eliminado' where CodAgu='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Agua</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Agua</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarAgua($cod)
	{
		$this->conexion();
		$sql = "update aguas set EstAgu='Activo' where CodAgu='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se activo el agua correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo activar el Agua</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarJugo($cod)
	{
		$this->conexion();
		$sql = "update jugos set EstJug='Eliminado' where CodJug='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Jugo</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Jugo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarJugo($cod)
	{
		$this->conexion();
		$sql = "update jugos set EstJug='Activo' where CodJug='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se activó correctamente el Jugo</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo activar el Jugo</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarExtra($cod)
	{
		$this->conexion();
		$sql = "update extras set EstExt='Eliminado' where CodExt='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se elimino correctamente el Extra</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Extra</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function ActivarExtra($cod)
	{
		$this->conexion();
		$sql = "update extras set EstExt='Activo' where CodExt='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Se Activó correctamente el Extra</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo Activar el Extra</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarUsuario($cod)
	{
		$this->conexion();
		$sql = "delete from usuarios where CodigoUsuario='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Usuario Eliminado Correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo eliminar el Usuario</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function Ventas()
	{
		$this->conexion();
		$sql = "select * from ventas";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['cod_vent'];
			$nom = $rs['nom_vent'];

			$v = new Venta($cod, $nom);
			$lista[] = $v;
		}
		$this->desconexion();
		return $lista;
	}

	public function InicioAdmin($ema2, $pas2)
	{ //inicio de sesion
		$this->conexion();
		$sql = "select count(*) from administradores where EmailAdministrador = '$ema2' and ContrasenaAdministrador = '$pas2'"; //busca el usuario dentro de la base de datos

		$st = $this->mi->query($sql);
		$resultado = mysqli_fetch_array($st);
		$this->desconexion();
		return $resultado;
	}

	public function ListarCompra($usuario)
	{
		$this->conexion();
		$sql = "select * from compras where Usuario='" . $usuario . "'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodCom'];
			$tam = $rs['TamCom'];
			$san = $rs['NomProducto'];
			$pan = $rs['NomPan'];
			$que = $rs['NomQue'];
			$ext = $rs['NomExt'];
			$veg = $rs['NomVeg'];
			$sal = $rs['NomSal'];
			$beb = $rs['NomBeb'];
			$agu = $rs['NomAgu'];
			$jug = $rs['NomJug'];
			$usu = $rs['Usuario'];
			$est = $rs['Estado'];

			$c = new Compras($cod, $tam, $san, $pan, $que, $ext, $veg, $sal, $beb, $agu, $jug, $usu, $est);
			$lista[] = $c;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarHistorial($usuario)
	{
		$this->conexion();
		$sql = "select * from HISTORIAL where Usuario='" . $usuario . "'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodCom'];
			$tam = $rs['TamCom'];
			$san = $rs['NomProducto'];
			$pan = $rs['NomPan'];
			$que = $rs['NomQue'];
			$ext = $rs['NomExt'];
			$veg = $rs['NomVeg'];
			$sal = $rs['NomSal'];
			$beb = $rs['NomBeb'];
			$agu = $rs['NomAgu'];
			$jug = $rs['NomJug'];
			$usu = $rs['Usuario'];
			$est = $rs['Estado'];

			$c = new Compras($cod, $tam, $san, $pan, $que, $ext, $veg, $sal, $beb, $agu, $jug, $usu, $est);
			$lista[] = $c;
		}
		$this->desconexion();
		return $lista;
	}

	public function ListarCompraAdministrador()
	{
		$this->conexion();
		$sql = "select * from historial_Admin";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodCom'];
			$tam = $rs['TamCom'];
			$san = $rs['NomProducto'];
			$pan = $rs['NomPan'];
			$que = $rs['NomQue'];
			$ext = $rs['NomExt'];
			$veg = $rs['NomVeg'];
			$sal = $rs['NomSal'];
			$beb = $rs['NomBeb'];
			$agu = $rs['NomAgu'];
			$jug = $rs['NomJug'];
			$usu = $rs['Usuario'];
			$est = $rs['Estado'];

			$c = new Compras($cod, $tam, $san, $pan, $que, $ext, $veg, $sal, $beb, $agu, $jug, $usu, $est);
			$lista[] = $c;
		}
		$this->desconexion();
		return $lista;
	}

	public function registrarCompra(Compras $c, $usu)
	{
		$this->conexion();
		$cod =  "";
		$tam = $c->getTamanoCom();
		$san = $c->getNombreSan();
		$pan = $c->getNombrePan();
		$que = $c->getNombreQue();
		$ext = $c->getNombreExt();
		$veg = $c->getNombreVeg();
		$sal = $c->getNombreSal();
		$beb = $c->getNombreBeb();
		$agu = $c->getNombreAgu();
		$jug = $c->getNombreJug();
		$est = $c->getEstadoPro();
		//$usu = $c->getUsuario();

		$sql = "insert into compras values (null,'$tam','$san','$pan','$que','$ext','$veg','$sal','$beb','$agu','$jug','$usu','$est')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Pedido Registrado Correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se Pudo Registrar el pedido</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function registrarHistorial(Compras $v)
	{
		$this->conexion();
		$cod =  "";
		$tam = $v->getTamanoCom();
		$san = $v->getNombreSan();
		$pan = $v->getNombrePan();
		$que = $v->getNombreQue();
		$ext = $v->getNombreExt();
		$veg = $v->getNombreVeg();
		$sal = $v->getNombreSal();
		$beb = $v->getNombreBeb();
		$agu = $v->getNombreAgu();
		$jug = $v->getNombreJug();
		$usu = $v->getNombreUsu();
		$est = $v->getEstadoPro();
		//$usu = $c->getUsuario();

		$sql = "insert into historial values (null,'$tam','$san','$pan','$que','$ext','$veg','$sal','$beb','$agu','$jug','$usu','$est')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Pedido Registrado Correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se Pudo Registrar el pedido</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarCompra($cod)
	{
		$this->conexion();
		$sql = "delete from compras where CodCom='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #FEFB3E;font-size:25px;'>Pedido Eliminado Correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se Pudo Eliminar la Compra</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function EliminarHistorial($cod)
	{
		$this->conexion();
		$sql = "delete from historial where CodCom='$cod'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #FEFB3E;font-size:25px;'>Historial Eliminado Correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se Pudo Eliminar el Historial</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}

	public function RegistrarUsuario(Usuario $u)
	{
		$this->conexion();
		$ema = $u->getEmail();
		$nom = $u->getNombre();
		$ape = $u->getApellido();
		$con = $u->getContrasena();
		$dir = $u->getdireccion();
		$res = $u->getRespuesta();

		$sql = "insert into usuarios values (null,'$ema','$nom','$ape','$con','$dir','$res')";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #FEFB3E;font-size:25px;' id='titulo;'>Usuario Registrado Correctamente</h6><td></tr></table></center>";
		} else {
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo registrar el Usuario, Verifique los datos</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}


	/*public function ModificarUsuario($s){
		$this->conexion();
		$ema = $s->getEmail();
		$nom = $s->getNombre();
		$ape = $s->getApellido();
		$con = $s->getContrasena();
		$dir = $s->getDireccion();
		$res = $s->getRespuesta();
		$sql = "update usuarios set ContrasenaUsuario='$con' where EmailUsuario='$ema' and RespuestaUsuario='$res'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<center><table><tr><td><h6 align='center' style='color: #388e3c;font-size:25px;'>Usuario Actualizado Correctamente</h6><td></tr></table></center>";
		}else{
			echo "<center><table><tr><td><h6 align='center' style='color: #d32f2f;font-size:25px;'>No se pudo Actualizar el Usuario</h6><td></tr></table></center>";
		}
		$this->desconexion();
	}*/


	public function ActualizarHistorial($CodCom)
	{
		$this->conexion();
		$sql = "INSERT INTO historial SELECT * FROM compras where CodCom='$CodCom';";
		$st = $this->mi->query($sql);
	}

	public function ActualizarHistorialAdmin($CodCom)
	{
		$this->conexion();
		$sql = "INSERT INTO historial_Admin SELECT * FROM compras where CodCom='$CodCom';";
		$st = $this->mi->query($sql);
		$sql = "DELETE from compras where CodCom='$CodCom'";
		$st = $this->mi->query($sql);
	}

	public function ActualizarEstado($CodCom)
	{
		$this->conexion();
		$sql = "update compras set Estado='Pagado' where CodCom ='$CodCom'";
		$st = $this->mi->query($sql);
		if ($st == 1) {
			echo "<h4>Compra Pendiente para su despacho</h4>";
		} else {
			echo "No se pudo realizar la Compra del Sandwich";
		}
		$this->desconexion();
	}

	public function modificarEmpleado(Empleado $e)
	{
		$this->conexion();
		$codigo = $e->getCodigo();
		$nombre = $e->getNombre();
		$rut = $e->getRut();
		$contrasena = $e->getContrasena();
		$correo = $e->getCorreo();

		$sql = "update productos set CodEmp='$codigo',NomEmp='$nombre',RutEmp='$rut',ConEmp='$contrasena',CorEmp='$correo'";
		$st = $this->mi->query($sql);

		if ($st == 1) {
			echo "<div class='container'>";
			echo "<div class='card-panel'>";
			echo "<h5 class='center'>Los datos han sido modificados correctamente<h5>";
			echo "</div>";
			echo "</div>";
		} else {
			echo "<div class='card-panel'>";
			echo "";
			echo "Error al modificar datos, no se ha podido modificar los datos";
			echo "";
			echo "</div>";
		}
	} //cierra modificarEmpleado()

	public function ListarDatosEmpleado($rut)
	{
		$this->conexion();
		$sql = "select * from EMPLEADOS where RutEmp = '$rut'";
		$lista = array();
		$st = $this->mi->query($sql);
		while ($rs = mysqli_fetch_array($st)) {
			$cod = $rs['CodEmp'];
			$nom = $rs['NomEmp'];
			$rut = $rs['RutEmp'];
			$con = $rs['ConEmp'];
			$cor = $rs['CorEmp'];
			$e = new Empleado($cod, $nom, $rut, $con, $cor);
			$lista[] = $e;
		}
		$this->desconexion();
		return $lista;
	}
}//cierra la clase DAO
