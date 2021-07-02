<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["login_type"]);
   unset($_SESSION["nID"]);
   
   //echo 'You have cleaned session';
   header('location:login.php');
?>