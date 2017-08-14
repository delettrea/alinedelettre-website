<?php

class HomeController extends TemplateLogin {

    public function prepareWebsite(){
        if (isset($_GET['action']) && !empty($_GET['action'])){
            if($_GET['action'] == "legal"){
                self::seeLegal();
            }
            elseif ($_GET['action'] == "login"){
                self::prepareLogin();
            }
            elseif ($_GET['action'] == "sendLogin"){
                self::sendLogin();
            }
            elseif ($_GET['action'] == "logout"){
                self::logout();
            }
            elseif ($_GET['action'] == "sendProduction"){
                if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['type'] == "admin"){
                   self::sqlPrepare($this->sqlNewProduction, self::arrayProduct());
                   self::seeWebsite();
                }
            }
            elseif ($_GET['action'] == "editProduction"){
                self::seeWebsite();
            }
            elseif ($_GET['action'] == "sendEditProduction"){
                self::sqlPrepare($this->sqlSendEditProduct, self::arraySendEditProduct());
                self::seeWebsite();
            }
            elseif ($_GET['action'] == "deleteProduction"){
                self::sqlPrepare($this->sqlDeleteProduction, self::arrayPostID());
                self::seeWebsite();
            }
        }
        else{
            self::seeWebsite();
        }
    }

    public function prepareSendEmail(){
        if (isset($_GET['action']) && $_GET['action'] == "contact"){
            self::sendEmail();
            self::seeContact();
        }
        else{
            self::seeContact();
        }
    }

    public function prepareProduction(){
        self::sqlPrepare($this->sqlSeeProduction, $this->emptyArray);
        self::seeProduction();
    }

    /**
     * Prepare la fonction pour se connecter au site.
     */
    public function prepareLogin(){
        self::seeLogin();
    }

    /**
     * Prépare la fonction qui vérifie si les données de connexion sont exactes.
     */
    public function sendLogin(){
        self::sqlPrepare($this->sqlLogin, self::checkValueLogin());
        self::log();
    }


    /**
     * Permet de vérifier si tous les paramètres de connexion sont exacts.
     * @param $function Fonction à lancer si les données sont fausses.
     */
    public function log(){
        while ($data = $this->request->fetch()){
            if($data['findLogin'] == 1){
                $_SESSION['login'] = $data['login'];
                $_SESSION['type'] = $data['type'];
                header('location: index.php');
            }
            elseif ($data['findLogin'] != 1){
                self::seeLogin();
                echo '<p class="error bottom-error">connexion impossible, veuillez verifier votre pseudo et votre mot de passe</p>';
            }
        }
    }


}