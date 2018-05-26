<?php
require_once 'Databases.php';

class ReportDB
{
    public static function getAptOwnHistRpt($fromdt,$todt,$iscurrtenant,$rptfmt){
        
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-type:   application/x-msexcel; charset=utf-8");
		header("Content-Disposition: attachment; filename=AptOwnHist-Report.xls"); 
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		
		$dbobj=Databases::getDB();
        
		$query = 'SELECT a.ownership_history_id, 
						apt.apt_number, 
						u.first_name, 
						u.last_name, 
						a.date_lease_started, 
						a.date_lease_ended, 
						a.is_current_tenant  
						FROM apt_ownership_history AS a 
							INNER JOIN users as u 
								ON a.user_id = u.user_id 
						INNER JOIN apartments as apt 
								ON apt.apt_id = a.apt_id 
						WHERE date_lease_started >= :date_lease_started 
							AND 
								date_lease_ended <= :date_lease_ended 
							AND 
								is_current_tenant = :is_current_tenant';
        
		$statement = $dbobj->prepare($query);
		
        $statement->bindValue(':date_lease_started', $fromdt);
        $statement->bindValue(':date_lease_ended',$todt);
        $statement->bindValue(':is_current_tenant',$iscurrtenant);
		$statement->execute();
        
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
		$statement->closeCursor();
		
		
		return $result;
       
    }

}