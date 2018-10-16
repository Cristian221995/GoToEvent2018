<?php namespace config;


 class Autoload
{
	public static function start ()
	{
        spl_autoload_register(function($instancia)
        {
              $ruta=ROOT.str_replace("\\","/",$instancia).".php";
              include_once($ruta);
        });
    }
}
 ?>