<?php
  require('funk.php');
  include './parts/header.php';

//   if ($_SESSION['user']) {
//     $user_username = $_SESSION['user']['username'];
//     $user_avatar = $_SESSION['user']['avatar'];
//     $user_id = $_SESSION['user']['id'];
// }
$user_idid = $_GET['id'];
  $pdo = new PDO('mysql:host=den1.mysql2.gear.host;dbname=hikin','hikin','Cw7eCnF0-!6G');
  $req = $pdo->query("SELECT * FROM users WHERE id = '".$user_idid."'");
  $result = $req->fetch();


?>

<div class="ui middle aligned center aligned grid">
	<div class="column">
		<h2 class="ui teal image header">
		<!-- <img src="./images/favicon.png" class="image"> -->
		<div class="content">
            <?php echo($result['username']) ?>
		</div>
		</h2>
		<div class="ui stacked segment">
			<div class="field">
              <?php echo("<img class=\"profile_avatar\" src=\"".$result['avatar']."\"><br>") ?>
			</div>
			<div class="field">
              E-mail : <?php echo($result['email']) ?>
			</div>
		</div>
	</div>
</div>

<?php include './parts/footer.php' ?>