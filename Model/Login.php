<?php

namespace App\Model;


class Login extends Sql {

    public $sqlLogin = "SELECT id, login, user.type, COUNT(id) AS findLogin FROM user WHERE `login` =:login AND `password` =:password";



    public function session(){
            $session = $_SESSION['type'];
            return $session;
    }

    public function prepareSendLogin(){
        $request = $this->sqlPrepare($this->sqlLogin, $this->checkValueLogin());
        return $request;
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