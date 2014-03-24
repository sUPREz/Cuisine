
  <?php
  $_REQUEST['id'] = urldecode($_REQUEST['id']);
  ?>
  <div style="position: absolute; border: solid black 0px; width:1018px; padding:0px;">
    <fieldset class="nom">
      <legend>Mot-Clé</legend>
      <div style="font-size: 80px;text-align: center;margin-top: -12px;"><?php echo $_REQUEST['id'] ?></div>
    </fieldset>
    <fieldset class="">
      <legend>Recettes</legend>
      <ul>
      <?php
      $query = 'SELECT `recettes`.`nom`,`recettes`.`id` FROM
                     `recettes` , `tags_in_recettes`
                     WHERE `tags_in_recettes`.`tag`="'.$_REQUEST['id'].'"
                     AND `recettes`.`id` = `tags_in_recettes`.`recette_id`';

      $result = $dbh->query( $query );
      while( $recette = $result->fetch(PDO::FETCH_ASSOC) ){
        echo '<li><a href="?area=recette&id='.$recette['id'].'">'.$recette['nom'].'</a></li>';
      }
      ?>
      </ul>
    </fieldset>
  </div>