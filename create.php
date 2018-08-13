<?php
  require('funk.php');

  include './parts/header.php';

	if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])) {

		try {
			$pdo = new PDO('mysql:host=den1.mysql2.gear.host;dbname=hikin','hikin','Cw7eCnF0-!6G');
			$create = $pdo->prepare("INSERT INTO hikin.hiking (name, difficulty, distance, duration, height_difference, available) VALUES ('".$_POST['name']."','".$_POST['difficulty']."',".$_POST['distance'].",'".$_POST['duration']."',".$_POST['height_difference'].",'".$_POST['available']."');");
			$create->execute();
			print_r ($create);
		} catch (Exception $e) {
			print ('ERREUR : '. $e);
		}
		finally {
			header('location: ./read.php');
		}
	} else { ?>

		<div class="ui middle aligned center aligned grid">
			<div class="column">
				<h2 class="ui teal image header">
				<!-- <img src="./images/favicon.png" class="image"> -->
				<div class="content">
					Ajouter une rando
				</div>
				</h2>
				<form action="./create.php" method="post" class="ui large form">
				<div class="ui stacked segment">
					<div class="field">
					<div class="ui left icon input">
						<!-- <i class="mail icon"></i> -->
							<input type="text" name="name" value="" placeholder="Nom de la rando">
					</div>
					</div>
					<div class="field">
					<div class="ui left icon input">
							<select name="difficulty">
    							<option value="">--Difficulté--</option>
								<option value="très facile">Très facile</option>
								<option value="facile">Facile</option>
								<option value="moyen">Moyen</option>
								<option value="difficile">Difficile</option>
								<option value="très difficile">Très difficile</option>
							</select>
					</div>
					</div>
					<div class="field">
					<div class="ui left icon input">
						<!-- <i class="mail icon"></i> -->
							<input type="text" name="distance" value="" placeholder="Distance">
					</div>
					</div>
					<div class="field">
					<div class="ui left icon input">
						<!-- <i class="mail icon"></i> -->
							<input type="duration" name="duration" value="" placeholder="Durée">
					</div>
					</div>
					<div class="field">
					<div class="ui left icon input">
						<!-- <i class="mail icon"></i> -->
							<input type="text" name="height_difference" value="" placeholder="Dénivelé">
					</div>
					</div>
					<div class="field">
					<div class="ui left icon input">
						<!-- <i class="mail icon"></i> -->
							<label for="available">Praticable</label>
							<input type="checkbox" name="available" value="true">
					</div>
					</div>
					<button type="submit" class="ui fluid large teal submit button">Créer</button type="submit">
				</div>
	
				<div class="ui error message">
				</div>
	
				</form>
	
				<!-- <div class="ui message">
					New to us? <a href="#">Sign Up</a>
				</div> -->
			</div>
		</div>

<?php	} ?>


<?php include './parts/footer.php' ?>
