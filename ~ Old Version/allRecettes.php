<script language="JavaScript" type="text/javascript">
$(function() {
  $(".remove").click(function(){
    //alert( $(this).attr('id') );
    //console.log ( 'a.open#'+$(this).attr('id') );
    //console.log ( $('a.open#'+$(this).attr('id')).text() );
    var nom = $('a.open#'+$(this).attr('id')).text();
    var x=confirm('Effacer la recette : '+nom+' ?');
    if (x==true){
      $.post('php/remove.php', {'type':'recette', 'id':$(this).attr('id') } ,function(data){
        console.log( data );
        if(data == 1)
          location.reload();
      });
    } else {
    }
  });
});
</script>
  <div style="position: absolute; border: solid black 0px; width:1018px; padding:0px;">
    <fieldset>
      <legend style="width:0px;padding:0px;">&nbsp;</legend>
      <div style="font-size: 80px;text-align: center;margin-top: -12px;">Recettes</div>
    </fieldset>
    <fieldset style="float: right; width: 690px;">
      <legend>Recettes</legend>
      <ul>
        <?php
          $previousLetter = '';
          $firstTime = true;
          $query = "SELECT nom,id from recettes ORDER BY nom asc";
          $result = $dbh->query($query);
          while( $recette = $result->fetch(PDO::FETCH_ASSOC) ){
            if( $recette['nom'] == "" ){
              $recette['nom'] = "Sans Nom";
              $currentLetter = '#';
            } else {
              $currentLetter = substr( $recette['nom'] , 0 , 1 );
              if( is_numeric( $currentLetter) )
                $currentLetter = '#';
            }

            if( $firstTime || $currentLetter != $previousLetter )
              echo '<lh>'.strtoupper( $currentLetter ).'</lh>';
            echo PHP_EOL.'        <li><a class="open" id="'.$recette['id'].'" href="?area=recette&id='.$recette['id'].'">'.($recette['nom']).'</a> - <a class="remove" id="'.$recette['id'].'" href="#">Remove</a></li>';
            $previousLetter = $currentLetter;
            $firstTime = false;
          }
        ?>
        <!--
        <li><a href="recette.php?id=1">Nems</a></li>
        !-->

      </ul>
    </fieldset>
    <div>
    <fieldset style="width: 250px;">
      <legend>Mots-Clés</legend>
      <ul class="taglist">
        <?php
          $query = "SELECT `tag` from `tags` ORDER BY `tag` asc";
          $result = $dbh->query($query);
          while( $tag = $result->fetch(PDO::FETCH_ASSOC) ){
            echo PHP_EOL.'        <li class="tag"><a href="?area=tag&id='.urlencode($tag['tag']).'">'.html_entity_decode($tag['tag']).'</a></li>';
          }
        ?>
        <!--
        <li>Nems</li>
        <li>Porc</li>
        !-->
      </ul>
    </fieldset>
    </div>
  </div>
