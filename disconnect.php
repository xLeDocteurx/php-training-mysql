<?php
  require('funk.php');
  include './parts/header.php';

  unset($_SESSION["user"]);
  header("location:read.php");
?>

    <h1>Déconnection</h1>

<?php include './parts/footer.php' ?>