<?php
//*/
//print_r ($_REQUEST);
require_once '../php_config/config.php';
require_once '../php_lib/Textile.php';
switch( $_REQUEST['type'] ){
  case 'tags_in_recettes':
    //print_r ($_REQUEST);
    // Check if tag is new
    switch( $_REQUEST['action'] ){
      case 'popped':
        $query = 'DELETE from `tags_in_recettes`
                  WHERE `tag`="'.$_REQUEST['tag'].'"
                  AND `recette_id`='.$_REQUEST['recette_id'];
        $dbh->exec( $query );


        $query = 'SELECT `tag`
                  FROM `tags_in_recettes`
                  WHERE `tag`="'.$_REQUEST['tag'].'"';
        $result = $dbh->query( $query );
        $nombre = $result->rowCount();
        //print_r ($nombre);
        if( $nombre == 0 ){
          //$_REQUEST['tag'] = ucfirst(strtolower($_REQUEST['tag']));
          $query = 'DELETE from `tags`
                    WHERE `tag`="'.$_REQUEST['tag'].'"';
          $result = $dbh->query( $query );
        }

        break;
      case 'added':
        $_REQUEST['tag'] = ucfirst(strtolower(htmlentities( stripslashes($_REQUEST['tag']) , ENT_COMPAT, 'UTF-8' )));
        $query = 'SELECT `tag`
                  FROM `tags`
                  WHERE `tag`="'.$_REQUEST['tag'].'"';
        $result = $dbh->query( $query );
        $nombre = $result->rowCount();
        //print_r ($nombre);
        if( $nombre == 0 ){
          $query = 'INSERT INTO  `tags` (`tag`)
                    VALUES ("'.$_REQUEST['tag'].'");';
          $result = $dbh->query( $query );
        }

        $query = 'INSERT INTO `tags_in_recettes` (`tag`,`recette_id`)
                  VALUES ("'.$_REQUEST['tag'].'","'.$_REQUEST['recette_id'].'")';
        $result = $dbh->query( $query );
        break;
    }
    break;
  case 'recette':
  case 'recettes':
    //print_r ($_REQUEST);
    $field = array_keys($_REQUEST);
    $field = $field[1];
    //echo htmlentities( $_REQUEST[$field] , ENT_COMPAT, 'UTF-8' ).'<br />';
    $query = "UPDATE recettes
              SET `".$field."`=\"".htmlentities( stripslashes($_REQUEST[$field]) , ENT_COMPAT, 'UTF-8' )."\"
              WHERE `id`=".$_REQUEST['id'];

    $result = $dbh->query( $query );

    //$t = new Textile();
    $t = new \Netcarver\Textile\Parser();

    $retval = $t->TextileThis(htmlentities( stripslashes($_REQUEST[$field]) , ENT_COMPAT, 'UTF-8' ));
    print replaceLinks( $retval );
    break;
}
?>