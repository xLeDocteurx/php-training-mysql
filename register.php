<?php
  require('funk.php');
  include './parts/header.php';

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {

        try {
            $sha1_password = sha1($_POST['password']);

			$pdo = new PDO('mysql:host=den1.mysql2.gear.host;dbname=hikin','hikin','Cw7eCnF0-!6G');
            
            // INSERT INTO `hikin`.`users` (`id`, `username`, `email`, `password`, `avatar`, `confirmed`) VALUES ('2', 'lola', 'lola@lola.com', '0000', '', '1');

            $register = $pdo->prepare("INSERT INTO hikin.users (username, email, password, avatar, confirmed) VALUES ('".$_POST['username']."','".$_POST['email']."','".$sha1_password."','".$_POST['avatar']."', 0);");
            $register->execute();
            
            echo("!!! ENREGISTREMENT SUCCEFULL ???");
            echo("<br>");
			print_r ($register);
		} catch (Exception $e) {
			print ('ERREUR : '. $e);
		}
		// finally {
		// 	header('location: ./user.php');
		// }
    } else { ?>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
            <img src="./images/favicon.png" class="image">
            <div class="content">
                Enregistrement
            </div>
            </h2>
            <form class="ui large form" action="./register.php" method="post">
            <div class="ui stacked segment">
                <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="username" placeholder="Nom d'utilisateur">
                </div>
                </div>
                <div class="field">
                <div class="ui left icon input">
                    <i class="photo icon"></i>
                    <input type="text" name="avatar" placeholder="URL vers votre image de profil">
                </div>
                </div>
                <div class="field">
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" placeholder="Adresse E-mail">
                </div>
                </div>
                <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                </div>
                <button type="submit" class="ui fluid large teal submit button">Soumettre</button>
            </div>

            <div class="ui error message"></div>

            </form>
        </div>
    </div>

<?php } ?>

<?php include './parts/footer.php' ?>