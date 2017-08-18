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
            echo $twig->render('contact.twig', ['productions' => $this->seeProduction(), 'session' => $this->session() ]);
        }

    }

    protected function action($action,$twig){
        if ($action == "legal") {
            $this->seeLegal();
        }
        elseif ($action == "login"){
            $this->prepareLogin();
        }
        elseif($action == "sendLogin"){
            $this->sendLogin();
        }
        elseif($action == "logout"){
            $this->logout();
        }
        elseif($action == "sendProduction"){
            if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['type'] == "admin") {
                $this->sqlPrepare($this->sqlNewProduction, $this->arrayProduct());
                $this->seeWebsite();
            }
        }
        elseif($action == "editProduction"){
            $this->seeWebsite();
        }
        elseif($action == "sendEditProduction"){
            $this->sqlPrepare($this->sqlSendEditProduct, $this->arraySendEditProduct());
            $this->seeWebsite();
        }
        elseif($action == "deleteProduction"){
            $this->sqlPrepare($this->sqlDeleteProduction, $this->arrayPostID());
            $this->seeWebsite();
        }


    }


}