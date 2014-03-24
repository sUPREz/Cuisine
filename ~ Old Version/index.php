<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Recettes !</title>
  <script language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="http://code.jquery.com/ui/1.9.0/jquery-ui.js" type="text/javascript"></script>

  <script language="JavaScript" src="jsPlugin/jquery.jeditable.mini.js" type="text/javascript"></script>
  <script language="JavaScript" src="jsPlugin/jquery.tagit.js" type="text/javascript"></script>
  <link rel="stylesheet" href="jsPlugin/jquery.tagit.custom.css" type="text/css" />
  <style>
  body{                 background-color:#FF7C4C;  }
  fieldset.menu{        background-color:#FFC266;  }
  fieldset.nom{         background-color:#FFC266;  }
  fieldset.ingredients{ background-color:#FFC266;  }
  fieldset.instructions{background-color:#FFC266;  }
  fieldset{             background-color:#FFC266;  }  

  body{
    font-family: Calibri, Arial;
    font-size: 18px;
  }
  fieldset{
    border: 1px solid #000;
  }
  fieldset legend{
    font-weight: bold;
    font-size: 25px;
    font-variant: small-caps;
    text-decoration: -underline;
    color: #000;
  }
  fieldset.menu a{
    color: #701068;
    text-decoration: none;
    font-size: 15px;
  }
  fieldset.menu a:hover{
    text-decoration: underline;
  }
  ul lh{
    text-decoration: none;
    margin-top: 20px;
    margin-bottom: 5px;
    margin-left: 5px;
    display: list-item;
    list-style-type: none;
    font-weight: bold;
    border: solid 1px #000;
    width: 25px;
    text-align: center;
    background-color: #FF4904;
    color: #FFF;
  }

  </style>
</head>

<body>
  <div style="border: solid black 0px; width:1018px; padding:0px;">
  <fieldset class="menu">
    <legend>Menu</legend>
    <a href="?area=allRecettes">Toutes les recettes</a> - <a href="?area=recette&id=new">Nouvelle recette</a> - <a href="#">Tous les tags</a><br />
    <a href="#">Agenda</a> - <a href="#">Liste des personnes</a><br />
    <a href="http://www.appelsiini.net/projects/jeditable" target="_blank">Jeditable Project</a> - <a href="http://webspirited.com/tagit/docs.html" target="_blank">jQuery Tagit</a>
  </fieldset>
  </div>
<?php
require_once 'php/db.php';
/*
echo $string = 'April 15, 2003';
echo '<br />';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
//*/

if( isset($_REQUEST['area']) ){
  switch($_REQUEST['area']){
    case 'allRecettes':
      include 'allRecettes.php';
      break;
    case 'recette':
      include 'recette.php';
      break;
    case 'tag':
      include 'tag.php';
      break;
  }
}
?>
</body>

</html>
