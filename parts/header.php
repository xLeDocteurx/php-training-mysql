<?php
session_start();

if (isset($_SESSION['user'])) {
    $user_username = $_SESSION['user']['username'];
    $user_avatar = $_SESSION['user']['avatar'];
    $user_id = $_SESSION['user']['id'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Randonnées. Le plaisir de l'été.</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">


    <link rel="stylesheet" type="text/css" href="./semantic/components/reset.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/site.css">

    <link rel="stylesheet" type="text/css" href="./semantic/components/container.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/grid.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/header.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/image.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/menu.css">

    <link rel="stylesheet" type="text/css" href="./semantic/components/divider.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/segment.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/form.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/input.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/button.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/list.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/message.css">
    <link rel="stylesheet" type="text/css" href="./semantic/components/icon.css">

    <link rel="stylesheet" href="semantic/semantic.css">
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    

  </head>


  <body>

    <div class="ui fixed inverted menu">
    <!-- <div class="ui inverted menu"> -->
        <div class="ui container">
            <a href="./" class="header item">
            <!-- <img class="logo" src="images/autop.jpg"> -->
            La Rando c'est rigolo !
            </a>
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="./read.php" class="item">Liste des randos</a>
                <a href="./create.php" class="item">Créer une rando</a>
            <?php } ?>
            <div class="autoleft ui simple dropdown item">
            <?php
                if (!isset($_SESSION['user'])) {
                    echo("Authentification");
                } else {
                    echo('<a href="./user?id='.$user_id.'"><img class="header_avatar" src="'.$user_avatar.'">'.$user_username.'</a>');
                }
            ?> 
            <i class="dropdown icon"></i>
            <div class="menu">
            <?php if (!isset($_SESSION['user'])) { ?>
                <a href="./connect.php" class="item">Connection</a>
                <a href="./register.php" class="item">Enregistrement</a>
            <?php } else { ?>
                <a href="./user.php?id=<?php echo($_SESSION['user']['id']) ?>" class="item">Profil</a>
                <a href="./disconnect.php" class="item">Déconnection</a>
            <?php } ?>
                <!-- <div class="divider"></div>
                <div class="header">Header Item</div> -->
            </div>
            </div>
        </div>
    </div>