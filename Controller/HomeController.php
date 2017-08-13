<?php

class HomeController extends TemplateProduction {

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


}