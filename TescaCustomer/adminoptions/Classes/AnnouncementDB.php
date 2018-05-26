<?php
require_once 'Databases.php';
class AnnouncementDB
{

	public static function getAnnouncementsData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM announcements ORDER BY announcement_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $annoucements = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $annoucements;
    }
}