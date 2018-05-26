<?php

class ComplaintsDB
{
    public static function getComplaintsData(){
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
				  ORDER BY cmp.date_created desc, cmp.complaint_id asc';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $complaints = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $complaints;
    }
   
    public static function updateComplaintById($cmpid){
        $dbobj=Databases::getDB();
        $query = 'UPDATE complaints 
				  SET complaint_status = :cmp_status
				  WHERE complaint_id = :cmp_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':cmp_status', "closed");
        $statement->bindValue(':cmp_id',$cmpid);
		
		if($statement->execute()){
			$statement->closeCursor(); 
            return true;
        }
        else{
			$statement->closeCursor();
            return false;
        }
    }
	public static function deleteComplaintById($cmpid){
        $dbobj=Databases::getDB();
        $query = 'DELETE FROM complaints WHERE complaint_id = :cmp_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':cmp_id',$cmpid);
		
		if($statement->execute()){
			$statement->closeCursor(); 
            return true;
        }
        else{
			$statement->closeCursor();
            return false;
        }
    }
}