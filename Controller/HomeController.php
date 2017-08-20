<?php

namespace App\Controller;

class HomeController extends \App\Model\Contact {


    public function sendProduction($twig){
        if(isset($_SESSION) && $_SESSION['type'] == 'admin') {
            $this->sqlPrepare($this->sqlNewProduction, $this->arrayProduct());
            echo $twig->render('adminProduction.twig', $this->seeProduction(),['login' => 'off']);
        }
    }





}