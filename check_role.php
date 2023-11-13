<?php
session_start();
include_once("constants.php");
// Check if the user is an administrator
if (!isset($_SESSION['id_rol'])) {
  if($_SESSION['id_rol'] != ADMINISTRADOR) {
    header("Location: index.php"); // Redirect non-administrator users to restricted page
    exit();
  }
  if($_SESSION['id_rol'] != CAJERO) {
    header("Location: index.php"); // Redirect non-administrator users to restricted page
    exit();
  }
}


?>