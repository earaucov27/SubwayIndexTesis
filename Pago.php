<?php
session_start();
if(isset($_SESSION['Usuario']) == false){
  header("location: Logeo.php?error=1");
}
?>
<html lang="en" dir="ltr">
  <head>
    <head>
      <link rel="stylesheet" href="Estilos/Estilo.css">
      <!-- Iconos Materialize-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <!-- Libreria Jquery-->
      <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

      <meta charset="utf-8">
      <title>Formulario de Pedido</title>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
      });
      </script>

      
  </head>

<script type="text/javascript">
    function ConfirmPago(){
      var res = confirm("¿Desea FINALIZAR el PAGO?");
      if (res == true) {
        return true;
      }else{
        return false;
      }
    }
  </script>

<script type="text/javascript">
    function ConfirmCancel(){
      var res = confirm("¿Esta seguro/a que desea CANCELAR el PAGO?");
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

  <body style="width: 90%; margin: auto;">
    <?php
      require 'Clases/DAO.php';
      $d = new DAO();
      ?>
      <script type='text/javascript'>
      function disableButtons()
      {
        $('input[type="submit"]').attr('disabled', true);
      }
      </script>
      <form action="cerrarSesion.php" method="get" id="fm_cerrar" onsubmit='disableButtons()'>
      <input type="submit" name="btn_cerr" value="Cerrar Sesion" onclick="return ConfirmExit()" style='width: 100%; height: 40px; border:none; color:#fff; background-color:#7cb342;'>
      </form>
    <form class="" action="Pago.php" method="post">
      <table border="1">
        <tr>
          <td><h5><i>Pago y medio de despacho</i></h5></td>
        </tr>
        <tr>
          <td>
            <table class="striped" style="border: 2px solid gray;">
              <thead>
                <tr>
                    <th>Costo</th>
                    <th>Cantidad</th>
                    <th>Subtotal a pagar</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>$4.590</td>
                  <td>1</td>
                  <td>$4.590</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td><h6><i>Total a pagar: <label>$4.590</label></i></h6></td>
        </tr>
      </table>

      <br>

      <table border="1">
        <tr>
          <td><h5>Paso 1: <i>Medio de pago</i></h5></td>
        </tr>
        <tr>

          <table>
            <tr>
              <td><h6>Targeta de Crédito</h6></td>
              <td><h6>Targeta de Débito</h6></td>
              <td><h6>Medio de despacho</h6></td>
            </tr>
            <tr>
              <td>
                <p>
                  <label>
                    <input name="group1" type="radio" checked />
                    <span><img src="Imagenes/visa.jpeg" alt="" class="ImagenPago"></span>
                  </label>
                </p>
                <br>
                <p>
                  <label>
                    <input name="group1" type="radio" />
                    <span><img src="Imagenes/redcompra.png" alt="" class="ImagenPago"></span>
                  </label>
                </p>
              </td>
              <td>
                <p>
                  <label>
                    <input name="group1" type="radio" />
                    <span><img src="Imagenes/bancoestado.png" alt="" class="ImagenPago"></span>
                  </label>
                </p>
              </td>
              <td>
                <select class="browser-default green lighten-5">
                  <option value="1">Rappi</option>
                  <option value="2">Uber Eats</option>
                  <option value="3">Glovo</option>
                  <option value="4">Pedidos ya</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <form action="Pago.php" method="POST">
                <button class="btn waves-effect waves-light z-depth-3" type="submit" onclick="return ConfirmPago()" name="Btn_Pagar">Pagar
                    <i class="material-icons right">attach_money</i>
                </button>
              </form>
              </td>
              <td>
                <button class="btn waves-effect red darken-2 z-depth-3" type="button" onclick="return ConfirmCancel()" name="action"><a href="formularioPedido.php" class="a">Cancelar</a>
                  <i class="material-icons right">clear</i>
              </button>
              </td>
              <td>
                
              </td>
            </tr>
          </table>

          </tr>
      </table>

       <br>
      <table style="border: 2px solid gray;padding: 20px;">
        <tr>
          <td>Codigo</td>
          <td>Tamaño</td>
          <td>Sandwich</td>
          <td>Pan</td>
          <td>Queso</td>
          <td>Extra</td>
          <td>Vegetales</td>
          <td>Salsa</td>
          <td>Bebida</td>
          <td>Aguas</td>
          <td>Jugos</td>
        </tr>
        <tr>
          <?php
            $lista = $d->ListarCompra($_SESSION["Usuario"]);
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
           


            $CodCom = $c->getCodigoCom();
             if (isset($_POST['Btn_Pagar'])){
                echo "$CodCom";
              $d->ActualizarEstado($CodCom);
              $d->ActualizarHistorial($CodCom);
              $d->ActualizarHistorialAdmin($CodCom);
              

              echo "<script>location.href='Realizado.php#titulo'</script>";

      }
       }

          ?>
        </tr>
      </table>

    </form>
  </body>
</html>
