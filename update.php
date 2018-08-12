<?php
  	require('funk.php');
	include './parts/header.php';
	
	$id = $_GET['id'];
	$this_rando = db_readOne($id);

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


			db_update($_GET['id'], $_POST['name'],$_POST['difficulty'],$_POST['distance'],$_POST['duration'],$_POST['height_difference'],$_POST['available']);
		} catch (Exception $e) {
			print('! // ERREUR : '.$e);
		}
		// finally {
		// 	header('location: ./read.php');
		// }
	}

?>
	<h1>Modifier</h1>


	<form action="update.php?id=<?php echo($id); ?>" method="post">
		<div>
			<label for="name">Nom</label>
			<input type="text" name="name" value="<?php echo($this_rando['name']) ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if ($this_rando['difficulty'] == 'très facile') { echo ('selected'); } ?>>Très facile</option>
				<option value="facile" <?php if ($this_rando['difficulty'] == 'facile') { echo ('selected'); } ?>>Facile</option>
				<option value="moyen" <?php if ($this_rando['difficulty'] == 'moyen') { echo ('selected'); } ?>>Moyen</option>
				<option value="difficile" <?php if ($this_rando['difficulty'] == 'difficile') { echo ('selected'); } ?>>Difficile</option>
				<option value="très difficile" <?php if ($this_rando['difficulty'] == 'très difficile') { echo ('selected'); } ?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo($this_rando['distance']) ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo($this_rando['duration']) ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo($this_rando['height_difference']) ?>">
		</div>
		<div>
			<label for="available">Praticable</label>
            <input type="checkbox" name="available" <?php if($this_rando['available']) { echo("checked"); } ?>>
		</div>
		<button type="submit" name="button">Modifier</button>
		<button type="button" name="button" onclick="window.location.href = './delete.php?id=<?php echo($_GET['id']) ?>'">Supprimer</button>
	</form>

<?php include './parts/footer.php' ?>
