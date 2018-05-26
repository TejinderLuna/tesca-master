<?php
require_once 'Databases.php';
require_once 'Announcement.php';

class AnnouncementDB
{
    public static function insertRecord($info){
        
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO announcements
                 (announcement_type,announcement_desc,announcement_by_user_id)
              VALUES
                 (:announcement_type,:announcement_desc,:announcement_by_user_id)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':announcement_type', $info->getAnnouncementType());
        $statement->bindValue(':announcement_desc',$info->getAnnouncementDesc());
        $statement->bindValue(':announcement_by_user_id',$info->getAnnouncementByUserId());
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();
    }
    public static function deleteRecord($announce_id){
        $dbobj=Databases::getDB();
        
        $query = 'DELETE FROM announcements
                  WHERE announcement_id = :announcement_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':announcement_id', $announce_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }
    }
    public static function updateRecord($info,$announce_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE announcements SET announcement_type = :announcement_type,announcement_desc = :announcement_desc,announcement_by_user_id = :announcement_by_user_id where announcement_id = :announcement_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':announcement_type', $info->getAnnouncementType());
        $statement->bindValue(':announcement_desc',$info->getAnnouncementDesc());
        $statement->bindValue(':announcement_by_user_id',$info->getAnnouncementByUserId());
        $statement->bindValue(':announcement_id',$announce_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }

	public static function getAnnouncementsData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM announcements ORDER BY announcement_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $annoucements = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $annoucements;
    }
    public static function getAnnouncementsDataById($annc_id){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM announcements where announcement_id = :announcement_id ';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':announcement_id',$annc_id);
        $statement->execute();
        $annoucements = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $annoucements;
    }
}