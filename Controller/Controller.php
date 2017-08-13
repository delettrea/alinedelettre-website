<?php

class Controller extends HomeController {

    public $action;

    public function contact(){
        self::prepareSendEmail();
    }

    public function production(){
        self::prepareProduction();
    }

}