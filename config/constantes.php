<?php 
namespace config;

define('ROOT', str_replace('\\','/',dirname(__DIR__) . "/"));

define('FRONT_ROOT', '/GoToEvent2018/');

define('HOME', 'http://localhost/GoToEvent2018/');

define('CART', 'http://localhost/GoToEvent2018/Cart');

$base=explode($_SERVER['DOCUMENT_ROOT'],ROOT);
  define("BASE",$base[1]);

  define('HOST',"localhost");
  define('USER',"root");
  define('PASS',"");
  define('DB',"gotoevent");
?>

