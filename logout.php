<?php 
  include("includes/config.php");
  include("includes/classes/auth.php");
  include("includes/classes/db.php");
  include("includes/functions.php");
  include("includes/classes/accounts.php");
  $auth->logout();
  header('Location: index.php');	
?>