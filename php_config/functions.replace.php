<?php

function replace_allRecettes_tagname( $nom ){
  global $_HTML;
  $ligne = $_HTML['allRecettes_tagname'];
  $ligne = str_replace( '[[NOM]]' , $nom , $ligne );
  return $ligne;
}
function replace_allRecettes_tags_li( $id , $nom ){
  global $_HTML;
  $ligne = $_HTML['allRecettes_tags_li'];
  $ligne = str_replace( '[[ID]]' , $id , $ligne );
  $ligne = str_replace( '[[NOM]]' , $nom , $ligne );
  return $ligne;
}
function replace_allRecettes_letter( $lettre , $lignes ){
  global $_HTML;
  $div = $_HTML['allRecettes_letter'];
  $div = str_replace( '[[LETTRE]]' , strtoupper( $lettre ) , $div );
  $div = str_replace( '[[LIGNES]]' , $lignes , $div );
  return $div;
}
function replace_allRecettes_li( $id , $nom , $imageExists ){
  global $_HTML;
  $ligne = $_HTML['allRecettes_li'];
  $ligne = str_replace( '[[ID]]' , $id , $ligne );
  $ligne = str_replace( '[[NOM]]' , $nom , $ligne );
  if( $imageExists )
    $ligne = str_replace( '[[IMAGE]]' , 'imageExists' , $ligne );
  else
    $ligne = str_replace( '[[IMAGE]]' , '' , $ligne );
  return $ligne;
}
?>