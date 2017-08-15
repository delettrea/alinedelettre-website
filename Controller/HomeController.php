<?php

class HomeController extends TemplateLogin {

    public function prepareWebsite(){
        if (isset($_GET['action']) && !empty($_GET['action'])){
            if($_GET['action'] == "legal"){
                $this->seeLegal();
            }
            elseif ($_GET['action'] == "login"){
                $this->prepareLogin();
            }
            elseif ($_GET['action'] == "sendLogin"){
                $this->sendLogin();
            }
            elseif ($_GET['action'] == "logout"){
                $this->logout();
            }
            elseif ($_GET['action'] == "sendProduction"){
                if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['type'] == "admin"){
                   $this->sqlPrepare($this->sqlNewProduction, $this->arrayProduct());
                   $this->seeWebsite();
                }
            }
            elseif ($_GET['action'] == "editProduction"){
                $this->seeWebsite();
            }
            elseif ($_GET['action'] == "sendEditProduction"){
                $this->sqlPrepare($this->sqlSendEditProduct, $this->arraySendEditProduct());
                $this->seeWebsite();
            }
            elseif ($_GET['action'] == "deleteProduction"){
                $this->sqlPrepare($this->sqlDeleteProduction, $this->arrayPostID());
                $this->seeWebsite();
            }
        }
        else{
            $this->seeWebsite();
        }
    }

    public function prepareSendEmail(){
        if (isset($_GET['action']) && $_GET['action'] == "contact"){
            $this->sendEmail();
            $this->seeContact();
        }
        else{
            $this->seeContact();
        }
    }

    public function prepareProduction(){
        $this->sqlPrepare($this->sqlSeeProduction, $this->emptyArray);
        $this->seeProduction();
    }

    /**
     * Prepare la fonction pour se connecter au site.
     */
    public function prepareLogin(){
        $this->seeLogin();
    }

    /**
     * Prépare la fonction qui vérifie si les données de connexion sont exactes.
     */
    public function sendLogin(){
        $this->sqlPrepare($this->sqlLogin, $this->checkValueLogin());
        $this->log();
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
                $this->seeLogin();
                echo '<p class="error">connexion impossible, veuillez verifier votre pseudo et votre mot de passe</p>';
            }
        }
    }


}