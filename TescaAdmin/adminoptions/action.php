<?php

require_once 'Classes/UserDB.php';
require_once 'Classes/Users.php';
require_once 'Classes/ApartmentDB.php';
require_once 'Classes/Apartment.php';
require_once 'Classes/DepartmentDB.php';
require_once 'Classes/Department.php';
require_once 'Classes/AssetDB.php';
require_once 'Classes/Asset.php';
require_once 'Classes/DocumentDB.php';
require_once 'Classes/Document.php';
require_once 'Classes/FeedbackDB.php';
require_once 'Classes/Feedback.php';
require_once 'Classes/AnnouncementDB.php';
require_once 'Classes/Announcement.php';
require_once 'Classes/Sessions.php';
require_once 'Classes/SessionsDB.php';
require_once 'Classes/ReportDB.php';
require_once 'Classes/Complaints.php';
require_once 'Classes/ComplaintsDB.php';
require_once 'Classes/validation/gump.class.php';

$validate = new GUMP();

$_POST = $validate->sanitize($_POST);
 
$value=$_POST['forminstance'];

if ($value=='loginform')
{
	header('Content-Type: application/json');
	$user_Name = $_POST['username'];
    $password = $_POST['password'];
	
	if(isset($_POST['remmechkbx']))
	{
		$remmechkbx = $_POST['remmechkbx'];
	}
	else
	{
		$remmechkbx = "off";
	}
	
	$validate->validation_rules(array(
		'username'    => 'required|alpha_numeric|max_len,10|min_len,1',
		'password'    => 'required|alpha_numeric|max_len,8|min_len,4',
	));

	$validate->filter_rules(array(
		'username'    => 'trim|sanitize_string',
		'password'   => 'trim|sanitize_string',
	));

	$validated_data = $validate->run($_POST);

	if($validated_data === false) {
		$status = $validate->get_readable_errors(true);
	} 
	else {
		// validation successful
		$login = new Sessions($user_Name, $password, $remmechkbx);
		$status = SessionsDB::login($login);
	}
	echo json_encode($status);
}
else if ($value=='fpadminform') {
    header('Content-Type: application/json');
	$email = $_POST['fpemail'];
	
	/*$validate->validation_rules(array(
		'fpemail'       => 'required|valid_email'
	));

	$validate->filter_rules(array(
		'fpemail'    => 'trim|sanitize_email',
	));

	$validated_data = $validate->run($_POST);

	if($validated_data === false) {
		$status = $validate->get_readable_errors(true);
	} 
	else {*/
    // validation successful
    $status = SessionsDB::forgotPassword($email);
    //}
    echo $status;
    //echo $status;
}
else if ($value=='logoutform')
{
    $status = SessionsDB::logout();
    echo json_encode($status);
}
else if ($value=='contactform')
{
	header('Content-Type: application/json');
	$name = $_POST['name'];
    $email = $_POST['email'];
	$contact = $_POST['contact'];
	$message = $_POST['message'];


	$validate->validation_rules(array(
		'name'    => 'required|max_len,50|min_len,1',
		'email'       => 'required|valid_email',
		'contact' => 'required|phone_number',
		'message' => 'required'
	));

	$validate->filter_rules(array(
		'name'    => 'trim|sanitize_string',
		'email'   => 'trim|sanitize_email',
		'contact' => 'trim|sanitize_string',
		'message' => 'trim|sanitize_string'
	));

	$validated_data = $validate->run($_POST);

	if($validated_data === false) {
		$status = $validate->get_readable_errors(true);
	} 
	else {
	 // validation successful

		$feedback = new Feedback($name,"-",$email,$contact,$message);
		$status = FeedbackDB::insertRecord($feedback);
	}

	echo json_encode($status);

}
else if($value=='displayuserdata')
{
	header('Content-Type: application/json');
    $status = UserDB::getUserData();
    echo json_encode($status);
}
else if($value=='insertuser')
{
    $first_Name = $_POST['fname'];
    $middle_Name = $_POST['mname'];
    $last_Name = $_POST['lname'];
    $home_Phone= $_POST['hphone'];
    $alternate_Phone =  $_POST['aphone'];
    $cell_Phone = $_POST['cphone'];
    $email = $_POST['email'];
    $address_Line1 = $_POST['aline1'];
    $address_Line2 = $_POST['aline2'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $user_Name = $_POST['uname'];
    $password = $_POST['password'];
    $is_Active = $_POST['active'];
    $user_Category = $_POST['ucategory'];
    //var_dump($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category);
    //var_dump($first_Name);
    $us =new Users($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category);
    $status = UserDB::insertRecord($us);
    
    if($status === true){
        UserDB::sendEmail($first_Name,$last_Name,$email,$user_Name,$password);
    }
	
	echo $status;
}
else if($value=='displayaptdata')
{
	header('Content-Type: application/json');
    $status = ApartmentDB::getApartmentData();
    echo json_encode($status);
}
elseif ($value == 'insertapartment')
{
    $apt_number = $_POST['anumber'];
    $aptstatus = $_POST['aptstatus'];
    //var_dump($apt_number,$aptstatus);
    $apt = new Apartment($apt_number,$aptstatus);
    $status = ApartmentDB::insertRecord($apt);
    echo $status;

}
else if($value=='displayaptuserdata')
{
	header('Content-Type: application/json');
    $status = ApartmentDB::getAptUserData();
    echo json_encode($status);
}
else if($value=='insertaptuser')
{
    $apt_id = $_POST['aptid'];
    $user_id = $_POST['userid'];
    $leasestart = $_POST['leasestdt'];
    $leaseend = $_POST['leaseenddt'];
    $isactive = $_POST['isactivetenant'];
    //var_dump($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category);
    //var_dump($first_Name);
    $status = UserDB::insertLease($apt_id,$user_id,$leasestart,$leaseend,$isactive);
	echo $status;
}
else if($value=='displaydeptdata')
{
	header('Content-Type: application/json');
    $status = DepartmentDB::getDepartmentData();
    echo json_encode($status);
}
elseif ($value == 'insertdepartment')
{
    $dept_name = $_POST['dname'];
    $dept_desc = $_POST['desc'];
    //var_dump($apt_number,$aptstatus);
    $dpt = new Department($dept_name,$dept_desc);
    $status = DepartmentDB::insertRecord($dpt);
    echo $status;

}
else if($value=='displayassetsdata')
{
	header('Content-Type: application/json');
    $status = AssetDB::getAssetsData();
    echo json_encode($status);
}
elseif ($value == 'insertasset')
{
    $atype=$_POST['atype'];
    $aname=$_POST['aname'];
    $aquantity=$_POST['aquantity'];
    $pdate=$_POST['pdate'];
    $vname=$_POST['vname'];
    $uprice=$_POST['uprice'];
    $unit=$_POST['unit'];
    //var_dump($apt_number,$aptstatus);
    $ast = new Asset($atype,$aname,$aquantity,$pdate,$vname,$uprice,$unit);
    $status = AssetDB::insertRecord($ast);
    echo $status;

}
elseif ($value == 'insertdocument')
{
    $dname=$_POST['docname'];
    $dtype=$_POST['dtype'];
    $uid=$_POST['uid'];
    $aid=$_POST['aid'];
    //var_dump($apt_number,$aptstatus);
    $d=new Document($dname,$dtype,$uid,$aid);
    $status = DocumentDB::insertRecord($d);
    echo $status;

}
elseif($value == 'displayfeedbackdata')
{
    header('Content-Type: application/json');
    $status = FeedbackDB::getFeedBackData();
    echo json_encode($status);
}
elseif ($value == 'insertfeedback')
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $cnumber=$_POST['cnumber'];
    $fdesc=$_POST['fdesc'];
    //var_dump($apt_number,$aptstatus);
    $f=new Feedback($fname,$lname,$email,$cnumber,$fdesc);
    $status = FeedbackDB::insertRecord($f);
    echo $status;

}
elseif($value == 'displaycomplaintsdata')
{
    header('Content-Type: application/json');
    $status = ComplaintsDB::getComplaintsData();
    echo json_encode($status);
}
elseif($value == 'closecomplaint')
{
    $cmpid=$_POST['cmpid'];
    
    $status = ComplaintsDB::updateComplaintById($cmpid);
    
    echo $status;
}
elseif($value == 'deletecomplaint')
{
    $cmpid=$_POST['cmpid'];
    $status = ComplaintsDB::deleteComplaintById($cmpid);
    
    echo $status;
}
else if($value=='displayanncdata')
{
	header('Content-Type: application/json');
    $status = AnnouncementDB::getAnnouncementsData();
    echo json_encode($status);
}
elseif ($value == 'insertannouncement')
{
    $atype=$_POST['atype'];
    $adesc=$_POST['adesc'];
    $userid="1";
    //var_dump($atype,$adesc,$userid);
    $announce=new Announcement($atype,$adesc,$userid);
    $status = AnnouncementDB::insertRecord($announce);
    echo $status;

}
elseif ($value == 'updateuser')
{
    header('Content-Type: application/json');
    $userid=$_POST['userid'];
    $usr= UserDB::getUserDataById($userid);
    echo json_encode($usr);
}
elseif ($value == 'deleteuser')
{
    $userid=$_POST['userid'];
    $status = UserDB::deleteRecord($userid);
    echo $status;    
}
elseif($value == 'updateuserbtnclciked' ){

    $userid = $_POST['uid'];
    $first_Name = $_POST['fname'];
    $middle_Name = $_POST['mname'];
    $last_Name = $_POST['lname'];
    $home_Phone= $_POST['hphone'];
    $alternate_Phone =  $_POST['aphone'];
    $cell_Phone = $_POST['cphone'];
    $email = $_POST['email'];
    $address_Line1 = $_POST['aline1'];
    $address_Line2 = $_POST['aline2'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $user_Name = $_POST['uname'];
    $password = $_POST['password'];
    $is_Active = $_POST['active'];
    $user_Category = $_POST['ucategory'];
    //var_dump($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category);
    //var_dump($first_Name);
    $us =new Users($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category);
    $status = UserDB::updateRecord($us,$userid);
    echo $status;

}
elseif($value == 'deleteapt'){
    $apt_id = $_POST['aptid'];
    $status = ApartmentDB::deleteRecord($apt_id);
    echo $status;
}
elseif($value == 'updateapt'){
    header('Content-Type: application/json');
    $apt_id = $_POST['aptid'];
    $apt= ApartmentDB::getApartmentDataById($apt_id);
    //var_dump($apt);
    echo json_encode($apt);
}
elseif($value == 'updateapartmentbtnclicked'){
    $apt_id = $_POST['aptid'];
    $apt_number = $_POST['anumber'];
    $aptstatus = $_POST['aptstatus'];
    //var_dump($apt_number,$aptstatus);
    $apt = new Apartment($apt_number,$aptstatus);
    $status = ApartmentDB::updateRecord($apt,$apt_id);
    echo $status;
}
elseif($value == 'deletedept'){
    $dept_id = $_POST['deptid'];
    $status = DepartmentDB::deleteRecord($dept_id);
    echo $status;
}
elseif($value == 'updatedept')
{
    header('Content-Type: application/json');
    $dept_id = $_POST['deptid'];
    $dpt= DepartmentDB::getDepartmentDataById($dept_id);
    echo json_encode($dpt);
}
elseif($value == 'updatedepartmentbtnclicked')
{
    $dept_id = $_POST['dept_id'];
    $dept_name = $_POST['dname'];
    $dept_desc = $_POST['desc'];
    //var_dump($apt_number,$aptstatus);
    $dpt = new Department($dept_name,$dept_desc);
    $status = DepartmentDB::updateRecord($dpt,$dept_id);
    echo $status;
}
elseif($value == 'deleteasset'){
    $asset_id = $_POST['assetid'];
    $status = AssetDB::deleteRecord($asset_id);
    echo $status;
}
elseif($value == 'updateasset')
{
    header('Content-Type: application/json');
    $asset_id = $_POST['assetid'];
    $ast= AssetDB::getAssetsDataById($asset_id);
    echo json_encode($ast);

}
elseif($value == 'updateassetbtnclicked')
{
    $asset_id = $_POST['asset_id'];
    $atype=$_POST['atype'];
    $aname=$_POST['aname'];
    $aquantity=$_POST['aquantity'];
    $pdate=$_POST['pdate'];
    $vname=$_POST['vname'];
    $uprice=$_POST['uprice'];
    $unit=$_POST['unit'];
    //var_dump($apt_number,$aptstatus);
    $ast = new Asset($atype,$aname,$aquantity,$pdate,$vname,$uprice,$unit);
    $status = AssetDB::updateRecord($ast,$asset_id);
    //var_dump($status);
    echo $status;

}
elseif($value == 'deleteannouncement')
{
    $annc_id = $_POST['announce_id'];
    $status = AnnouncementDB::deleteRecord($annc_id);
    echo $status;
}
elseif($value == 'updateannouncement'){
    header('Content-Type: application/json');
    $annc_id = $_POST['announce_id'];
    $ast= AnnouncementDB::getAnnouncementsDataById($annc_id);
    echo json_encode($ast);
}
elseif($value == 'updateannouncementbtnclicked')
{
    $announcement_id = $_POST['announcement_id'];
    $atype=$_POST['atype'];
    $adesc=$_POST['adesc'];
    $userid=$_POST['uid'];
    //var_dump($atype,$adesc,$userid);
    $announce=new Announcement($atype,$adesc,$userid);
    $status = AnnouncementDB::updateRecord($announce,$announcement_id);
    echo $status;
}
elseif($value == 'aptownhistrpt')
{
	//header('Content-Type: application/json');
	$fromdt = $_POST['fromdt'];
	$todt = $_POST['todt'];
	$iscurrtenant = $_POST['currenttenant'];
	$rptfmt = $_POST['rptformat'];
	
	$status = ReportDB::getAptOwnHistRpt($fromdt,$todt,$iscurrtenant,$rptfmt);
	
	echo $status;
}
