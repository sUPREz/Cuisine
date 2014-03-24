<script language="JavaScript" type="text/javascript">
$(function() {
  $(".remove").click(function(){
    var nom = $('a.open#'+$(this).attr('id')).text();
    var x=confirm('Effacer la recette : '+nom+' ?');
    if (x==true){
      $.post('php_ajax/remove.php', {'type':'recette', 'id':$(this).attr('id') } ,function(data){
        console.log( data );
        if(data == 1)
          location.reload();
      });
    } else {
    }
  });
});
</script>
    <?php
    if( isset( $_REQUEST['tag'] ) ){
      $_REQUEST['tag'] = urldecode($_REQUEST['tag']);
      echo replace_allRecettes_tagname( $_REQUEST['tag'] );
    }
    ?>
    <div class="left">
      <div class="tags">
        <div class="title">Mots-Cl&eacute;s</div>
        <ul class="taglist">
        <?php
          $query = "SELECT `tag` from `tags` ORDER BY `tag` asc";
          $result = $dbh->query($query);
          while( $tag = $result->fetch(PDO::FETCH_ASSOC) ){
            echo replace_allRecettes_tags_li( urlencode($tag['tag']) , html_entity_decode($tag['tag']) );
          }
        ?>
        <!--
          <li>Tag1</li>
          <li>Tag2</li>
          <li>Tag3</li>
          <li>Tag4</li>
          <li>Tag5</li>
        !-->
        </ul>
      </div>
    </div>
    <div class="right">
      <div class="recettes">
        <div class="title">Recettes</div>
        <?php
          $previousLetter = '';
          $firstTime = true;
          $lignes = array();
          $divs = '';

          if( isset($_REQUEST['tag']) )
            $query = 'SELECT `recettes`.`nom`,`recettes`.`id` FROM
                     `recettes` , `tags_in_recettes`
                     WHERE `tags_in_recettes`.`tag`="'.$_REQUEST['tag'].'"
                     AND `recettes`.`id` = `tags_in_recettes`.`recette_id`
                     ORDER BY nom asc';
          else
            $query = "SELECT nom,id from recettes ORDER BY nom asc";

          $result = $dbh->query($query);
          //$recette = $result->fetch(PDO::FETCH_ASSOC);
          while( $recette = $result->fetch(PDO::FETCH_ASSOC) ){
            if( $recette['nom'] == "" ){
              $recette['nom'] = "Sans Nom";
              $currentLetter = '#';
            } else {
              $currentLetter = substr( $recette['nom'] , 0 , 1 );
              if( is_numeric( $currentLetter) )
                $currentLetter = '#';
            }

            if( is_file('imgs_recettes/'.$recette['id'].'.jpg') )
              $lignes[$currentLetter] .= replace_allRecettes_li( $recette['id'] , $recette['nom'] , true );
            else
              $lignes[$currentLetter] .= replace_allRecettes_li( $recette['id'] , $recette['nom'] , false );

            if( $currentLetter != $previousLetter && $previousLetter != '' )
              $divs .= replace_allRecettes_letter( $previousLetter , $lignes[$previousLetter] );

            //echo PHP_EOL.'        <li><a class="open" id="'.$recette['id'].'" href="?area=recette&id='.$recette['id'].'">'.($recette['nom']).'</a> - <a class="remove" id="'.$recette['id'].'" href="#">Remove</a></li>';
            $previousLetter = $currentLetter;
            $firstTime = false;
          }
          $divs .= replace_allRecettes_letter( $previousLetter , $lignes[$previousLetter] );
          echo $divs;
        ?>
      </div>
    </div>