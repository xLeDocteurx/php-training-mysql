<?php
  require('funk.php');
  include './parts/header.php';

    $message = "";
    $result = "lol";

    if (isset($_POST['email']) && isset($_POST['password'])) {
        try {
            $pdo = new PDO('mysql:host=den1.mysql2.gear.host;dbname=hikin','hikin','Cw7eCnF0-!6G');
            $req = $pdo->query("SELECT * FROM users WHERE email = '".$_POST['email']."' AND password = '".sha1($_POST['password'])."'");
            $result = $req->fetch();
            $req_username = $result['username'];
            $req_avatar = $result['avatar'];
            $req_id = $result['id'];

            if ($result) {
                // $_SESSION['user'] = "LOL";
                $sess = ['username' => $req_username, 'avatar' => $req_avatar, 'id' => $req_id];
                $_SESSION['user'] = $sess;
                ?><script>alert("Connection réussie !");</script><?php
            } else {
                unset($_SESSION["user"]);
                ?><script>alert("Nom d'utilisateur ou mot de passe éronné !");</script><?php
            }
        } catch (Exception $e) {
            echo(' // ERREUR : '.$e);
        } 
		finally {
			header('location: ./user.php?id='.$req_id);
		}
    }
?>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
            <img src="./images/favicon.png" class="image">
            <div class="content">
                Connection
            </div>
            </h2>
            <form action="./connect.php" method="post" class="ui large form">
            <div class="ui stacked segment">
                <div class="field">
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" placeholder="E-mail address">
                </div>
                </div>
                <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                </div>
                <button type="submit" class="ui fluid large teal submit button">Login</button type="submit">
            </div>

            <div class="ui error message">
            </div>

            </form>

            <!-- <div class="ui message">
                New to us? <a href="#">Sign Up</a>
            </div> -->
        </div>
    </div>

<?php include './parts/footer.php' ?>