<?php
require_once 'Databases.php';
require_once 'Raisecomp.php';

class RaisecompDB
{
    public static function insertRecord($info){

        $dbobj=Databases::getDB();
        $query = 'INSERT INTO complaints
                 (user_id,apt_id,complaints_dept,complaint_severity,complaint_desc,
                 complaint_img)
              VALUES
                 (:userid,:aptid,:complaints_dept,:complaint_severity,:complaint_desc,:complaint_img)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':userid', $info->getUserId());
        $statement->bindValue(':aptid', $info->getcomplaint_apt_id());
        $statement->bindValue(':complaints_dept', $info->getcomplaints_dept());
        $statement->bindValue(':complaint_severity',$info->getcomplaint_category());
        $statement->bindValue(':complaint_desc', $info->getcomplaint_desc());
        $statement->bindValue(':complaint_img',$info->getcomplaint_img());
       /* $statement->bindValue(':date_created',$info->getdate_created());
        $statement->bindValue(':date_modified', $info->getdate_modified());
        $statement->bindValue(':complaint_status',$info->getcomplaint_status());*/
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();

    }
    public static function getApartmentIds()
    {
        $dbobj=Databases::getDB();
        $query = 'SELECT oh.ownership_history_id, 
                         apt.apt_id, 
                         apt.apt_number, 
                         users.user_id, 
                         users.first_name, 
                         users.last_name, 
                         oh.date_lease_started, 
                         oh.date_lease_ended 
                   FROM  apt_ownership_history as oh 
                   INNER JOIN apartments as apt 
                          ON oh.apt_id = apt.apt_id 
                   INNER JOIN users 
                          ON users.user_id = oh.user_id 
                   WHERE oh.is_current_tenant = 1 
                          AND users.user_id = :uid';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':uid', $_SESSION['uid']);
        $statement->execute();
        $ids= $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $ids;
    }

}