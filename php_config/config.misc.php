<?php
function replaceLinks($text){
  //echo $text;
  //$text = 'bla blabla [[Muffins (base)|bb]] bli bli blibli';
  $preg_pattern = '#\[\[(.*)\|(.*)\]\]#i';
  //$preg_replace = '<a href="$1">$2</a>';
  $text = preg_replace_callback( $preg_pattern ,
                                 function($match){
                                    global $dbh;
                                    if( is_numeric($match[1]) ){
                                      $query = 'SELECT `id`
                                                FROM `recettes`
                                                WHERE `id`="'.$match[1].'"';
                                    } else {
                                      $query = 'SELECT `nom`,`id`
                                                FROM `recettes`
                                                WHERE `nom`="'.$match[1].'"';
                                    }
                                    $result = $dbh->query( $query );
                                    if( $result->rowCount() != 0 ){
                                      $recette = $result->fetch(PDO::FETCH_ASSOC);
                                      return ( '<a href="?area=recette&id='.$recette['id'].'">'.$match[2].'</a>' );
                                    } else {
                                      return( '[['.$match[1].'|'.$match[2].']]' );
                                    }
                                 } ,
                                 $text );
  //print_r( $text );

  $preg_pattern = '#\[\[(.*)\]\]#';
  //$preg_replace = '<a href="$1">$2</a>';
  $text = preg_replace_callback( $preg_pattern ,
                                 function($match){
                                    global $dbh;
                                    if( is_numeric($match[1]) ){
                                      $query = 'SELECT `nom`,`id`
                                                FROM `recettes`
                                                WHERE `id`="'.$match[1].'"';
                                    } else {
                                      $query = 'SELECT `nom`,`id`
                                                FROM `recettes`
                                                WHERE `nom`="'.$match[1].'"';
                                    }
                                    $result = $dbh->query( $query );
                                    //echo $match[1].' - '.$query.' - '.$result->rowCount().'<br />';
                                    if( $result->rowCount() != 0 ){
                                      $recette = $result->fetch(PDO::FETCH_ASSOC);
                                      return ( '<a href="?area=recette&id='.$recette['id'].'">'.$recette['nom'].'</a>' );
                                    } else {
                                      return( '[['.$match[1].'|'.$match[2].']]' );
                                    }
                                 } ,
                                 $text );
  return($text);
}
?>