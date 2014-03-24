<?php




$query = "SELECT nom,id from recettes ORDER BY nom asc";
$result = $dbh->query( $query );
//print_r($result);
while( $recette = $result->fetch(PDO::FETCH_ASSOC) )
{
  //print_r( $recette );
  if( $recette['nom'] == "" )
    $recette['nom'] = "Sans Nom";
  echo PHP_EOL.'        <li><a class="open" id="'.$recette['id'].'" href="recette.php?id='.$recette['id'].'">'.$recette['nom'].'</a> - <a class="remove" id="'.$recette['id'].'" href="#">Remove</a></li>';
}
?>