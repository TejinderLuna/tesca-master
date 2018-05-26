<?php

class FeedbackDB
{
    public static function insertRecord($info){

        $dbobj=Databases::getDB();
        $query = 'INSERT INTO feedbacks
                 (first_name,last_name,email_id,contact_num,feedback_desc)
              VALUES
                 (:first_name,:last_name,:email_id,:contact_num,:feedback_desc)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':first_name', $info->getFirstName());
        $statement->bindValue(':last_name',$info->getLastName());
        $statement->bindValue(':email_id',$info->getEmailId());
        $statement->bindValue(':contact_num', $info->getContactNum());
        $statement->bindValue(':feedback_desc',$info->getFeedbackDesc());
        if($statement->execute()){
            $statement->closeCursor();
			return true;
        }
        else{
			$statement->closeCursor();
            return false;
        }
        

    }
    public static function getFeedBackData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM feedbacks ORDER BY feedback_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $feedbacks = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $feedbacks;
    }
}