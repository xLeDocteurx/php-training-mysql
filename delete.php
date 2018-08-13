<?php
    require('funk.php');
    include './parts/header.php';
    echo("<br><br>");
      
    /**** Supprimer une randonnée ****/
    $id = $_GET['id'];
    try {
        db_delete($id);
    } catch (Exception $e) {
        print('! // ERREUR : '.$e);
    }
    finally {
    	header('location: ./read.php');
    }
?>
