<?php
  require('funk.php');
  include './parts/header.php';

?>
    <h1></h1>
      <!-- Afficher la liste des randonnées -->
      <?php 
        if (isset($_GET['id'])) {
          db_readOne($_GET['id']);
        } else  {
          db_read();
        }
      ?>


<?php include './parts/footer.php' ?>