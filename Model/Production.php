<?php

class Production extends Contact {

    public $sqlSeeProduction = "SELECT * FROM `production`";
    public $sqlSeeEditProduction = "SELECT * FROM `production` WHERE id=:editID";
    public $sqlDeleteProduction ="DELETE FROM `production` WHERE id=:id";
    public $sqlSendEditProduct = "UPDATE `production` SET href=:href,name=:name,description=:description,infos1=:infos1,infos2=:infos2,infos3=:infos3 WHERE id=:id";
    public $sqlSelectId = "SELECT `id` FROM `production`";
    public $sqlNewProduction ="INSERT INTO `production`(`href`, `name`, `description`, `infos1`, `infos2`, `infos3`) VALUES (:href, :name, :description, :infos1, :infos2, :infos3)";
    public $emptyArray = array();


    public function arrayProduct(){
        extract($_POST);
        $name = htmlspecialchars($name);
        $infos1 = htmlspecialchars($infos1);
        $infos2 = htmlspecialchars($infos2);
        $infos3 = htmlspecialchars($infos3);
        $description = htmlspecialchars($description);
        $arrayProduction = array('href' => $href, 'name' => $name, 'description' => $description, 'infos1' => $infos1, 'infos2' => $infos2, 'infos3' => $infos3);
        return $arrayProduction;
    }

    public function arrayPostID(){
        $arrayEditProduct = array('id' => $_POST['id']);
        return $arrayEditProduct;
    }

    public function arraySendEditProduct(){
        $arrayID = array('id' => $_GET['id']);
        $arraySendEdit = array_merge(self::arrayProduct(), $arrayID);
        return $arraySendEdit;
    }

}