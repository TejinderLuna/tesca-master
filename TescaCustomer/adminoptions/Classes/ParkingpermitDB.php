<?php
require_once 'Databases.php';
require_once 'Parkingpermit.php';
class parkingpermitDB
{
    public static function insertRecord($info){

        $dbobj=Databases::getDB();
        $query = 'INSERT INTO parking_permits
                 (permit_type,permit_holder_user_id,permit_holder_name,permit_valid_from_date,
                 permit_valid_till_date)
              VALUES
                 (:ptype,:uid,:pname,:validfrom,:validuntill)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':ptype', $info->getptype());
        $statement->bindValue(':uid',$_SESSION['uid']);
        $statement->bindValue(':pname',$info->getpname());
        $statement->bindValue(':validfrom', $info->getvalidfrom());
        $statement->bindValue(':validuntill',$info->getvaliduntill());
        if($statement->execute()){
                   return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();
    }
    public static function updateRecord($info,$permit_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE parking_permits SET permit_type = :ptype, permit_holder_name = :pname, 
permit_valid_from_date = :validfrom, permit_valid_till_date = :validuntill, permit_issue_date = :pissue
   where permit_id = :permit_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':pname', $info->getpname());
        $statement->bindValue(':validfrom',$info->getvalidfrom());
        $statement->bindValue(':validuntill',$info->getvaliduntill());
        $statement->bindValue(':pissue', $info->getpissue());
        $statement->bindValue(':ptype',$info->getptype());
        $statement->bindValue(':permit_id',$permit_id);
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();
    }
    public static function getParkingpermitData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM parking_permits ORDER BY permit_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $permits = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $permits;
    }
    public static function deleteRecord($permit_id){
        $dbobj=Databases::getDB();
        $query = 'DELETE FROM parking_permits
                  WHERE permit_id = :permit_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':permit_id', $permit_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }
    }
    public static function getPermitById($permit_id){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM parking_permits where permit_id = :permit_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':permit_id', $permit_id);
        $statement->execute();
        $permit= $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $permit;
    }
}