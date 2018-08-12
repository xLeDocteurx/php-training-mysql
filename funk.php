<?php

function db_connect () {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=reunion_island','root','314100ab');
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

function db_readOne($id) {
    $pdo = db_connect();
    $req = $pdo->query('SELECT * FROM hiking WHERE id = '.$id);
    $result = $req->fetch();
    return $result;
}

function db_read () {
    $pdo = db_connect();
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
        foreach($pdo->query('SELECT * FROM hiking') as $row) {
            echo('<tr>');
                echo('<td><a href="./read.php?id='.$row['id'].'">'.$row['name']);
                if($row['available']) {
                    echo('<span class="ui teal left pointing label">');
                    echo("Praticable");
                    echo('</span>');
                } else {
                    echo('<span class="ui teal left pointing label">');
                    echo("Non praticable");
                    echo('</span>');
                }
                echo('</a></td>');
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

function db_create($name,$difficulty,$distance,$duration,$height,$available) {
    $pdo = db_connect();
    try {

        // $create = $pdo->prepare("INSERT INTO hiking (id,name,difficulty,distance,duration,height_difference,available) VALUES (5,".$name.",".$difficulty.",".$distance.",".$duration.",".$height_difference.",".$available.");");
        // $create = $pdo->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES('".$name."','".$difficulty."',".$distance.",'".$duration."',".$height.",'".$available."')");
        $create = $pdo->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) Values('".$name."','".$difficulty."',".$distance.",'".$duration."',".$height.",'".$available."');");
        // $create->execute();
        if($create->execute()){
			echo "La randonnée a été ajoutée avec succès!";
		} else {
			echo "La randonnée n'a pas été ajoutée !";
		}
        print_r ($create);
    } catch (Exception $e) {
        print ('ERREUR : '. $e);
    }
    
}

function db_update($id,$name,$difficulty,$distance,$duration,$height_difference,$available) {
    $pdo = db_connect();
    try {
        // $pdo->query('UPDATE hiking VALUES '.$name.','.$difficulty.','.$duration.','.$distance.','.$height_difference.';');
        $update = $pdo->prepare("UPDATE hiking SET name = ".$name.", difficulty = ".$difficulty.", distance = ".$distance.", duration = ".$duration.", height_difference = ".$height_difference.", available = ".$available." WHERE id = ".$id);
        $update->execute();
        print_r ($update);
    } catch (Exception $e) {
        print ('ERREUR : '. $e);
    }
}

function db_delete ($id) {
    $pdo = db_connect();
    try {
        // $pdo->query('DELETE hiking WHERE id = '.$id);
        $pdo->exec("DELETE FROM hiking WHERE id = $id");
		// $delete->execute();
        // print_r($delete);
    } catch (Exception $e) {
        print ('ERREUR : '. $e);
    }
}

?>