<?php
  require('funk.php');
  include './parts/header.php';

?>

    <h1>Liste des randonnées</h1>
      <!-- Afficher la liste des randonnées -->

      <?php 
        if (isset($_GET['id']) && db_readOne($_GET['id'])) {
          $this_rando = db_readOne($_GET['id']);
          ?><form>
          <div>
            <label for="name">Nom</label>
            <input type="text" name="name" value="<?php echo($this_rando['name']) ?>" disabled>
          </div>
      
          <div>
            <label for="difficulty">Difficulté</label>
            <select name="difficulty" disabled>
              <option value="très facile" <?php if ($this_rando['difficulty'] == 'très facile') { echo ('selected'); } ?>>Très facile</option>
              <option value="facile" <?php if ($this_rando['difficulty'] == 'facile') { echo ('selected'); } ?>>Facile</option>
              <option value="moyen" <?php if ($this_rando['difficulty'] == 'moyen') { echo ('selected'); } ?>>Moyen</option>
              <option value="difficile" <?php if ($this_rando['difficulty'] == 'difficile') { echo ('selected'); } ?>>Difficile</option>
              <option value="très difficile" <?php if ($this_rando['difficulty'] == 'très difficile') { echo ('selected'); } ?>>Très difficile</option>
            </select>
          </div>
          
          <div>
            <label for="distance">Distance</label>
            <input type="text" name="distance" value="<?php echo($this_rando['distance']) ?>" disabled>
          </div>
          <div>
            <label for="duration">Durée</label>
            <input type="duration" name="duration" value="<?php echo($this_rando['duration']) ?>" disabled>
          </div>
          <div>
            <label for="height_difference">Dénivelé</label>
            <input type="text" name="height_difference" value="<?php echo($this_rando['height_difference']) ?>" disabled>
          </div>
          <div>
            <label for="available">Praticable</label>
            <input type="checkbox" name="available" <?php if($this_rando['available'] == 'available') { echo("checked"); } ?> disabled>
          </div>
          <a href="./update.php?id=<?php echo($_GET['id']) ?>">Modifier</a>
          <!-- <a href="./delete.php?id=<?php echo($_GET['id']) ?>">Supprimer</a> -->
        </form><?php
        } else  {
          db_read();
        }
      ?>


<?php include './parts/footer.php' ?>