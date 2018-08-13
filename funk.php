<?php

function db_connect () {
    try {
        $pdo = new PDO('mysql:host=den1.mysql2.gear.host;dbname=hikin','hikin','Cw7eCnF0-!6G');
        return $pdo;
        // $pdo = null;
    } catch (Exception $e) {
        print ('ERREUR : '. $e);
        die();
        $pdo = null;
    }
}

function db_close () {
    die();
    $pdo = null;
}

function db_returnOne($id) {
    $pdo = db_connect();
    $req = $pdo->query('SELECT * FROM hikin.hiking WHERE id = '.$id);
    $result = $req->fetch();
    return $result;
}

function db_readOne($id) {
    $pdo = db_connect();
    $req = $pdo->query('SELECT * FROM hikin.hiking WHERE id = '.$id);
    $result = $req->fetch();
    $this_rando = $result;
        ?>
        
<div class="ui middle aligned center aligned grid">
	<div class="column">
		<h2 class="ui teal image header">
		<!-- <img src="./images/favicon.png" class="image"> -->
		<div class="content">
            <?php echo($this_rando['name']) ?>
		</div>
		</h2>
		<form action="update.php?id=<?php echo($id); ?>" method="post" class="ui large form">
		<div class="ui stacked segment">
			<div class="field">
                Difficulté : <?php echo($this_rando['difficulty']) ?>
			</div>
			<div class="field">
                Distance : <?php echo($this_rando['distance']) ?>
			</div>
			<div class="field">
                Durée : <?php echo($this_rando['duration']) ?>
			</div>
			<div class="field">
                Différence : <?php echo($this_rando['height_difference']) ?>
			</div>
			<div class="field">
					<label for="available">Praticable</label>
					<input type="checkbox" name="available" value="true" <?php if($this_rando['available']) { echo("checked"); } ?> disabled>
			</div>

            <?php
                if ($_SESSION['user']) {
                    ?>
                        <button type="button" class="ui large brown submit button" name="button" onclick="window.location.href = './update.php?id=<?php echo($_GET['id']) ?>'">Modifier</button>
                    <?php
                }
            ?>
			<!-- <button type="submit" class="ui large teal submit button">Modifier</button type="submit"> -->
			<!-- <button type="button" class="ui large brown submit button" name="button" onclick="window.location.href = './delete.php?id=<?php echo($_GET['id']) ?>'">Supprimer</button> -->
		</div>

		<div class="ui error message">
		</div>

		</form>

		<!-- <div class="ui message">
			New to us? <a href="#">Sign Up</a>
		</div> -->
	</div>
</div>

<?php       
        
}

function db_read () {
    $pdo = db_connect();
    echo('<h1>Liste des randonnées</h1>');
    try {
        echo('<table class="ui celled striped table">');
            echo('<thead>');
                echo('<tr>');
                    echo('<th>'.'Nom'.'</th>');
                    echo('<th>'.'Difficulté'.'</th>');
                    echo('<th>'.'Durée'.'</th>');
                    echo('<th>'.'Distance'.'</th>');
                    echo('<th>'.'Différence'.'</th>');
                echo('</tr>');
            echo('</thead>');
        foreach($pdo->query('SELECT * FROM hikin.hiking') as $row) {
            echo('<tr>');
                echo('<td><a href="./read.php?id='.$row['id'].'">'.$row['name'].'</a>');
                if($row['available']) {
                    echo('<span class="floatright ui green left label non_pract">');
                    echo("Praticable");
                    echo('</span>');
                } else {
                    echo('<span class="floatright ui red left label pract">');
                    echo("Impraticable");
                    echo('</span>');
                }
                echo('</td>');
                echo('<td>'.$row['difficulty'].'</td>');
                echo('<td>'.$row['duration'].'</td>');
                echo('<td>'.$row['distance'].'</td>');
                echo('<td>'.$row['height_difference'].'</td>');
            echo('</tr>');
        }
        echo('</table>');
    } catch (Exception $e) {
        print ('ERREUR : '. $e);
    }
}

function db_create($name,$difficulty,$distance,$duration,$height_difference,$available) {

}

function db_update($id,$name,$difficulty,$distance,$duration,$height_difference,$available) {

}

function db_delete ($id) {
    $pdo = db_connect();
    try {
        // $pdo->query('DELETE hiking WHERE id = '.$id);
        $pdo->exec("DELETE FROM hikin.hiking WHERE id = $id");
		// $delete->execute();
        // print_r($delete);
    } catch (Exception $e) {
        print ('ERREUR : '. $e);
    }
}

?>