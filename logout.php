<?php 
session_start();

// Destroy the session if it has been initialized
if (isset($_SESSION)) {
  session_destroy();
  header('Location:login.php');
}
?>