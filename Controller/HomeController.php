<?php

namespace App\Controller;

class HomeController extends \App\Model\Contact {


    /**
     * Function for twig if the user is an admin.
     * @param $twig string twig for seeing website.
     */
    protected function sendProduction($twig){
        if(isset($_SESSION) && $_SESSION['type'] == 'admin') {
            $this->sqlPrepare($this->sqlNewProduction, $this->arrayProduct());
            echo $twig->render('website.twig', $this->seeProduction(),['login' => 'off']);
        }
    }





}