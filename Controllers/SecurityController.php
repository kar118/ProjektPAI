<?php
require_once 'AppController.php';
require_once 'Models/Address.php';
require_once 'Models/User.php';
require_once 'Models/Database.php';
require_once 'Models/Validation.php';

class SecurityController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function resetEmail()
    {
        return $this->render('resetEmail',[]);
    }

    public function resetPass()
    {
        return $this->render('resetPass',[]);
    }

    public function singIn()
    {
        return $this->render('singIn',[]);
    }

    public function singUp()
    {
        return $this->render('singUp',[]);
    }

    public function login(){
        $user = null;
        $address = null;
        $addressId = null; 

        $db = new Database('localhost','project','root','');
        $conn = $db->getConn();
        $user_stmt = $conn->prepare('SELECT * FROM users');
        $address_stmt = $conn->prepare('SELECT * FROM addresses where addressId = :addressId');
        $user_stmt->execute();
        
        foreach($user_stmt as $row)
        {
            if($row['email'] === $_POST['email'])
            {
                $addressId = $row['addressId'];
                $address_stmt->bindParam(':addressId',$addressId,PDO::PARAM_INT);
                $address_stmt->execute();
                $tmp = $address_stmt->fetch(PDO::FETCH_ASSOC);
                $address = new Address($tmp['country'],$tmp['locality'],$tmp['street'],$tmp['streetNum'],$tmp['flatNum'],$tmp['postcodeNum'],$tmp['postcodeLocality']);
                $user = new User($row['name'],$row['surname'],$address,$row['email'],$row['password']);
                $_SESSION['user'] = serialize($user);
                $_SESSION["id"] = $user->getEmail();
                $db->closeConnection();
                break;
            }
        }

        if(!$user) {
            return $this->render('singIn', ['message' => ['Email not recognized']]);
        }

        if(!password_verify($_POST['password'], $user->getPassword())) {
            return $this->render('singIn', ['message' => ['Wrong password']]);
        }
        else
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}projekt/index.php?page=main");
        }

        $this->render('singIn');
    }

    public function logout(){
        session_unset();
        session_destroy();
        $this->render('singIn',['text' => 'You have been successfully logged out!']);
    }

    public function createAccount(){

        $name = strtoupper($_POST['name']);
        $surname = strtoupper($_POST['surname']);
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass_confirm = $_POST['confirm_password'];
        $country = strtoupper($_POST['country']);
        $locality = strtoupper($_POST['locality']);
        $street = strtoupper($_POST['street']);
        $street_number = strtoupper($_POST['street_number']);
        $flat_number = $_POST['flat_number'];
        $post_number = $_POST['postcode_number'];
        $post_locality = strtoupper($_POST['postcode_locality']);

        $flag = true;
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        $maxId = null;

        $validation = new Validation($name,$surname,$email,$pass,$pass_confirm,$country,$locality,$street,$street_number,$flat_number,$post_number,$post_locality);
        $flag = $validation->validateRegisterForm();
        $messages = $validation->getMessages();

        if($flag){
            $conn = null;

            try{
                $db = new Database('localhost','project','root','');
                $conn = $db->getConn();
                $conn->beginTransaction();                

                $insertAddress = $conn->prepare('INSERT INTO addresses (country, locality, street, streetNum, postcodeLocality, postcodeNum, flatNum) VALUES (:country, :locality, :street, :street_number, :post_locality, :post_number, :flat_number)');
                $insertAddress->bindParam(':country',$country,PDO::PARAM_STR);
                $insertAddress->bindParam(':locality',$locality,PDO::PARAM_STR);
                $insertAddress->bindParam(':street',$street,PDO::PARAM_STR);
                $insertAddress->bindParam(':street_number',$street_number,PDO::PARAM_STR);
                $insertAddress->bindParam(':post_locality',$post_locality,PDO::PARAM_STR);
                $insertAddress->bindParam(':post_number',$post_number,PDO::PARAM_STR);
                $insertAddress->bindParam(':flat_number',$flat_number,PDO::PARAM_STR);
                $insertAddress->execute();
    
                $maxId = $conn->lastInsertId();
                
                $conn->query("INSERT INTO users (name, surname, email, password, addressId) VALUES ('$name', '$surname','$email','$password_hash','$maxId')");  
                $conn->commit();

            }catch(PDOException $e){
                $conn->rollBack();
                $db->closeConnection();

                $err = 'err';
                $err_val = 'Account has not been created!';
                $this->render('singUp', $messages);
            }

            $this->render('singIn', ['message' => ['You\'ve created an account!']]);
            $db->closeConnection();
        }
        else{
            $this->render('singUp', $messages);
        }
    }
}