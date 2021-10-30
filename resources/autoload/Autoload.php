<?php


class Autoload
{
    public function autoLoadClass()
    {
        spl_autoload_register(function ($class) {
            $Controller = 'app\Controllers'.'\\'.$class.".php";
            $Model = 'app\Models'.'\\'.$class.".php";

            if (file_exists($Controller))
            {
                require_once ($Controller);
            }
            elseif(file_exists($Model))
            {
                require_once ($Model);
            }
            else
            {
                die("404");
            }
        });
    }

}
$autoload = new Autoload();
$autoload->autoLoadClass();