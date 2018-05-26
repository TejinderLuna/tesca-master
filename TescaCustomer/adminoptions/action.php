<?php
date_default_timezone_set("America/Toronto");

require_once 'Classes/UserDB.php';
require_once 'Classes/Users.php';
require_once 'Classes/AnnouncementDB.php';
require_once 'Classes/Sessions.php';
require_once 'Classes/SessionsDB.php';
require_once 'Classes/Parkingpermit.php';
require_once 'Classes/ParkingpermitDB.php';
require_once 'Classes/Payrent.php';
require_once 'Classes/PayrentDB.php';
require_once 'Classes/Existingtickets.php';
require_once 'Classes/ExistingticketsDB.php';
require_once 'Classes/Raisecomp.php';
require_once 'Classes/RaisecompDB.php';
require_once 'Classes/LastfiveDB.php';
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
else if ($value=='fpcustform') {
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
    echo json_encode($status);
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
//-------------------------------------------------------------------USER-----------------------------------------------------------------------------------
else if($value=='displayuserdata')
{
	header('Content-Type: application/json');
    $status = UserDB::getUserData();
    echo json_encode($status);
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
        $us =new Users($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1,
        $address_Line2, $city, $province, $zipcode, $country, $user_Name);
    $status = UserDB::updateRecord($us,$userid);
    echo $status;

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
    $us =new Users($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category);
    $status = UserDB::insertRecord($us);
    
    if($status === true){
        UserDB::sendEmail($first_Name,$last_Name,$email,$user_Name,$password);
    }
	
	echo $status;
}

//------------------------------------------------------------------------PARKING PERMIT------------------------------------------------------------------------
else if($value =='insertparkingpermit'){
    $ptype=$_POST['permittype'];
    $pname=$_POST['pname'];
    $validfrom=$_POST['validfrom'];
    $validuntill=$_POST['validuntill'];
    $validate->validation_rules(array(
        'pname'    => 'required|alpha_numeric|max_len,10|min_len,1',
        'validfrom'    => 'required',
        'validuntill'    => 'required'
    ));

    $validate->filter_rules(array(
        'pname'    => 'trim|sanitize_string'
    ));
    $validated_data = $validate->run($_POST);
    //var_dump($validated_data);
    if($validated_data === false) {
        $status = $validate->get_readable_errors(true);
        //var_dump($status);
        echo $status;
    }
    else{
        $pp = new Parkingpermit($ptype, $pname, $validfrom, $validuntill);
        $status = ParkingpermitDB::insertRecord($pp);
        echo $status;
    }
}
else if($value=='displayparkingpermit')
{
    header('Content-Type: application/json');
    $status = ParkingpermitDB::getParkingpermitData();
    echo json_encode($status);
}
elseif ($value == 'deletepermit')
{
    $permit_id=$_POST['permit_id'];
    $status = ParkingpermitDB::deleteRecord($permit_id);
    echo $status;
}
elseif ($value == 'updatepermit')
{
    header('Content-Type: application/json');
    $permit_id=$_POST['permit_id'];
    $usr= ParkingpermitDB::getPermitById($permit_id);
    echo json_encode($usr);
}
elseif($value == 'updatepermitbtnclciked' ){

    $permit_id = $_POST['permit_id'];
    $pname = $_POST['pname'];
    $pissue = $_POST['pissue'];
    $ptype = $_POST['ptype'];
    $validfrom= $_POST['validfrom'];
    $validuntill =  $_POST['validuntill'];
   // $userid = $_POST['permit_holder_user_id'];
    //$issueid = $_POST['permit_issued_by_user_id'];

    $us =new Parkingpermit($ptype, $pname, $validfrom, $validuntill, $pissue);
    $status = ParkingpermitDB::updateRecord($us,$permit_id);
    echo $status;

}
//-----------------------------------------------------PAY RENT---------------------------------------------------------------------------------------

else if($value=='payrentdata'){

    $rent_for_month=$_POST['month'];
    $rent_amount=$_POST['amount'];
    $aptid = $_POST['aptid'];
    $payment_method=$_POST['rentradios'];
    $validate->validation_rules(array(
        'amount'    => 'required'
    ));

    $validate->filter_rules(array(
        'amount'    => 'trim|sanitize_string'
    ));

    $validated_data = $validate->run($_POST);

    if($validated_data === false) {
        $status = $validate->get_readable_errors(true);
        echo $status;
    }
    else {
        $pr = new Payrent($rent_for_month, $rent_amount, $aptid, $payment_method);
        $status = PayrentDB::insertRecord($pr);
        echo $status;
    }
}

//-----------------------------------------------------------Announcement------------------------------------------------------------------------------

else if($value=='displayanncdata')
{
	header('Content-Type: application/json');
    $status = AnnouncementDB::getAnnouncementsData();
    echo json_encode($status);
}

//-------------------------------------------------------------LAST 5 RENT-------------------------------------------------------------------------------

else if($value=='displaylastfivedata')
{
    header('Content-Type: application/json');
    $status = LastfiveDB::getLastfiveData();
    echo json_encode($status);
}
//--------------------------------------------------------Raise Complaint-------------------------------------------------------------------------------

else if($value=='insertraisecomplaint'){
    $user_id = $_SESSION['uid'];
    $complaints_dept=$_POST['department'];
    $complaint_category=$_POST['category'];
    $complaint_apt_id=$_POST['aptid'];
    $complaint_desc=$_POST['cdesc'];



    if(isset($_FILES['cimg']) && $_FILES['cimg']['size'] != 0){

        $errors= array();
        $file_name = $_FILES['cimg']['name'];
        $file_size =$_FILES['cimg']['size'];
        $file_tmp =$_FILES['cimg']['tmp_name'];
        $file_type=$_FILES['cimg']['type'];
        $file_ext=explode('.',$file_name);
        $file_ext = end($file_ext);

        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 5242880){
            $errors[]='File size must be less than 5 MB';
        }

        $complaint_img = strtolower($user_id."_".$complaint_apt_id."_".date("Ymd_His").".".$file_ext);
    }
    else {
        $complaint_img = "noimgavailable.jpg";
    }
    /* $date_created=$_POST['permittype'];
    $date_modified=$_POST['pname'];
    $complaint_status=$_POST['validfrom'];*/

    $rc= new Raisecomp($user_id,$complaints_dept,$complaint_category,$complaint_apt_id,$complaint_desc,$complaint_img);
    $status = RaisecompDB::insertRecord($rc);
    //echo $status;
    if($status)
    {
            move_uploaded_file($file_tmp,"../../TescaAdmin/adminoptions/uploads/".$complaint_img);
            header("Location: raisecomplaint.php?result=success");
    }
    else{
        header("Location: raisecomplaint.php?result=failure");
    }
}




