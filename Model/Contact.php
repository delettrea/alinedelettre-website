<?php

namespace App\Model;

class Contact extends Production {

    protected $message;
    protected $objet;
    protected $expediteur;
    protected $email;
    protected $destinataire = 'aline.delettre4@gmail.com';

    /**
     * Function for test mail's xss fail.
     */
    protected function message(){
        extract($_POST);
        $this->message = htmlspecialchars($mail);
        $this->objet = htmlspecialchars($object);
        $this->expediteur = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
    }

    /**
     * Function for send email.
     */
    protected function sendEmail(){
        $this->message();
        $destinataire = $this->destinataire;
        $expediteur = $this->expediteur;
        $objet = $this->objet;
        $email = $this->email;
        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n";
        $headers .= 'Reply-To: ' . $email . "\n";
        $headers .= 'From: "Expediteur"<' . $expediteur . '>' . "\n";
        $headers .= 'Delivered-to: ' . $destinataire . "\n";
        $message = '<div style="width: 100%; text-align: center; font-weight: bold">' . $this->message . '</div>';
        if(mail($destinataire, $objet, $message, $headers)){
            return '<div class="success"><i class="fa fa-check-circle" aria-hidden="true"></i> Merci, votre message a bien été envoyé.</div>';
        }else{
            return '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Désolé, votre message n\'a pas pu être envoyé.</div>';
        }

    }

    /**
     * Function for seeing if the user has correctly filled fields. Stop if it's not correct.
     */
    protected function testEmail(){
        if(empty($_POST['name'])){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Veuillez renseigner un nom</div>';
            exit();
        }
        elseif(strlen($_POST['name']) >= 255){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Votre nom ne peut pas excéder 255 caractères.</div>';
            exit();
        }
        elseif (empty($_POST['email'])){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Veuillez renseigner une adresse email</div>';
            exit();
        }
        elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Veuillez renseigner une adresse email valide</div>';
            exit();
        }
        elseif (empty($_POST['object'])){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Veuillez renseigner un sujet</div>';
            exit();
        }
        elseif(strlen($_POST['object']) >= 255){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Votre sujet ne peut pas excéder 255 caractères.</div>';
            exit();
        }
        elseif (empty($_POST['mail'])){
            echo '<div class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Veuillez renseigner un message</div>';
            exit();
        }
        else {
            echo $this->sendEmail();
        }
    }


}