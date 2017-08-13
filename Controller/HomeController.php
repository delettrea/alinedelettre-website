<?php

class HomeController extends TemplateLegal {

    public function prepareWebsite(){
        if (isset($_GET['action']) && !empty($_GET['action'])){
            if($_GET['action'] == "legal"){
                self::seeLegal();
            }
        }
        else{
            self::seeWebsite();
        }
    }

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