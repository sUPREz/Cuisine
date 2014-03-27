<?php
ini_set( 'default_charset' , "UTF-8" );
//ini_set( 'default_charset' , "iso-8859-1" );
error_reporting(E_ALL ^ E_NOTICE);

$_CONFIG['host'] = '127.0.0.1';
$_CONFIG['db'] = 'cuisine';
$_CONFIG['dsn'] = 'mysql:dbname='.$_CONFIG['db'].';host='.$_CONFIG['host'];
$_CONFIG['user'] = 'root';
$_CONFIG['password'] = 'l33t43v3r';

try {
    $dbh = new PDO($_CONFIG['dsn'], $_CONFIG['user'], $_CONFIG['password']);
} catch(PDOException $e) {
    print $e->getMessage();
}

require_once( 'config.misc.php' );
require_once( 'config.html.php' );
require_once( 'functions.replace.php' );
?>