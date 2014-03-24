<?php

$_HTML['allRecettes_tagname'] = PHP_EOL.'    <div class="nom"><p>Mot-Cl&eacute; : [[NOM]]</p></div>';
$_HTML['allRecettes_tags_li'] = PHP_EOL.'        <li class="tag"><a href="?area=allRecettes&tag=[[ID]]">[[NOM]]</a></li>';

$_HTML['allRecettes_letter']  = PHP_EOL.'        <div class="letter">'.PHP_EOL.'          <ul>'.PHP_EOL.'            <lh>[[LETTRE]]</lh>'.PHP_EOL.'[[LIGNES]]'.PHP_EOL.'          </ul>'.PHP_EOL.'        </div>';
$_HTML['allRecettes_li']      = PHP_EOL.'            <li class="[[IMAGE]]"><a class="open" id="[[ID]]" href="?area=recette&id=[[ID]]">[[NOM]]</a>&nbsp;<a class="remove" href="#" id="[[ID]]"><img src="imgs/remove.png" height="18" width="14" /></a></li>';


?>