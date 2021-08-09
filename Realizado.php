<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagar</title>
    <link rel="stylesheet" href="Estilos/Estilo.css">
  </head>

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

  <body style="background: url(imagenes/fondo.jpg);">

    <center>
          <br>
    <br>
    <br>
    <br>
      <table>
        <tr>
          <td><label class="Exito" id="titulo" style="color: #FEFB3E">Su pedido se ha finalizado con exito</label></td>
        </tr>
        <tr>
          <td class="Boton">
            <a href="formularioPedido.php" class="Boton">Seguir Comprando</a>
          </td>
        </tr>
      </table>
      <form action="cerrarSesion.php" method="get" id="fm_cerrar">
    <input type="submit" name="btn_cerr" value="Cerrar Sesion" onclick="return ConfirmExit()" class="Boton" style='width: 20%; height: 40px; border:none; color:#fff; background-color:#7cb342; cursor: pointer;'>
    </form>
    </center>
  </body>
</html>
