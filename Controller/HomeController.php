<?php

namespace App\Controller;

class HomeController extends \App\Model\Contact {


    public function sendProduction($twig){
        if(isset($_SESSION) && $_SESSION['type'] == 'admin') {
            $this->sqlPrepare($this->sqlNewProduction, $this->arrayProduct());
            echo $twig->render('adminProduction.twig', $this->seeProduction(),['login' => 'off']);
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
     * Permet de vérifier si tous les paramètres de connexion sont exacts.
     * @param $function string à lancer si les données sont fausses.
     */
    protected function log($request, $twig){
        while ($data = $request->fetch()){
            if($data['findLogin'] == 1){
                $_SESSION['login'] = $data['login'];
                $_SESSION['type'] = $data['type'];
                echo $twig->render('adminProduction.twig', $this->seeProduction());
            }
            elseif ($data['findLogin'] != 1){
                echo $twig->render('login.twig');
                echo '<p class="error bottom-error">connexion impossible, veuillez verifier votre pseudo et votre mot de passe</p>';
            }
        }
    }


}