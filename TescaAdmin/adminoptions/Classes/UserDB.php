<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
// Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;
require_once 'Databases.php';
require_once 'Users.php';
require 'vendor/autoload.php';

class UserDB
{
    public static function insertRecord($info){
       
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO users
                 (first_name, middle_name, last_name, home_phone, alternate_phone, cell_phone, email, address_line1, address_line2, city, province, zipcode, country, user_name, password, is_active, user_category)
              VALUES
                 (:first_name,:middle_name,:last_name,:home_phone,:alternate_phone,:cell_phone,:email,:address_line1,:address_line2,:city,:province,:zipcode,:country,:user_name, :password,:is_active, :user_category)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':first_name', $info->getFirstName());
        $statement->bindValue(':middle_name',$info->getMiddleName());
        $statement->bindValue(':last_name',$info->getLastName());
        $statement->bindValue(':home_phone', $info->getHomePhone());
        $statement->bindValue(':alternate_phone',$info->getAlternatePhone());
        $statement->bindValue(':cell_phone',$info->getCellPhone());
        $statement->bindValue(':email',$info->getEmail());
        $statement->bindValue(':address_line1',$info->getAddressLine1());
        $statement->bindValue(':address_line2',$info->getAddressLine2());
        $statement->bindValue(':city',$info->getCity());
        $statement->bindValue(':province',$info->getProvince());
        $statement->bindValue(':zipcode',$info->getZipcode());
        $statement->bindValue(':country',$info->getCountry());
        $statement->bindValue(':user_name',$info->getUserName());
        $statement->bindValue(':password',md5($info->getPassword()));
        $statement->bindValue(':is_active',$info->getisActive());
        $statement->bindValue(':user_category',$info->getUserCategory());
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();

    }
    public static function getUserData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM users ORDER BY user_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $statement->closeCursor();
        return $users;
    }
    public static function getUserDataByCategory(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM users WHERE user_category = :ucat';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':ucat', "user");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement->closeCursor();
        return $users;
    }
    public static function updateRecord($info,$user_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE users SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, home_phone = :home_phone, alternate_phone = :alternate_phone, cell_phone = :cell_phone, email = :email, address_line1 = :address_line1, address_line2 = :address_line2, city = :city, province = :province, zipcode = :zipcode, country = :country, user_name = :user_name,  password = :password, is_active = :is_active, user_category = :user_category where user_id = :user_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':first_name', $info->getFirstName());
        $statement->bindValue(':middle_name',$info->getMiddleName());
        $statement->bindValue(':last_name',$info->getLastName());
        $statement->bindValue(':home_phone', $info->getHomePhone());
        $statement->bindValue(':alternate_phone',$info->getAlternatePhone());
        $statement->bindValue(':cell_phone',$info->getCellPhone());
        $statement->bindValue(':email',$info->getEmail());
        $statement->bindValue(':address_line1',$info->getAddressLine1());
        $statement->bindValue(':address_line2',$info->getAddressLine2());
        $statement->bindValue(':city',$info->getCity());
        $statement->bindValue(':province',$info->getProvince());
        $statement->bindValue(':zipcode',$info->getZipcode());
        $statement->bindValue(':country',$info->getCountry());
        $statement->bindValue(':user_name',$info->getUserName());
        $statement->bindValue(':password',md5($info->getPassword()));
        $statement->bindValue(':is_active',$info->getisActive());
        $statement->bindValue(':user_category',$info->getUserCategory());
        $statement->bindValue(':user_id',$user_id);
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();
    }
    public static function deleteRecord($user_id){
        $dbobj=Databases::getDB();
        
        $query = 'DELETE FROM users
                  WHERE user_id = :userid';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':userid', $user_id);
        if($statement->execute()){
			if(isset($_SESSION['uid']) && $_SESSION['uid'] == $user_id)
			{
				session_destroy();
				unset($_SESSION['uid']);
			}		
			$statement->closeCursor();
            return true;
        }
        else{
			$statement->closeCursor();
            return false;
        }
        
     
    }
    public static function sendEmail($first,$last,$eml,$user,$pass)
    {
        date_default_timezone_set('Etc/UTC');
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = gethostbyname('smtp.gmail.com');
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->AuthType = 'XOAUTH2';
        $mail->SMTPOptions = Array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' =>false,
                'allow_self_signed' => true
            )
        );
        $mail->Username = 'tesca.devs@gmail.com';                 // SMTP username
        $mail->Password = 'tesca@devs';                           // SMTP password
        $mail->SMTPSecure = 'ssl';
        $email = 'tesca.devs@gmail.com';
        $clientId = '1020688443441-m63gpn7hgm7tk49ss6t49ngnsp688ev8.apps.googleusercontent.com';
        $clientSecret = 'Uv3Q0IvZZqpzfY1LFNQmj0Ct';
        $refreshToken = '1/amp9hNBh4Y5keGJbrRC7JJElB09wbXWTyq1n0sB1KEc';
        $provider = new Google(
            [
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
            ]
        );
        $mail->setOAuth(
            new OAuth(
                [
                    'provider' => $provider,
                    'clientId' => $clientId,
                    'clientSecret' => $clientSecret,
                    'refreshToken' => $refreshToken,
                    'userName' => $email,
                ]
            )
        );
        $mail->setFrom($email, 'TESCA DEVELOPERS');
        $mail->addAddress($eml, $user);
        $mail->CharSet = 'utf-8';
        $mail->isHTML(true);
        $mail->Subject = 'USER REGISTRATION WITH TESCA MGT';
        $mail->Body    = '<b><p>Hello ' .$first.','.$last. '<br><br>Welcome to TESCA MANAGEMENT. Thank You for registering with us.<br>Your username is :'.$user.'<br>Your password is :'.$pass.'<br><br>Keep these credentials in order to login again.<br>Best,<br>Team Tesca Developers</p></b>';
        var_dump($mail->send());
    }
    public static function getUserDataById($userid){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM users where user_id = :user_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':user_id', $userid);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $users;
    }
    public static function insertLease($apt_id,$user_id,$leasestart,$leaseend,$isactive){
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO apt_ownership_history
                 (apt_id, user_id, date_lease_started,date_lease_ended, is_current_tenant)
              VALUES
                 (:apt_id,:user_id,:date_lease_started,:date_lease_ended,:is_current_tenant)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':apt_id', $apt_id);
        $statement->bindValue(':user_id',$user_id);
        $statement->bindValue(':date_lease_started',$leasestart);
        $statement->bindValue(':date_lease_ended',$leaseend);
        $statement->bindValue(':is_current_tenant',$isactive);
        if($statement->execute())
        {
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }

}