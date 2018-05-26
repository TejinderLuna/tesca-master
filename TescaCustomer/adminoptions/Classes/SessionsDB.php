<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
// Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;
//Load composer's autoloader
require 'vendor/autoload.php';
require_once 'Databases.php';
require_once 'Sessions.php';

class SessionsDB
{
    public static function login($info){
        
        $dbobj=Databases::getDB();
        $query = 'SELECT * from users where user_name = :username AND password = :password AND is_active= :is_active AND user_category = :user_category';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':username', $info->getUsername());
        $statement->bindValue(':password',$info->getPassword());
		$statement->bindValue(':is_active',1);
        $statement->bindValue(':user_category',"user");
		
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
		$statement->closeCursor();
		if(sizeof($result) == 1)
		{	
			if($info->getRemmechkbx() == "on")
			{
				setcookie("unameremme",$info->getUsername(),time() + (10 * 364 * 24 * 60 * 60),"/");
			}
			else
			{
				setcookie("unameremme","",time() - 3600,"/");
			}
			
			foreach($result as $results)
			{
				$_SESSION['uid'] = $results->user_id;
				$_SESSION['uname'] = $results->user_name;
				$_SESSION['fname'] = $results->first_name;
			}
			
            return $_SESSION;
        }
        else{
            return false;
        }
        
    }
	public function is_loggedin()
   {
      if(isset($_SESSION['uid']))
      {
         return true;
      }
	  else
	  {
		  return false;
	  }
   }
   
   public function redirect()
   {
		header("Location: http://".$_SERVER['SERVER_NAME']."/tescaphp/");
   }
   
   public static function logout()
   {
		session_destroy();
		unset($_SESSION['uid']);
		unset($_SESSION['uname']);
		unset($_SESSION['fname']);
		
		return true;
   }
   
   public static function forgotPassword($email)
   {
        $dbobj=Databases::getDB();
        $query = 'SELECT * from users where email = :email AND is_active= :is_active';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':email', $email);
		$statement->bindValue(':is_active',1);
        
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
		$statement->closeCursor();
		if(sizeof($result) >= 1)
		{
		    $length = 6;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }


			$query = 'UPDATE users set password = :password WHERE email = :email';
			$statement = $dbobj->prepare($query);
			$statement->bindValue(':password',md5($randomString));
			$statement->bindValue(':email', $email);
			if($statement->execute())
			{
			    $st = SessionsDB::sendEmail($email,$randomString);
			}
           return true;
        }
       else
       {
          return false;
       }

   }
   public static function sendEmail($eml,$pass)
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
       $mail->addAddress($eml, "USER");
       $mail->CharSet = 'utf-8';
       $mail->isHTML(true);
       $mail->Subject = 'Password RESET performed';
       $mail->Body    = '<b>Hello there!!<br>your Password has been reset to ' .$pass. '. Please use this password for future reference <br>THANKYOU!!<br>TESCA Apartment Management</b>';
       if($mail->send())
       {return true;}
       else
       {return false;}
   }
}