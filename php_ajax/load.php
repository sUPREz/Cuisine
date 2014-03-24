<?php
//print_r ($_REQUEST);
require_once '../php_config/config.php';
switch( $_REQUEST['type'] ){
  case 'recette':
  case 'recettes':
    $query = "SELECT ".$_REQUEST['name']." from recettes where `id`=".$_REQUEST['id'];
    $result = $dbh->query( $query );
    $recette = $result->fetch(PDO::FETCH_ASSOC);
    print html_entity_decode( $recette[ $_REQUEST['name'] ] );
    break;
}
?>