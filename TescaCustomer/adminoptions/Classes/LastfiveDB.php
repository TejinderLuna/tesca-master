<?php
require_once 'Databases.php';

class LastfiveDB
{
    public static function getLastfiveData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM x ORDER BY y';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $lf = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $lf;
    }

}