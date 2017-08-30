<?php

namespace App\Model;


/**
 * Class Sql
 * Prépare PDO pour la base de données et l'exécute.
 */
class Sql extends Data{


    /**
     * Function for execute PDO.
     * @param $sql string SQL request.
     * @param null $array just for prepare request.
     * @return \PDOStatement request's result.
     */
     protected function sqlPrepare($sql,$array = null){
         if($array) {
             $request = $this->bdd->prepare($sql);
             $request->execute($array);
             return $request;
         }
         else{
             $request = $this->bdd->query($sql);
             return $request;
         }
     }


 }