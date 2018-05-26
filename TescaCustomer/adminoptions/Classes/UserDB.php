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


    public static function updateRecord($oldpass,$newpass){
        $dbobj=Databases::getDB();
        $query = 'UPDATE users SET password = :password where user_id = :user_id AND password = :oldpassword';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':password', $newpass);
        $statement->bindValue(':user_id',$_SESSION['uid']);
        $statement->bindValue(':oldpassword',$oldpass);
        if($statement->execute()){
            if($statement->rowCount() != 0){
                return true;
            }
            else{
                return false;
            }
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
        //var_dump($products);
        $statement->closeCursor();
        return $users;
    }
    public static function sendEmail($first,$last,$eml,$user,$pass)
    {
        date_default_timezone_set('Etc/UTC');
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
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
        $mail->Body    = '<b><p>Hello ' .$first.','.$last. '<br>welcome to TESCA MANAGEMENT thankyou for registering with us.<br>your username is :'.$user.'<br>and ur password is :'.$pass.'<br>keep this credentilals in order to login again<br>thankyou<br>TESCA DEVELOPERS</p></b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
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

}