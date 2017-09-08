<?php

namespace App\Controller;

class Controller extends HomeController {

    /**
     *
     */
    public function website($twig){
        if (!empty($_GET)){
            if(isset($_GET['action'])) {
                $action = $_GET['action'];
                $this->action($action, $twig);
            }
            else{
                echo $twig->render('404.twig');
            }
        }
        else{
            echo $twig->render('website.twig', $this->seeProduction());
        }
    }

    /**
     * Function for know which must be seeing in the website
     * @param $action string read $_GET['action']
     * @param $twig string twig for seeing website.
     */
    public function action($action,$twig){
        if ($action == "ml") {
            echo $twig->render('legal.twig');
        }
        elseif ($action == "login"){
            echo $twig->render('login.twig', $this->seeProduction());
        }
        elseif($action == "sendLogin"){
            echo $this->testLogin();
        }
        elseif($action == "logout"){
            $this->logout();
        }
        elseif($action == "sendProduction"){
            $this->sendProduction($twig);
        }
        elseif($action == "editProduction") {
            echo $twig->render('website.twig', $this->editProduction());
        }
        elseif($action == "sendEditProduction"){
           $this->sendEditProduction();
           echo $twig->render('website.twig', $this->seeProduction());
        }
        elseif($action == "deleteProduction") {
            $this->deleteProduction();
            echo $twig->render('website.twig', $this->seeProduction());
        }
        elseif($action == "sendContact") {
            $this->testEmail();
        }
        else{
            echo $twig->render('404.twig');
        }
    }
}
