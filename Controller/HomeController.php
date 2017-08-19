<?php

namespace App\Controller;

class HomeController extends \App\Model\Contact {


    public function sendProduction($twig){
        if(isset($_SESSION) && $_SESSION['type'] == 'admin') {
            $this->sqlPrepare($this->sqlNewProduction, $this->arrayProduct());
            echo $twig->render('adminProduction.twig', $this->seeProduction(),['login' => 'off']);
        }
    }


    protected function testEmail(){
        if(empty($_POST['name'])){
            echo '<div class="error"> Veuillez renseigner un nom</div>';
            exit();
        }
        elseif (empty($_POST['email'])){
            echo '<div class="error"> Veuillez renseinger une adresse email</div>';
            exit();
        }elseif (empty($_POST['object'])){
            echo '<div class="error"> Veuillez renseinger un sujet</div>';
            exit();
        }elseif (empty($_POST['mail'])){
            echo '<div class="error"> Veuillez renseinger un message</div>';
            exit();
        }
        $this->sendEmail();
        echo '<div class="sucess">Votre email à bien été envoyé</div>';
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
            }
            elseif ($data['findLogin'] != 1){
                echo '<p class="error bottom-error">connexion impossible, veuillez verifier votre pseudo et votre mot de passe</p>';
            }
        }
    }


}