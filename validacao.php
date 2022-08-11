<?php
  include ("config.php");
  if (!isset($_SESSION['email'])) {
      header("Location: index.php"); 
  }

  ?>