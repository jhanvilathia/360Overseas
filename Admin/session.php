<?php
  session_start();
  if(!isset($_SESSION['admin_username']) && !isset($_SESSION['admin_password']))
  {
    header("location: login_admin.php");
  }
  


?>