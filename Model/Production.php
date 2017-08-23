<?php

namespace App\Model;


class Production extends Login {

    public $sqlSeeProduction = "SELECT * FROM `production`";
    public $sqlSeeJustThisProduction = "SELECT * FROM `production` WHERE `infos1` = :infos  OR `infos2` = :infos OR `infos3` = :infos";
    public $sqlSeeEditProduction = "SELECT * FROM `production` WHERE id=:id";
    public $sqlDeleteProduction ="DELETE FROM `production` WHERE id=:id";
    public $sqlSendEditProduct = "UPDATE `production` SET href=:href,name=:name,description=:description,infos1=:infos1,infos2=:infos2,infos3=:infos3 WHERE id=:id";
    public $sqlSelectId = "SELECT `id` FROM `production`";
    public $sqlNewProduction ="INSERT INTO `production`(`href`, `name`, `description`, `infos1`, `infos2`, `infos3`) VALUES (:href, :name, :description, :infos1, :infos2, :infos3)";


    public function testProduction(){
        $array = $this->seeProduction($this->sqlSeeProduction);
        return $array;
    }

    public function seeProduction($sql){
        $array = array('productions' => $this->sqlPrepare($sql));
        $this->productionAdmin($array);
        $this->pageAction($array);
        return $array;
    }

    public function productionAdmin($array){
        if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
            $session = array('session' => $this->session());
            $nbProductionDelete = array('nbProductionDelete' => $this->sqlPrepare($this->sqlSelectId));
            $nbProduction = array('nbProduction' => $this->sqlPrepare($this->sqlSelectId));
            $array = array_merge($array, $nbProduction, $nbProductionDelete,$session);
            return $array;
        }
    }

    public function pageAction($array){
        if(isset($_GET['action'])){
            $action = array('action' => $_GET['action']);
            $array = array_merge($array, $action);
            return $array;
        }
    }


    public function editProduction(){
            $test = $this->sqlPrepare($this->sqlSeeEditProduction, $this->arrayPostID());
            $array = array('edit' => $test);
            $arrayMerge  = array_merge($array, $this->seeProduction());
            return $arrayMerge;
    }

    public function sendEditProduction(){
        $sendEditProduction = $this->sqlPrepare($this->sqlSendEditProduct, $this->arraySendEditProduct());
        return $sendEditProduction;
    }

    public function deleteProduction(){
        $sendEditProduction = $this->sqlPrepare($this->sqlDeleteProduction, $this->arrayPostID());
        return $sendEditProduction;
    }

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
        $arraySendEdit = array_merge($this->arrayProduct(), $arrayID);
        return $arraySendEdit;
    }



}