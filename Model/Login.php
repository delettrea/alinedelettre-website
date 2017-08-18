<?php

namespace App\Model;


class Login extends Production {

    public $sqlLogin = "SELECT id, login, user.type, COUNT(id) AS findLogin FROM user WHERE `login` =:login AND `password` =:password";


    public function session(){
        if(isset($_SESSION) && !empty($_SESSION)){
            print_r($_SESSION);
            return $_SESSION;
        }
        else{
            return null;
        }
    }

    /**
     * Verifie les données envoyées via le formulaire.
     * @return array Tableau prêt pour une requête sql.
     */
    public function checkValueLogin(){
        extract($_POST);
        $login = htmlspecialchars($login);
        $password = sha1($password);
        $password = htmlspecialchars($password);
        $loginArray = array('login'=> $login, 'password' => $password);
        return $loginArray;
    }

    /**
     * Deconnexion de l'utilisateur.
     */
    public function logout(){
        session_destroy();
        header('location: index.php');
    }



}