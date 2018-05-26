<?php
require_once 'Databases.php';
require_once 'Apartment.php';

class ApartmentDB
{
    public static function insertRecord($info){
        
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO apartments
                 (apt_number,apt_status)
              VALUES
                 (:apt_number, :apt_status)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':apt_number', $info->getAptNumber());
        $statement->bindValue(':apt_status',$info->getAptStatus());
        if($statement->execute()){
			$statement->closeCursor();
            return true;
        }
        else{
			$statement->closeCursor();
            return false;
        }
        
    }
    public static function deleteRecord($apart_id){
        $dbobj=Databases::getDB();
        
        $query = 'DELETE FROM apartments
                  WHERE apt_id = :apt_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':apt_id', $apart_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }
    }
    public static function updateRecord($info,$apart_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE apartments SET apt_number = :apt_number,apt_status = :apt_status where apt_id = :apt_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':apt_number', $info->getAptNumber());
        $statement->bindValue(':apt_status',$info->getAptStatus());
        $statement->bindValue(':apt_id',$apart_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }
    public static function getApartmentData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM apartments ORDER BY apt_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $apts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $statement->closeCursor();
        return $apts;
    }
    public static function getApartmentDataById($aptid){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM apartments where apt_id = :apt_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':apt_id', $aptid);
        $statement->execute();
        $apts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $statement->closeCursor();
        return $apts;
    }
	public static function getAptUserData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT oh.ownership_history_id, 
						 apt.apt_number, 
						 users.first_name, 
						 users.last_name, 
						 oh.date_lease_started, 
						 oh.date_lease_ended, 
						 oh.is_current_tenant, 
						 oh.date_created, 
						 oh.date_modified 
						 FROM apt_ownership_history AS oh 
							INNER JOIN apartments as apt 
								ON oh.apt_id = apt.apt_id 
							INNER JOIN users 
								ON oh.user_id = users.user_id
						 ORDER BY oh.ownership_history_id desc';
								
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $apts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $apts;
    }
}