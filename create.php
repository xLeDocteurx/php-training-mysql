<?php
  require('funk.php');

  include './parts/header.php';

	if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])) {

		// vérification des champs, try catch avec des throw new exeptions dans les else des vérifications.
		try {
			// if (strlen($_POST['name']) <= 1) { throw new Exception('Le champ "Nom" de la randonné n\'a pas été correctement remplis'); }

			echo($_POST['name']);
			echo($_POST['difficulty']);
			echo($_POST['distance']);
			echo($_POST['duration']);
			echo($_POST['height_difference']);
			echo('<br>Available : '.$_POST['available']);


			db_create($_POST['name'],$_POST['difficulty'],$_POST['distance'],$_POST['duration'],$_POST['height_difference'],$_POST['available']);
		} catch (Exception $e) {
			print('! // ERREUR : '.$e);
		}
		// finally {
		// 	header('location: ./read.php');
		// }
	}

?>
	<h1>Ajouter</h1>
	<form action="./create.php" method="post">
		<div>
			<label for="name">Nom</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Praticable</label>
			<input type="checkbox" name="available" value="true">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

<?php include './parts/footer.php' ?>
