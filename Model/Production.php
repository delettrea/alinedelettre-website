<?php

class Production extends Contact {

    public $sqlSeeProduction = "SELECT production.id as ID, infos.id as infosID, href , `infos1`, `infos2`, `infos3`, `name`, `description` 
                                FROM `production` JOIN infos ON production.id = infos.id";
    public $emptyArray = array();

}