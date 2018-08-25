<?php
  	require('funk.php');
	include './parts/header.php';
	
	$id = $_GET['id'];
	$this_rando = db_returnOne($id);

	if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])) {

		// vérification des champs, try catch avec des throw new exeptions dans les else des vérifications.
		try {
			// if (strlen($_POST['name']) <= 1) { throw new Exception('Le champ "Nom" de la randonné n\'a pas été correctement remplis'); }

			// $pdo = new PDO('mysql:host=den1.mysql2.gear.host;dbname=hikin','hikin','Cw7eCnF0-!6G');
        	// $update = $pdo->prepare("UPDATE hikin.hiking SET name ='".$_POST['name']."', difficulty ='".$_POST['difficulty']."', distance ='".$_POST['distance']."', duration ='".$_POST['duration']."', height_difference ='".$_POST['height_difference']."', available ='".$_POST['available']."' WHERE id = ".$id);
			// $update->execute();
			// print_r ($update);
			db_update($id,$_POST['name'],$_POST['difficulty'],$_POST['distance'],$_POST['duration'],$_POST['height_difference'],$_POST['available']);
		} catch (Exception $e) {
			print('! // ERREUR : '.$e);
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
			Modifier une rando
		</div>
		</h2>
		<form action="update.php?id=<?php echo($id); ?>" method="post" class="ui large form">
		<div class="ui stacked segment">
			<div class="field">
			<div class="ui left icon input">
				<!-- <i class="mail icon"></i> -->
					<input type="text" name="name" value="<?php echo($this_rando['name']) ?>" placeholder="Nom de la rando">
			</div>
			</div>
			<div class="field">
			<div class="ui left icon input">
					<select name="difficulty">
						<option value="très facile" <?php if ($this_rando['difficulty'] == 'très facile') { echo ('selected'); } ?>>Très facile</option>
						<option value="facile" <?php if ($this_rando['difficulty'] == 'facile') { echo ('selected'); } ?>>Facile</option>
						<option value="moyen" <?php if ($this_rando['difficulty'] == 'moyen') { echo ('selected'); } ?>>Moyen</option>
						<option value="difficile" <?php if ($this_rando['difficulty'] == 'difficile') { echo ('selected'); } ?>>Difficile</option>
						<option value="très difficile" <?php if ($this_rando['difficulty'] == 'très difficile') { echo ('selected'); } ?>>Très difficile</option>
					</select>
			</div>
			</div>
			<div class="field">
			<div class="ui left icon input">
				<!-- <i class="mail icon"></i> -->
					<input type="text" name="distance" value="<?php echo($this_rando['distance']) ?>" placeholder="Distance">
			</div>
			</div>
			<div class="field">
			<div class="ui left icon input">
				<!-- <i class="mail icon"></i> -->
					<input type="duration" name="duration" value="<?php echo($this_rando['duration']) ?>" placeholder="Durée">
			</div>
			</div>
			<div class="field">
			<div class="ui left icon input">
				<!-- <i class="mail icon"></i> -->
					<input type="text" name="height_difference" value="<?php echo($this_rando['height_difference']) ?>" placeholder="Dénivelé">
			</div>
			</div>
			<div class="field">
			<div class="ui left icon input">
				<!-- <i class="mail icon"></i> -->
					<label for="available">Praticable</label>
					<input type="checkbox" name="available" value="true" <?php if($this_rando['available']) { echo("checked"); } ?>>
			</div>
			</div>
			<button type="submit" class="ui large teal submit button">Modifier</button type="submit">
			<button type="button" class="ui large brown submit button" name="button" onclick="window.location.href = './delete.php?id=<?php echo($_GET['id']) ?>'">Supprimer</button>
		</div>

		<div class="ui error message">
		</div>

		</form>

		<!-- <div class="ui message">
			New to us? <a href="#">Sign Up</a>
		</div> -->
	</div>
</div>

	<?php } ?>

<?php include './parts/footer.php' ?>
