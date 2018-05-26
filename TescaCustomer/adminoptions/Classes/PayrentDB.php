<?php
require_once 'Databases.php';
require_once 'Payrent.php';

class PayrentDB
{
    public static function insertRecord($info){

        $dbobj=Databases::getDB();
        $query = 'INSERT INTO rental_payment_details
                 (apt_id,user_id,payment_month,payment_mode,payment_amt)
              VALUES
                 (:apt_id,:user_id,:payment_month,:payment_mode,:payment_amt)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':apt_id', $info->getAptid());
        $statement->bindValue(':user_id',$_SESSION['uid']);
        $statement->bindValue(':payment_month',$info->getRentForMonth());
        $statement->bindValue(':payment_mode',$info->getPaymentMethod());
        $statement->bindValue(':payment_amt',$info->getRentAmount());
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