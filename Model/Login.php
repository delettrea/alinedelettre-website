<?php

namespace App\Model;


class Login extends Sql {

    protected $sqlLogin = "SELECT id, login, user.type, COUNT(id) AS findLogin FROM user WHERE login =:login AND password =:password";


    /**
     * Function for know if the user is connected.
     * @return mixed array
     */
    protected function session(){
            $session = $_SESSION;
            return $session;
    }

    /**
     * Disconnect user
     */
    protected function logout(){
        session_destroy();
        header('location: index.php');
    }

    /**
     * Test data from form login
     * @return array with sql
     */
    protected function checkValueLogin(){
        extract($_POST);
        $login = htmlspecialchars($login);
        $password = sha1($password);
        $password = htmlspecialchars($password);
        $loginArray = array('login'=> $login, 'password' => $password);
        return $loginArray;
    }

    /**
     * Send data to the sql
     * @return \PDOStatement array with sql result
     */
    protected function prepareSendLogin(){
        $request = $this->sqlPrepare($this->sqlLogin, $this->checkValueLogin());
        return $request;
    }

    /**
     * Check informations which is sent by user
     */
    protected function testLogin(){
        if(empty($_POST['login'])){
            echo '<div class="error"> Veuillez renseigner un pseudo</div>';
            exit();
        }
        elseif(strlen($_POST['login']) >= 255){
            echo '<div class="error"> Votre login ne peut pas excéder 255 caractères.</div>';
            exit();
        }
        elseif (empty($_POST['password'])){
            echo '<div class="error"> Veuillez renseigner un mot de passe</div>';
            exit();
        }
        else {
            echo $this->log($this->prepareSendLogin());
        }
    }

    /**
     * Test if login and password match to the sql
     * @param $request string sql
     * @return string error message if not login
     */
    protected function log($request){
        while ($data = $request->fetch()){
            if($data['findLogin'] == 1){
                $_SESSION['login'] = $data['login'];
                $_SESSION['type'] = $data['type'];
                echo '<p class="success"> Connexion réussie </p><div class="index"></div>';
            }
            elseif ($data['findLogin'] != 1){
                echo '<p class="error">Connexion impossible, veuillez verifier votre pseudo et votre mot de passe</p>';
                exit();
            }
        }
    }







}