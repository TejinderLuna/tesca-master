<?php
require_once 'Databases.php';
require_once 'Existingtickets.php';

class ExistingticketsDB
{
    public static function getData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT cmp.*,
						 users.first_name, 
						 users.last_name, 
						 users.email,
						 users.cell_phone,
						 apt.apt_number 
				  FROM complaints as cmp 
				  INNER JOIN apartments as apt 
						ON   apt.apt_id = cmp.apt_id 
				  INNER JOIN users 
						ON users.user_id = cmp.user_id 
				  WHERE users.user_id = :user_id
				  ORDER BY cmp.date_created desc, cmp.complaint_id asc';
        $statement = $dbobj->prepare($query);
		$statement->bindValue(':user_id',$_SESSION['uid']);
        $statement->execute();
        $complaints = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $complaints;
    }
    public static function deleteRecord($complaint_id){
        $dbobj=Databases::getDB();
        $query = 'DELETE FROM complaints
                  WHERE complaint_id = :complaint_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':complaint_id', $complaint_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }
    public static function getExistingById($complaint_id){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM complaints where complaint_id = :complaint_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':complaint_id', $complaint_id);
        $statement->execute();
        $permit= $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $permit;
    }
    public static function updateRecord($info,$complaint_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE complaints SET complaints_dept = :complaints_dept, complaint_category = :complaint_category, 
complaint_sub_category = :complaint_sub_category, complaint_desc = :complaint_desc, complaint_img = :complaint_img
   where complaint_id = :complaint_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':complaints_dept', $info->getcomplaints_dept());
        $statement->bindValue(':complaint_category',$info->getcomplaint_category());
        $statement->bindValue(':complaint_sub_category',$info->getcomplaint_sub_category());
        $statement->bindValue(':complaint_desc', $info->complaint_desc());
        $statement->bindValue(':complaint_img',$info->getcomplaint_img());
        $statement->bindValue(':complaint_id',$complaint_id);
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();
    }


}