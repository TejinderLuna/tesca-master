<?php
require_once 'Databases.php';
require_once 'Document.php';

class DocumentDB
{
    public static function insertRecord($info){
        
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO documents
                 (doc_name,doc_type,user_id,apt_id)
              VALUES
                 (:doc_name,:doc_type,:doc_img,:user_id,:apt_id)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':doc_name', $info->getDocName());
        $statement->bindValue(':doc_type',$info->getDocType());
        $statement->bindValue(':user_id', $info->getUserId());
        $statement->bindValue(':apt_id',$info->getAptId());
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();

    }

}