//--------------------------------------------------------Existing Tickets------------------------------------------------------------------------------

else if($value=='displayexistingtickets')
{
    header('Content-Type: application/json');
    $status = ExistingticketsDB::getData();
    echo json_encode($status);
}
elseif ($value == 'deleteexistingticket')
{
    $complaint_id=$_POST['complaint_id'];
    $status = ExistingticketsDB::deleteRecord($complaint_id);
    echo $status;
}
elseif ($value == 'updateexistingticket')
{
    header('Content-Type: application/json');
    $complaint_id=$_POST['complaint_id'];
    $usr= ExistingticketsDB::getExistingById($complaint_id);
    echo json_encode($usr);
}
elseif($value == 'updateexistingticketdata' ){

    $complaints_dept = $_POST['department'];
    $complaint_category = $_POST['category'];
    $complaint_sub_category = $_POST['sub-category'];
    $complaint_desc = $_POST['cdesc'];
    $complaint_img= $_POST['cimg'];
    $cid=$_POST['complaint_id'];

    $us =new Existingtickets($complaints_dept, $complaint_category, $complaint_sub_category, $complaint_desc, $complaint_img);
    $status = ExistingticketsDB::updateRecord($us,$cid);
    echo $status;

}
elseif($value == 'changepassword')
{
    $oldpass =md5($_POST['oldpassword']);
    $newpass = md5($_POST['newpassword']);
    $cpass = md5($_POST['cpassword']);
    $validate->validation_rules(array(
        'oldpassword'    => 'required|alpha_numeric|max_len,20|min_len,5',
        'newpassword'    => 'required|alpha_numeric|max_len,20|min_len,5',
        'cpassword'    => 'required|alpha_numeric|max_len,20|min_len,5'
    ));

    $validate->filter_rules(array(
        'oldpassword'    => 'trim|sanitize_string',
        'newpassword'   => 'trim|sanitize_string',
        'cpassword'   => 'trim|sanitize_string'
    ));

    $validated_data = $validate->run($_POST);

    if($validated_data === false) {
        $status = $validate->get_readable_errors(true);
        header("Location: changepassword.php?result=".$status);
    }
    else if($newpass == $cpass) {
        $status = UserDB::updateRecord($oldpass, $newpass);
        if($status)
        {
            header("Location: changepassword.php?result=success");
        }
        else
        {
            header("Location: changepassword.php?result=failure");
        }
    }
    elseif($newpass != $cpass)
    {
        header("Location: changepassword.php?result=notmatched");
    }
}















