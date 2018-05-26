<?php

require_once '../Classes/Databases.php';
require_once '../Classes/SessionsDB.php';

//Load composer's autoloader
require '../Classes/vendor/autoload.php';

$isLoggedIn = new SessionsDB();
    
if(!$isLoggedIn->is_loggedin())
{
	$isLoggedIn->redirect();	
}

date_default_timezone_set("America/Toronto");


$rptfmt = $_POST['rptformat'];

$fromdt = $_POST['fromdt'];
$todt = $_POST['todt'];
$iscurrtenant = $_POST['currenttenant'];

		
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

		
	
	
	
	$tableheader = '<table border="1">
	<tr>
		<td colspan="7"><center>Apartment Ownership History Report</center></td>
	</tr>
	<tr>
		<td>Lease Starting From :</td>
		<td>'.$fromdt.'
	</tr>
	<tr>
		<td>Lease Ending On :</td>
		<td>'.$todt.'
	</tr>
	<tr>
	<td colspan="7"> </td>
	</tr>
		
					<tr>
						<td>Ownership History ID</td>
						<td>Apartment Number</td>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Lease Start Date</td>
						<td>Lease End Date</td>
						<td>Active Tenant?</td>
					<tr>	';
					
	if (sizeof($result) > 0) 
	{
		$displaydata = "";
			for($i=0;$i<sizeof($result);$i++) {
			
			$displaydata .= '
				<tr>
					<td>'.$result[$i]['ownership_history_id'].'</td>
					<td>'.$result[$i]['apt_number'].'</td>
					<td>'.$result[$i]['first_name'].'</td>
					<td>'.$result[$i]['last_name'].'</td>
					<td>'.$result[$i]['date_lease_started'].'</td>
					<td>'.$result[$i]['date_lease_ended'].'</td>';
					
					if($result[$i]['is_current_tenant'] == 1){
						$displaydata.='<td>Yes</td>';
					}
					else {
						$displaydata.='<td>No</td>';
					}

				$displaydata.='</tr>';
			}
				
	}
	else {
			$displaydata = "<tr><td colspan='7'><strong><center>No Records found</center></strong></td></tr>";
	}

	$tablefooter = '
			<tr>
				<td colspan="7"> </td>
			</tr>
			<tr>
				<td colspan="7"><center>*** End of Report ***</center></td>
			<tr>
			<tr>
				<td colspan="7"><center>Report Generated by '.$_SESSION['fname'].' on : '.date("Y-m-d H:i:s").'</center></td>
			</tr>
			</table>'; 
		

if($rptfmt == "excel") {


header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-type: application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=AptOwnHist-Report.xls"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);


		
		
		echo "<html>";

		echo "<body>";
			
			echo $tableheader.$displaydata.$tablefooter;

		echo "</body>";

		echo "</html>";

}
else {
	
		
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->setFooter('Page {PAGENO} of {nb}');
	$mpdf->WriteHTML("<html> <body> ".$tableheader.$displaydata.$tablefooter."</body> </html>");
	$mpdf->Output('AptOwnHist-Report.pdf',\Mpdf\Output\Destination::DOWNLOAD);
	
}

?>