<?php

class Controller extends HomeController {

    public $action;

    public function website(){
        $this->prepareWebsite();
    }

    public function contact(){
        $this->prepareSendEmail();
    }

    public function production(){
        $this->prepareProduction();
    }

}