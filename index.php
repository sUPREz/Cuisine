<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <?php
  require_once( 'php_config/config.php' );
  //require_once( 'php_lib/Textile.php' );
  require_once( 'php_lib/php-textile-3.5.5/Parser.php' );
  ?>
  <title>Recettes !!</title>
  <!-- Favicon !-->
  <link rel="shortcut icon" href="imgs/favicon.ico" type="image/vnd.microsoft.icon" />
  <link rel="icon" href="imgs/favicon.ico" type="image/vnd.microsoft.icon" />
  <!-- CSS Style Sheets !-->
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.tagit.css" type="text/css" />
  <?
  if( IsPowerUser() )
  {
  ?>
  <!-- jQuery !-->
  <script language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="http://code.jquery.com/ui/1.9.0/jquery-ui.js" type="text/javascript"></script>
  <!-- jQuery Plugins !-->
  <script language="JavaScript" src="js_plugin/jquery.jeditable.mini.js" type="text/javascript"></script>
  <script language="JavaScript" src="js_plugin/jquery.tagit.js" type="text/javascript"></script>
  <!-- Post It !-->
  <script src="http:../_Tools/_TextEditor/textEditor.js"></script>
  <link rel="stylesheet" href="../_Tools/_TextEditor/styles/styles.css" type="text/css" />
  <?
  }
  ?>
</head>

<body>

<div class="main">
  <div class="links">
    <ul>
      <? 
      if( IsPowerUser() )
      {
      ?>
      <li><a href="http://www.jquery.com" target="_blank">jQuery</a></li>
      <li><a href="http://www.jqueryui.com" target="_blank">jQuery UI</a></li>
      <li><a href="http://www.appelsiini.net/projects/jeditable" target="_blank">jEditable Project</a></li>
      <li><a href="http://webspirited.com/tagit/docs.html" target="_blank">jQuery Tagit</a></li>
      <? 
      }
      ?>
    </ul>
  </div>
  <div class="header">
    Recettes !!
    <script>
    /*
    $(document).ready(function(){
      $('div.header').postIt('titre','Recette');
    })
    //*/
    </script>
  </div>
  <div class="menu">
    <ul>
      <li class="<?php if( isset($_REQUEST['area']) && !isset($_REQUEST['tag']) ){ if($_REQUEST['area'] == 'allRecettes') echo 'selected'; }?>"><a href="?area=allRecettes">Toutes les Recettes</a></li>
      <?
      if( IsPowerUser() )
      {
      ?>    
      <li class="<?php if( isset($_REQUEST['area']) && isset($_REQUEST['id']) ){ if( $_REQUEST['area'] == 'recette' && $_REQUEST['id'] == 'new' ) echo 'selected'; }?>"><a href="?area=recette&id=new">Nouvelle Recette</a></li>
      <?
      }
      ?>
    </ul>
  </div>
  <div class="content">
<?php
if( !isset($_REQUEST['area']) )
  $_REQUEST['area'] = '';

switch($_REQUEST['area']){
  case '':
  case 'allRecettes':
    include 'allRecettes.php';
    break;
  case 'recette':
    include 'recette.php';
    break;
  case 'tag':
    include 'tag.php';
    break;
  default:
    break;
}

?>
  </div>
</div>
</body>

</html>
