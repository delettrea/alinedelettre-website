<?php
class Autoloader{

    /**
     * Permet de lancer l'autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Autoloader
     * @param $class
     */
    static function autoload($class){
        if($class ==  'HomeController' || $class ==  'Controller'){
            include 'Controller/'.$class.'.php';
        }
        elseif ($class == 'Data' || $class == 'Sql'|| $class == 'Contact'|| $class == 'Production'){
            include 'Model/'.$class.'.php';
        }
        else {
            include 'Vue/'.$class.'.php';
        }
    }


}
