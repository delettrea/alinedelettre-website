<?php

namespace App\Model;


class Production extends Login {

    protected $sqlSeeProduction = "SELECT * FROM `production`";
    protected $sqlSeeJustThisProduction = "SELECT * FROM `production` WHERE `infos1` LIKE :infos  OR `infos2` LIKE :infos OR `infos3` LIKE :infos";
    protected $sqlSeeEditProduction = "SELECT * FROM `production` WHERE id=:id";
    protected $sqlDeleteProduction ="DELETE FROM `production` WHERE id=:id";
    protected $sqlSendEditProduct = "UPDATE `production` SET href=:href,name=:name,description=:description,infos1=:infos1,infos2=:infos2,infos3=:infos3 WHERE id=:id";
    protected $sqlSelectId = "SELECT `id` FROM `production`";
    protected $sqlNewProduction ="INSERT INTO `production`(`href`, `name`, `description`, `infos1`, `infos2`, `infos3`) VALUES (:href, :name, :description, :infos1, :infos2, :infos3)";


    public function testFilter($twig){
        if(isset($_GET['filter'])){
            if($_GET['filter'] === 'html' || 'css' || 'javascript' || 'php' ){
                extract($_GET);
                $infos = array("infos" => '%'.$filter.'%');
                $sqlFiltre = array("productions" => $this->sqlPrepare($this->sqlSeeJustThisProduction, $infos));
                echo $twig->render('production.twig', $sqlFiltre);
            }
        }
        elseif ($_GET['filter'] === 'all'){
            $sqlFiltre = array("productions" => $this->sqlPrepare($this->sqlSeeProduction));
            echo $twig->render('production.twig', $sqlFiltre);
        }
    }


    /**
     * Function for seeing website.
     * @return array with all params for the render twig.
     */
    protected function seeProduction(){
        $array= array("productions" => $this->sqlPrepare($this->sqlSeeProduction));
        if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
            $session = array('session' => $this->session());
            $nbProductionDelete = array('nbProductionDelete' => $this->sqlPrepare($this->sqlSelectId));
            $nbProduction = array('nbProduction' => $this->sqlPrepare($this->sqlSelectId));
            $array = array_merge($array, $nbProduction, $nbProductionDelete,$session);
        }
        if(isset($_GET['action'])){
            $action = array('action' => $_GET['action']);
            $array = array_merge($array, $action);
        }
        return $array;
    }

    /**
     * Function just if the user is an admin for  edit productions.
     * @return array with all params for the render twig.
     */
    protected function editProduction(){
        $test = $this->sqlPrepare($this->sqlSeeEditProduction, $this->arrayPostID());
        $array = array('edit' => $test);
        $arrayMerge  = array_merge($array, $this->seeProduction());
        return $arrayMerge;
    }

    /**
     *  Function just if the user is an admin for send the production's edit.
     * @return \PDOStatement
     */
    protected function sendEditProduction(){
        $sendEditProduction = $this->sqlPrepare($this->sqlSendEditProduct, $this->arraySendEditProduct());
        return $sendEditProduction;
    }

    /**
     *  Function just if the user is an admin and delete the production.
     * @return \PDOStatement
     */
    protected function deleteProduction(){
        $sendEditProduction = $this->sqlPrepare($this->sqlDeleteProduction, $this->arrayPostID());
        return $sendEditProduction;
    }

    /**
     *  Function for test new production's xss fails.
     * @return array for sql which creating a new production.
     */
    protected function arrayProduct(){
        extract($_POST);
        $name = htmlspecialchars($name);
        $infos1 = htmlspecialchars($infos1);
        $infos2 = htmlspecialchars($infos2);
        $infos3 = htmlspecialchars($infos3);
        $description = htmlspecialchars($description);
        $arrayProduction = array('href' => $href, 'name' => $name, 'description' => $description, 'infos1' => $infos1, 'infos2' => $infos2, 'infos3' => $infos3);
        return $arrayProduction;
    }

    /**
     * Test if they are a $_GET['id'] for delete or edit production.
     * @return array for sql prepare edit or delete production.
     */
    protected function arrayPostID(){
        $arrayEditProduct = array('id' => $_GET['id']);
        return $arrayEditProduct;
    }

    /**
     * Function for send edit production and test xss fails.
     * @return array for sql edit production.
     */
    protected function arraySendEditProduct(){
        $arrayID = array('id' => $_GET['id']);
        $arraySendEdit = array_merge($this->arrayProduct(), $arrayID);
        return $arraySendEdit;
    }
}