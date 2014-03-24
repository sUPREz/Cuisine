  <?php
  //require_once 'php/db.php';
  if( $_REQUEST['id'] == "new" ) {
    $query = "INSERT INTO  `recettes` (`id` ,`nom` ,`instructions` ,`ingredients` ,`notes`)
              VALUES (NULL ,  '', NULL , NULL , NULL);";
    $result = $dbh->query($query);
    $recette = $result->fetch(PDO::FETCH_ASSOC);
    $_REQUEST['id'] = $dbh->lastInsertId();
    $tags_in_recette = array();
  }
  else
  {
    $query = "SELECT * from recettes where `id`=".$_REQUEST['id'];
    $result = $dbh->query( $query );
    $recette = $result->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT `tag` from `tags_in_recettes` where `recette_id`=".$_REQUEST['id'];
    $result = $dbh->query( $query );
    $tags_in_recette = array();
    while( $tag = $result->fetch(PDO::FETCH_ASSOC) ){
      $tags_in_recette[] = $tag['tag'];
    }
  }
  //print_r ($tags_in_recette);
  //if( empty($tags_in_recette) )
  //  $tags_in_recette = "";

  $query = "SELECT `tag` from `tags`";
  $result = $dbh->query( $query );
  $tags = array();
  while( $tag = $result->fetch(PDO::FETCH_ASSOC) ){
    $tags[] = html_entity_decode($tag['tag'] , ENT_COMPAT , 'UTF-8' );
  }
  //print_r ($tags);
  //json_encode($tags);
  require_once 'php/Textile.php';
  $t = new Textile();
  ?>
<script language="JavaScript" type="text/javascript">
var recette_id = "<?php echo $_REQUEST['id'] ?>";
$(function() {
  var defaultEditable = {
      loadurl   : "php/load.php",
      loaddata  : { renderer : "" , type : "recettes" },
      event     : "dblclick",
      type      : "textarea",
      submit    : "Valider",
      cancel    : "Annuler",
      tooltip   : "Double-clic pour modifier...",
      placeholder: "Double-clic pour modifier...",
      onblur    : 'ignore'

  };

  $.ajaxSetup({
      type : "GET",
      async : false,
  });

  $('ul.tags').tagit( { initialTags:<?php echo json_encode($tags_in_recette) ?> ,
                        tagSource:<?php echo json_encode($tags) ?> ,
                        allowNewTags:true ,
                        triggerKeys: ['enter'],
                        tagsChanged:function(tagValue, action, element){
    console.log('tag result : ' , tagValue, action, element , recette_id);
    $.ajax({
      url : 'php/save.php?type=tags_in_recettes',
      data : { recette_id: recette_id ,
               tag: tagValue ,
               action: action,
             },
      success: function(result) {
        console.log( 'tag Ajax result : ' , result );
      }
    })
  } } );

  $(".editable.nom").editable("php/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "nom",
      loaddata  : { name: "nom" ,
                    type: defaultEditable['loaddata']['type'] ,

                  },
  }));
  $(".editable.ingredients").editable("php/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "ingredients",
      loaddata  : { name: "ingredients" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
  $(".editable.notes").editable("php/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "notes",
      loaddata  : { name: "notes" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
  $(".editable.instructions").editable("php/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "instructions",
      loaddata  : { name: "instructions" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
});

</script>
<style>
ul, p{
margin-top: 0px;
margin-bottom: 0px;
}
p{
  min-height: 10px;
}

h4, h3, h2, h1{
  margin-top: 25px;
  margin-bottom: 10px;

}



</style>
  <div style="position: absolute; border: solid black 0px; width:1018px; padding:0px;">
    <fieldset class="nom">
      <legend>Nom</legend>
      <div style="font-size: 80px;text-align: center;margin-top: -12px;" class="editable nom" id="<?php echo $_REQUEST['id'] ?>"><?php echo $t->TextileThis(stripslashes( html_entity_decode($recette['nom']) )); ?></div>
    </fieldset>
    <fieldset style="float: right; width: 690px;" class="instructions">
      <legend>Recette</legend>
      <div class="editable instructions" id="<?php echo $_REQUEST['id'] ?>">
        <?php
          $text = $t->TextileThis(stripslashes( html_entity_decode( replaceLinks($recette['instructions']) ) ) );
          echo $text;
        ?>
      </div>
      <!--
      <ul>
        <li>Faire cuire la viande</li>
        <li>Hacher la viande puis la mettre de côté</li>
        <li>Raper les carrotes</li>
        <li>Cuire les chapignons puis les hacher grossièrement</li>
        <li>Cuire les vermicelles puis bien les couper</li>
        <li>Mélanger la viande, les carottes, les chapignons, les vermicelles et le jus de citron</li>
        <li>Rouler les nems et "coller" les bords avec de l'eau ou de l'oeuf</li>
        <li>Faire frire les nems 5 minutes dans l'huile</li>
        <li>Mettre les nems sur du sopalin</li>
        <li>Garder les nems chaud au four à 80°c avant de les apporter à table</li>
        <li>C'est pret !</li>
      </ul>
      !-->
    </fieldset>
    <fieldset style="float: right; width: 690px;" class="notes">
      <legend>Notes</legend>
      <div class="editable notes" id="<?php echo $_REQUEST['id'] ?>">
      <?php echo $t->TextileThis(stripslashes( html_entity_decode( replaceLinks($recette['notes']) ) ) ) ; ?>
      </div>
      <!--
      <ul>
        <li>C'est délicieux !</li>
        <li>Marche avec Surimi, côte de porc, filet de dinge.</li>
      </ul>
      !-->
    </fieldset>
    <div>
    <fieldset style="width: 250px;" class="ingredients">
      <legend>Ingrédients</legend>
      <div class="editable ingredients" id="<?php echo $_REQUEST['id'] ?>"><?php echo $t->TextileThis(stripslashes( ($recette['ingredients']) )); ?></div>
      <!--
      48 Nems
      <ul>
        <li>600g de viande</li>
        <li>100g de carotte</li>
        <li>25g de champignons noirs</li>
        <li>50g de vermicelle de soja</li>
        <li>1 Citron</li>
        <li>48 feuilles de brick</li>
      </ul>
      !-->
    </fieldset>
    <fieldset style="width: 250px;" class="tags">
      <legend>Mots-Clés</legend>
      <div class="tags box">
        <ul class="tags box" id="<?php echo $_REQUEST['id'] ?>" tags="<?php echo str_replace('"',"'",json_encode($tags_in_recette)) ?>"></ul>
      </div>
      <!--
      <ul>
        <li>C'est délicieux !</li>
        <li>Marche avec Surimi, côte de porc, filet de dinge.</li>
      </ul>
      !-->
    </fieldset>
    </div>
  </div>