<?php

class Login extends Production {

    public $sqlLogin = "SELECT id, login, user.name, COUNT(id) AS findLogin FROM user WHERE `login` =:login AND `password` =:password";

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