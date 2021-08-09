<?php
session_start();
if(isset($_SESSION['Usuario']) == false){
	header("location: Logeo.php?error=1");
}

?>


<html lang="en" dir="ltr">
  <meta charset="UTF-8">
  <head>
    <!-- Iconos Materialize-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Libreria Jquery-->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <title>Formulario de Pedido</title>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems, options);
    });
    </script>


<script type="text/javascript">
  function ConfirmDelete(){
    var respuesta = confirm("¿Estas seguro/a que deseas BORRARLO del CARRITO?");
    if (respuesta == true) {
      return true;
    }else{
      return false;
    }
  }
  </script>

  <script type="text/javascript">
    function ConfirmSave(){
      var res = confirm("¿Desea continuar a la sección de PAGO?");
      if (res == true) {
        return true;
      }else{
        return false;
      }
    }
  </script>

  <script type="text/javascript">
    function ConfirmReset(){
      var res = confirm("¿Esta seguro/a que desea restablecer los datos seleccionados?");
      if (res == true) {
        return true;
      }else{
        return false;
      }
    }
  </script>

  <script type="text/javascript">
    function ConfirmAdd(){
      var res = confirm("El Sandwich se agregara al CARRITO ¿Desea continuar?");
      if (res == true) {
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

  </head>
  <body oncopy="return false" onpaste="return false" style="background: url('imagenes/fondo.jpg');">

    <style type="text/css">
      .Texto{
        font-size: 8px;
        text-transform: uppercase;
      }
    </style>

    <p style="width: 20%; margin-left: 10px; margin-top: 10px;">Bienvenido <strong>
      <?php echo $_SESSION["Usuario"];?>
    </strong></p>

		<form action="Logeo.php" method="get" id="fm_cerrar">
		<input type="submit" name="btn_cerr" value="Cerrar Sesion" onclick="return ConfirmExit()" style='width: 20%; height: 40px; border:none; color:#fff; background-color:#7cb342; cursor: pointer;'>
		</form>

    <?php
      require 'Clases/DAO.php';
      $d = new DAO();

      if (isset($_POST['btn_agregarGen'])){

        $cod = "";
        $tam = $_POST['CboTam'];
        $san = $_POST['CboSan'];
        $pan = $_POST['CboPan'];
        $que = $_POST['CboQue'];
        $ext = $_POST['CboExt'];
        $veg="";
        $sal="";

        for ($i=0; $i < 100; $i++) {
            if(isset($_POST['OpVeg'.$i])){
              $veg = $veg."<br>".$_POST['OpVeg'.$i];
            }
        }
        //echo "vegetales:".$veg;
        echo "<br/>";
        for ($i=0; $i < 100; $i++) {
            if(isset($_POST['OpSal'.$i])){
              $sal = $sal."<br>".$_POST['OpSal'.$i];
            }
        }
        
        $beb = $_POST['CboBeb'];
        $agu = $_POST['CboAgu'];
        $jug = $_POST['CboJug'];
        $usu = $_SESSION['Usuario'];
        $est = "Pendiente";

        $c = new Compras($cod,$tam,$san,$pan,$que,$ext,$veg,$sal,$beb,$agu,$jug,$usu,$est);
        $d->registrarCompra($c,$_SESSION["Usuario"]);
      }

      if (isset($_GET['cod_eli'])) {
              $cod = $_GET['cod_eli'];
              $d->EliminarCompra($cod);
          }
          if (isset($_GET['cod_eli1'])) {
              $cod = $_GET['cod_eli1'];
              $d->EliminarHistorial($cod);
          }
    ?>


    <form class="" action="formularioPedido.php" method="post">
      <table class="striped" style="width: 90%; margin: auto;">
        <tr>

          <td>
            <h6>Tamaño de Sandwich *</h6>
            <select style="cursor: pointer" class="browser-default" name="CboTam">
              <?php

                $lista = $d->ComboTamano();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                  $t = $lista[$i];
                  $cod = $t->getCodigo();
                  $nom = $t->getNombre();
                  echo "<option value='$nom'>$nom</option>";
                }
              ?>
            </select>
          </td>

          <td>
            <h6>Tipo de Sandwich *</h6>
            <select style="cursor: pointer" class="browser-default" name="CboSan">
              <?php

                $lista = $d->ComboSandwich();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                  $p = $lista[$i];
                  $cod = $p->getCodigoPro();
                  $nom = $p->getNombrePro();
                  echo "<option value='$nom'>$nom</option>";
                }
              ?>
            </select>
          </td>

          <td>
            <h6>Tipo de pan *</h6>
            <select class="browser-default" name="CboPan">
              <?php

                $lista = $d->ComboPan();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                $z = $lista[$i];
                $cod = $z->getCodigoPan();
                $nom = $z->getNombrePan();
                $est = $z->getEstadoPan();
                echo "<option value='$nom'>$nom</option>";
                }
              ?>
            </select>
          </td>
          <td>
            <h6>Tipo de Queso</h6>
            <select class="browser-default" name="CboQue">
              <?php

                $lista = $d->ComboQueso();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                $q = $lista[$i];
                $cod = $q->getCodigoQue();
                $nom = $q->getNombreQue();
                echo "<option value='$nom'>$nom</option>";
                }
              ?>
            </select>
          </td>
          <td>
            <h6>Extras <h6 class="Texto">En caso de no querer seleccione "ninguno"</h6></h6>
            <select class="browser-default" name="CboExt">
              <?php

                $lista = $d->ComboExtra();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                $e = $lista[$i];
                $cod = $e->getCodigoExt();
                $nom = $e->getNombreExt();
                echo "<option value='$nom'>$nom</option>";
                }
              ?>
            </select>
          </td>
        </tr>

        <tr>
          <td colspan="1" style="background: #CAF3C4;">
            <div class="row">
              <h6>Vegetales</h6>
            </div>
              <?php
                $lista = $d->CheckVegetales();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                  $v = $lista[$i];
                  $cod = $v->getCodigoVeg();
                  $nom = $v->getNombreVeg();
                  echo "<p>";
                  echo "<label>";
                  echo "<input type='checkbox' name='OpVeg$i' value='$nom' class='filled-in'/>";
                  echo "<span name='OpVeg' style='color: black;' value='$cod'>$nom</span>";
                  echo "</label>";
                  echo "</p>";
                }
              ?>
          </td>


            <td colspan="1" style="background: #CAF3C4;">
              <div class="row">
                <h6>Salsas</h6>
              </div>

              <?php
                  $lista = $d->CheckSalsas();
                  //print_r($lista);
                  for($i=0; $i < count($lista); $i++){
                    $s = $lista[$i];
                    $cod = $s->getCodigoSal();
                    $nom = $s->getNombreSal();
                    echo "<p>";
                    echo "<label>";
                    echo "<input type='checkbox' name='OpSal$i' value='$nom' class='filled-in'/>";
                    echo "<span value='$cod' style='color: black;'>$nom</span>";
                    echo "</label>";
                    echo "</p>";
                  }
                ?>
            </td>


          <td colspan="2">
              <h6>Bebidas <h6 class="Texto">En caso de no querer seleccione "ninguno"</h6></h6>
              <select class="browser-default" name="CboBeb">
              <?php

                $lista = $d->ComboBebida();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                $b = $lista[$i];
                $cod = $b->getCodigoBeb();
                $nom = $b->getNombreBeb();
                echo "<option value='$nom'>$nom</option>";
                }
              ?>
              </select>

              <h6>Aguas <h6 class="Texto">En caso de no querer seleccione "ninguno"</h6></h6>
              <select class="browser-default" name="CboAgu">
                <?php

                $lista = $d->ComboAgua();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                $a = $lista[$i];
                $cod = $a->getCodigoAgu();
                $nom = $a->getNombreAgu();
                echo "<option value='$nom'>$nom</option>";
                }
              ?>
              </select>

              <h6>Jugos <h6 class="Texto">En caso de no querer seleccione "ninguno"</h6></h6>
              <select class="browser-default" name="CboJug">
                <?php

                $lista = $d->ComboJugo();
                //print_r($lista);
                for($i=0; $i < count($lista); $i++){
                $j = $lista[$i];
                $cod = $j->getCodigoJug();
                $nom = $j->getNombreJug();
                echo "<option value='$nom'>$nom</option>";
                }
              ?>
              </select>
          </td>


        </tr>

        <tr>
          <td colspan="1">
            <input type="submit" name="btn_agregarGen" value="Agregar al carrito" onclick="return ConfirmAdd()" style="color:black; padding: 15px; background: #5ACD57; border: none; border-radius: 5px; cursor: pointer;"  style="text-decoration-color: #FFFFFF; text-transform:uppercase;">
          </td>

          <td>
            <?php $boton="disabled";
            if(isset($_POST["btn_agregarGen"])){
                $boton="";
            }?>
            <a class="btn waves-effect waves-light <?php echo $boton; ?>" href="Pago.php" name="btn_pagar" onclick="return ConfirmSave()">Pagar
                <i class="material-icons right">attach_money</i>
            </a>
          </td>
          <td>
            <button class="btn waves-effect red darken-2" type="reset" name="btn_cancelar" onclick="return ConfirmReset()">Cancelar
              <i class="material-icons right">clear</i>
          </button>
          </td>

        </tr>

      </table>

      <br>
      <table  style="background: #94D29E; width: 90%; margin: auto; border: solid 2px white; padding: 5px;">
        <tr>
          <td colspan="12"></td>
          <h4 align="center" style="background: #B8DCAB; width: 50%; margin: auto; margin-top: 10px;">Carrito de Compras</h4>
        </tr>
        <tr>
          <th>Codigo</th>
          <th>Tamaño</th>
          <th>Sandwich</th>
          <th>Pan</th>
          <th>Queso</th>
          <th>Extra</th>
          <th>Vegetale</th>
          <th>Salsa</th>
          <th>Bebida</th>
          <th>Aguas</th>
          <th>Jugos</th>
          <th>Eliminar</th>
        </tr>
        <tr>
          <?php
            $lista = $d->ListarCompra($_SESSION["Usuario"]);
            if (empty($lista)) {
             
            }
            for ($i=0; $i < count($lista) ; $i++) {
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
                echo "<td> <a href='formularioPedido.php?cod_eli=". $c->getCodigoCom() ."' style='color: #FE3E3E' onclick='return ConfirmDelete()'>Eliminar del Carrito</a></td>";
              echo "</tr>";
            }
          ?>
        </tr>
      </table>
      <table style="background: #94D29E; width: 90%; margin: auto; border: solid 2px white; padding: 5px;">
        <tr>
          <td colspan="12"></td>
          <h4 align="center" style="background: #B8DCAB; width: 50%; margin: auto; margin-top: 10px;" >Historial de Compras</h4>
        </tr>
        <tr>
          <th>Codigo</th>
          <th>Tamaño</th>
          <th>Sandwich</th>
          <th>Pan</th>
          <th>Queso</th>
          <th>Extra</th>
          <th>Vegetale</th>
          <th>Salsa</th>
          <th>Bebida</th>
          <th>Aguas</th>
          <th>Jugos</th>
        </tr>
        <tr>
          <?php
            $lista = $d->ListarHistorial($_SESSION["Usuario"]);
            for ($i=0; $i < count($lista) ; $i++) {
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
              echo "</tr>";
            }
          ?>
        </tr>
      </table>


    </form>


  </body>
</html>
