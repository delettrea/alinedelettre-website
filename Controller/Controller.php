<?php

namespace App\Controller;

class Controller extends HomeController {
    

    /**
     * Fonction permettant le lancement des autres fonctions.
     */
    public function website($twig){
        if (isset($_GET['action'])){
            $action = $_GET['action'];
            $this->action($action,$twig);
        }
        else{
            echo $twig->render('adminProduction.twig', $this->seeProduction());
        }
    }

    protected function action($action,$twig){
        if ($action == "legal") {
            echo $twig->render('legal.twig');
        }
        elseif ($action == "login"){
            echo $twig->render('login.twig');
        }
        elseif($action == "sendLogin"){
            $this->log($this->prepareSendLogin(), $twig);
        }
        elseif($action == "logout"){
            $this->logout();
        }
        elseif($action == "sendProduction"){
            $this->sendProduction($twig);
        }
        elseif($action == "editProduction") {
            echo $twig->render('adminProduction.twig', $this->editProduction());
        }
        elseif($action == "sendEditProduction"){
           $this->sendEditProduction();
           echo $twig->render('adminProduction.twig', $this->seeProduction());
        }
        elseif($action == "deleteProduction"){
            $this->deleteProduction();
            echo $twig->render('adminProduction.twig', $this->seeProduction());
        }elseif($action == "sendContact"){
            $this->sendEmail();
            echo $twig->render('adminProduction.twig', $this->seeProduction());
        }
    }


}