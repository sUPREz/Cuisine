  <?php
  //*
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
  $t = new Textile();

  //*/
  ?>
<script language="JavaScript" type="text/javascript">
var recette_id = "<?php echo $_REQUEST['id'] ?>";
$(function() {
  var defaultEditable = {
      loadurl   : "php_ajax/load.php",
      loaddata  : { renderer : "" , type : "recettes" },
      event     : "dblclick",
      type      : "textarea",
      submit    : "Valider",
      cancel    : "Annuler",
      tooltip   : "Double-clic pour modifier...",
      placeholder: "Double-clic pour modifier...",
      onblur    : 'ignore'

  };

  $('ul.tags').tagit( { initialTags:<?php echo json_encode($tags_in_recette) ?> ,
                        tagSource:<?php echo json_encode($tags) ?> ,
                        allowNewTags:true ,
                        triggerKeys: ['enter'],
                        tagsChanged:function(tagValue, action, element){
    console.log('tag result : ' , tagValue, action, element , recette_id);
    $.ajax({
      url : 'php_ajax/save.php?type=tags_in_recettes',
      data : { recette_id: recette_id ,
               tag: tagValue ,
               action: action,
             },
      success: function(result) {
        console.log( 'tag Ajax result : ' , result );
      }
    })
  } } );

  $.ajaxSetup({
      type : "GET",
      async : false,
  });

  $("div.nom div.editable").editable("php_ajax/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "nom",
      height    : 15,
      loaddata  : { name: "nom" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
  $("div.ingredients div.editable").editable("php_ajax/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "ingredients",
      height    : 'auto',
      loaddata  : { name: "ingredients" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
  $("div.notes div.editable").editable("php_ajax/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "notes",
      height    : 'auto',
      loaddata  : { name: "notes" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
  $("div.recette div.editable").editable("php_ajax/save.php?type="+defaultEditable['loaddata']['type'],$.extend(defaultEditable,{
      name      : "instructions",
      height    : 'auto',
      loaddata  : { name: "instructions" ,
                    type: defaultEditable['loaddata']['type']
                  },
  }));
});

</script>
    <div class="nom">
      <div class="editable" id="<?php echo $_REQUEST['id'] ?>">
        <?php
        echo $t->TextileThis(stripslashes( html_entity_decode($recette['nom']) ));
        ?>
      </div>
    </div>
    <div class="image" style="background-image: url('<?php if( is_file('imgs_recettes/'.$_REQUEST['id'].'.jpg') ) echo 'imgs_recettes/'.$_REQUEST['id'].'.jpg'; else echo 'imgs_recettes/empty.jpg'; ?>')"></div>
    <div class="left">
      <div class="ingredients">
        <div class="title">Ingr&eacute;dients</div>
        <div class="editable" id="<?php echo $_REQUEST['id'] ?>">
          <?php
          echo $t->TextileThis(stripslashes( ($recette['ingredients']) ));
          ?>
        </div>
        <!--
        blabla
        <ul>
          <li>Ingr&eacute;er ze znt 1</li>
          <li>Ingr&eacute;dieaze zernt 2</li>
          <li>Ingr&eacute;dient 3</li>
          <li>Ingr&eacute;dient 4</li>
        </ul>
        <ul>
          <li>Ingr&eacute;dien zerz rt 5</li>
        </ul>
        !-->
      </div>
      <div class="tags">
        <div class="title">Mots-Cl&eacute;s</div>
        <ul class="tags">
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
      <div class="recette">
        <div class="title">Recette</div>
        <div class="editable" id="<?php echo $_REQUEST['id'] ?>">
          <?php
            echo $t->TextileThis(stripslashes( html_entity_decode( replaceLinks($recette['instructions']) ) ) );
          ?>
        </div>
        <!--
        <ul>
          <li>Tag1</li>
          <li>Tag2</li>
          <li>Tag3</li>
          <li>Tag4</li>
          <li>Tag5</li>
        </ul>
        !-->
      </div>
      <div class="notes">
        <div class="title">Notes</div>
        <div class="editable" id="<?php echo $_REQUEST['id'] ?>">
          <?php
            echo $t->TextileThis(stripslashes( html_entity_decode( replaceLinks($recette['notes']) ) ) );
          ?>
        </div>
        <!--
        <ul>
          <li>Tag1</li>
          <li>Tag2</li>
          <li>Tag3</li>
          <li>Tag4</li>
          <li>Tag5</li>
        </ul>
        !-->
      </div>
    </div>