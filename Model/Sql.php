<?php

namespace App\Model;


/**
 * Class Sql
 * Prépare PDO pour la base de données et l'exécute.
 */
class Sql extends Data{


    /**
     * @param $sql string requête SQL
     * @param null $array array pour la fonction prepare
     * @return \PDOStatement résultat de la requête
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