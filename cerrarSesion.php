<?php
  session_start();
  unset($_SESSION["Usuario"]); 
  session_destroy();
  header("location: formularioPedido.php");
?>