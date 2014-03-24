<?php

//print_r ($_REQUEST);
require_once '../php_config/config.php';
switch( $_REQUEST['type'] ){
  case 'recette':
    $query = "DELETE from recettes WHERE `id`=".$_REQUEST['id'];
    echo $dbh->exec( $query );
    break;
}

?>